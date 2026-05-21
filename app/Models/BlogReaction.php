<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogReaction extends Model
{
    protected $fillable = [
        'blog_id', 
        'user_id', 
        'type'
        ];

    public function blog():BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
