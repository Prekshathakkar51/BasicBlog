<?php

namespace App\Services\Blog;

use App\Models\Blog;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Actions\Blog\UploadBlogImage;
use App\Actions\Blog\DeleteBlogImage;

class BlogService
{
    public function __construct(
        private BlogRepositoryInterface $repo,
        private UploadBlogImage $uploadImage,
        private DeleteBlogImage $deleteImage
    ) {}

    public function getAllBlogs()
    {
        return $this->repo->getPaginatedBlogs();
    }

    public function searchBlogs(?string $query)
    {
        return $this->repo->searchBlogs($query);
    }

    public function create(array $data, $user): Blog
    {
        if (!empty($data['image'])) {
            $data['image'] = $this->uploadImage->execute($data['image']);
        }

        return $user->blogs()->create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        if (!empty($data['image'])) {

            // delete old image
            $this->deleteImage->execute($blog->image);

            // upload new
            $data['image'] = $this->uploadImage->execute($data['image']);
        } else {
            unset($data['image']);
        }

        $this->repo->update($blog, $data);

        return $blog;
    }

    public function delete(Blog $blog): void
    {
        $this->deleteImage->execute($blog->image);
        $this->repo->delete($blog);
    }
}