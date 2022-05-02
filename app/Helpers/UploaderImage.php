<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UploaderImage
{

    public static function uploadFile(string $key,): string
    {
        $imageName = self::generateFileName($key);

        $pathsave = storage_path() . '/app/public/products/';

        if (!file_exists($pathsave)) {
            mkdir($pathsave, 0775, true);
        }

        $path = storage_path() . '/app/public/images/' . $imageName;


        Image::make(request()->file($key))->resize(286, 180, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($path);

        return $imageName;
    }

    public static function removeFile(string $path,string $imageName)
    {   
        Storage::delete(sprintf('%s/%s', $path, $imageName));
    }

    protected static function generateFileName(string $key): string
    {
        $extension = request()->file($key)->getClientOriginalExtension();
        return sprintf('%s-%s.%s', auth()->id(), now()->timestamp, $extension);
    }
}
