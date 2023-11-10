<?php

namespace App\Core\SpareParts\Repositories;

use App\Core\SpareParts\SparePart;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Core\SpareParts\Exceptions\SparePartNotFoundException;
use App\Core\SpareParts\Repositories\Interfaces\SparePartRepositoryInterface;

class SparePartRepository implements SparePartRepositoryInterface
{
    public function __construct(protected SparePart $model)
    {

    }

public function list(array $params, int $page = 1, int $limit = 10, string $sortBy = 'designation', string $sortOrder = "asc"): LengthAwarePaginator
    {
        $query = $this->model->newQuery();

        if (array_key_exists("reference", $params)) {
            $query = $query->where("", $params["reference"]);
        }

        if (array_key_exists("name", $params)) {
            $query = $query->where("designation", 'like', '%' . $params["name"] . '%');
        }

        return $query->orderBy($sortBy,$sortOrder)->paginate(page: $page, perPage: $limit);
    }

    public function store(array $body): SparePart
    {
        $sparePart = $this->model->make($body);
        $sparePart->save();

        return $sparePart;
    }

    public function findById(int $id): SparePart
    {
        try {
            return $this->model->find($id);
        } catch (ModelNotFoundException $e) {
            throw new SparePartNotFoundException();
        }
    }

    public function update(SparePart $sparePart, array $body): SparePart
    {
        $sparePart->update($body);

        return $sparePart;
    }

    public function delete(SparePart $sparePart): bool
    {
        return $sparePart->delete();
    }
}
