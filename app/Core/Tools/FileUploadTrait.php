<?php

namespace App\Core\Tools;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    /**
     * Upload a single file in the server
     *
     * @param UploadedFile $file
     * @param $folder
     * @param $filename
     * @param string $disk
     * @return false|string
     */
    public function upload(UploadedFile $file, $folder = null, string $filename = null, string $disk = 'uploads')
    {
        $name = !is_null($filename) ? $filename : Str::random(25) . '.' . $file->getClientOriginalExtension();

        $file->storeAs(
            $folder,
            $name,
            $disk
        );

        return $name;
    }

    public function uploadFile(UploadedFile $file,  $disk = null, $folder = null)
    {

        $name =  Str::random(25) . "." . $file->getClientOriginalExtension();

        $file->storeAs(
            $folder,
            $name,
            $disk ? $disk : "uploads"
        );

        //file failed exception here later.
        return $name;
    }

    public function removeFile(string $folder, string $name, string $disk = "uploads")
    {
        return Storage::disk($disk)->delete($folder . $name);
    }
}
