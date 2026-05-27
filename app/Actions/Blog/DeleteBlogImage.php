<?php

namespace App\Actions\Blog;

use Illuminate\Support\Facades\Storage;

class DeleteBlogImage
{
    public function execute(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}