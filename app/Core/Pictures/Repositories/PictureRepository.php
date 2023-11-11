<?php

namespace App\Core\Pictures\Repositories;

use App\Core\Pictures\Picture;
use Illuminate\Http\UploadedFile;
use App\Core\Tools\FileUploadTrait;
use App\Core\Pictures\Exceptions\PictureNotFoundException;
use App\Core\Pictures\Repositories\Interfaces\PictureRepositoryInterface;
use App\Core\SpareParts\SparePart;
use Illuminate\Support\Facades\File;

class PictureRepository implements PictureRepositoryInterface
{
    use FileUploadTrait;

    public function __construct(protected Picture $model)
    {
    }

    public function add(SparePart $sparePart, UploadedFile $pictureFile): void
    {
        $picture = new Picture();
        $picture->path = $this->upload(file: $pictureFile, folder: 'pictures');
        $picture->sparePart()->associate($sparePart);
        $picture->save();
    }

    public function findById(int $id): Picture
    {
        try {
            $picture = $this->model->where('id', $id)->first();
        } catch (\Throwable $th) {
            throw new PictureNotFoundException();
        }

        return $picture;
    }

    public function remove(Picture $picture): void
    {
        // Delete service picture
        $picture->delete();

        // Remove associated file if it exists
        if (File::exists(public_path("uploads/pictures/" . $picture->path)))
            unlink(public_path("uploads/pictures/" . $picture->path));
    }
}
