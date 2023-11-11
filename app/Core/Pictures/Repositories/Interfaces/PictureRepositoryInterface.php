<?php

namespace App\Core\Pictures\Repositories\Interfaces;

use App\Core\Pictures\Picture;
use App\Core\SpareParts\SparePart;
use Illuminate\Http\UploadedFile;

interface PictureRepositoryInterface
{
    /**
     * Add picture to given spare part
     *
     * @param SparePart $spare part
     * @param UploadedFile $pictureFile
     * @return void
     */
    public function add(SparePart $sparePart, UploadedFile $pictureFile): void;

    /**
     * Retrieve one picture according to given id
     *
     * @param integer $id
     * @return Picture
     */
    public function findById(int $id): Picture;

    /**
     * Remove given picture
     *
     * @param Picture $picture
     * @return void
     */
    public function remove(Picture $picture): void;
}
