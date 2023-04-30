<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;

trait ImageTrait
{
    private function uploadImage(?UploadedFile $imageObject, string $path): ?string
    {
        if ($imageObject) {
            $fileName = now()->timestamp . "_" . $imageObject->getClientOriginalName();
            $imageObject->move($path, $fileName);
        }
        return $fileName ?? null;
    }

    private function deleteImage(string $path): void
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}