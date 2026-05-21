<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image'
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reactions():HasMany
    {
        return $this->hasMany(BlogReaction::class);
    }
}
