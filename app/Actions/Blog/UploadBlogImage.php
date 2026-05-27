<?php

namespace App\Actions\Blog;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadBlogImage
{
    public function execute(UploadedFile $file): string
    {
        return $file->store('blogs', 'public');
    }
}