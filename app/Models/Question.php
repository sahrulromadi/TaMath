<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'category_id',
        'image',
        'slug'
    ];

    // ganti url nya jadi slug
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // 1 question hanya punya 1 category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
