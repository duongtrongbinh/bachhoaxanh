<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageTraits
{

    public function storageTraitUploadMuity($file, $folderName)
    {
        $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = 'public/' . $folderName . '/' . auth()->id() . '/' . $fileNameHash;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);
        $dataUploadImage = Storage::url($filePath);
        return $dataUploadImage;
    }
}
