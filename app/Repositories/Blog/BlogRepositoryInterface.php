<?php

namespace App\Repositories\Blog;

use App\Models\Blog;

interface BlogRepositoryInterface
{
    public function getPaginatedBlogs(int $perPage = 5);

    public function searchBlogs(?string $query, int $perPage = 5);

    public function create(array $data): Blog;

    public function update(Blog $blog, array $data): bool;

    public function delete(Blog $blog): bool;
}