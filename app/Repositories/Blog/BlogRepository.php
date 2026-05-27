<?php

namespace App\Repositories\Blog;

use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    public function getPaginatedBlogs(int $perPage = 5)
    {
        return Blog::with('user')
            ->withCount([
                'reactions as likes_count' => fn ($q) => $q->where('type', 'like'),
                'reactions as dislikes_count' => fn ($q) => $q->where('type', 'dislike'),
            ])
            ->latest()
            ->paginate($perPage);
    }

    public function searchBlogs(?string $query, int $perPage = 5)
    {
        return Blog::with('user')
            ->withCount([
                'reactions as likes_count' => fn ($q) => $q->where('type', 'like'),
                'reactions as dislikes_count' => fn ($q) => $q->where('type', 'dislike'),
            ])
            ->when($query, function ($qBuilder) use ($query) {
                $qBuilder->where(function ($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhereHas('user', function ($u) use ($query) {
                          $u->where('name', 'LIKE', "%{$query}%");
                      });
                });
            })
            ->latest()
            ->paginate($perPage)
            ->appends(['query' => $query]);
    }

    public function create(array $data): Blog
    {
        return Blog::create($data);
    }

    public function update(Blog $blog, array $data): bool
    {
        return $blog->update($data);
    }

    public function delete(Blog $blog): bool
    {
        return $blog->delete();
    }
}