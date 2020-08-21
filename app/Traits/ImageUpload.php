<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait ImageUpload
{
    public function imageUpload($image)
    {
        $modelName = $this->getModelName();
        $thumbnailPath = $modelName::UPLOAD_DIRECTORY . '/';
        if (!File::exists($thumbnailPath)) {
            File::makeDirectory($thumbnailPath, $mode = 0777, true, true);
        }
        $path = $image->move($thumbnailPath, Str::random(10) . $image->getClientOriginalName());
        $path = str_replace('\\', '/', $path);
        $this->image = $path;
        $this->update();
    }

    public function getModelName()
    {
        return $this->getMorphClass();
    }
}
