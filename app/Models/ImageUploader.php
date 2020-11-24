<?php


namespace App\Models;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ImageUploader implements Uploader
{
    public function saveUploadedFile(UploadedFile $file)
    {
        $path = $file->store($this->getStoragePath());

        if ($path) {
            $img = Image::make($path);

            $width = config('constants.profile_picture.max_width');
            $height = config('constants.profile_picture.max_height');

            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save();

            return $path;
        }
    }

    protected function getStoragePath()
    {
        return config('constants.images_path');
    }
}
