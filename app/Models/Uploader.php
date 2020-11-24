<?php


namespace App\Models;

use Illuminate\Http\UploadedFile;

interface Uploader
{
    public function saveUploadedFile(UploadedFile $file);
}
