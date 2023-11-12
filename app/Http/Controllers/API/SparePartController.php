<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Core\Categories\Category;
use Illuminate\Http\JsonResponse;
use App\Core\SpareParts\SparePart;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SparePartResource;
use App\Http\Resources\SparePartPaginateResource;
use App\Core\SpareParts\Requests\AddSparePartRequest;
use App\Core\Pictures\Exceptions\MaxPicturesException;
use App\Core\Pictures\Repositories\Interfaces\PictureRepositoryInterface;
use App\Core\SpareParts\Repositories\Interfaces\SparePartRepositoryInterface;

class SparePartController extends ApiBaseController
{
    public function __construct(
        private SparePartRepositoryInterface $sparePartRepository,
        private PictureRepositoryInterface $pictureRepository
    ) {
    }

    public function index(Request $request): JsonResponse
    {
        $spareParts = $this->sparePartRepository->list(
            params: $request->only(["name"]),
            page: $request->input("page", 1),
            limit: $request->input("per_page", 10),
            sortBy: $request->input("order_by", "created_at"),
            sortOrder: $request->input("sort_by", "desc"),
        );

        return $this->successResponse(data: new SparePartPaginateResource($spareParts));
    }

    private function addPictures(SparePart $sparePart, array $pictures): void
    {
        // Loop through given pictures array and upload each picture for given service
        foreach ($pictures as $picture) {
            if ($sparePart->pictures()->count() >= SparePart::MAX_PICTURES)
                throw new MaxPicturesException();

            $this->pictureRepository->add(sparePart: $sparePart, pictureFile: $picture);
        }
    }

    public function create(AddSparePartRequest $request): JsonResponse
    {
        $data = $request->validated();
        $category = Category::find($request->input("category_id"));

        DB::beginTransaction();
        // Try to create new spare part with pictures
        try {
            // Create spare part
            $sparePart = $this->sparePartRepository->store(body: $data, category: $category);

            // Associate pictures to spare part
            $this->addPictures(sparePart: $sparePart, pictures: $data['pictures']);
            DB::commit();
            return $this->successResponse(data: new SparePartResource($sparePart), code: 201);
        } catch (Exception $e) {
            // Rollback and send error message
            DB::rollBack();
            return $this->errorResponse($e->getMessage(), code: 422);
        }
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $sparePart = $this->sparePartRepository->findById(id: $id);
        $sparePart = $this->sparePartRepository->update(sparePart: $sparePart, body: $request->all());

        return $this->successResponse(message: 'Evénement modifié avec succès', data: new SparePartResource($sparePart), code: 201);
    }

    public function delete(string $id): JsonResponse
    {
        $sparePart = $this->sparePartRepository->findById($id);

        return $this->sparePartRepository->delete(sparePart: $sparePart)
            ? $this->successResponse(message: 'Pièce supprimée avec succès', code: 200)
            : $this->errorResponse(message: 'Une erreur est survenue', code: 400);
    }
}
