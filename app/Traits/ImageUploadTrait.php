<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    public function uploadImage(UploadedFile $file, string $folder = 'employees'): string
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs("public/{$folder}", $filename);
    }
}
