<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'category_id',
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

    // 1 question punya banyak options
    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
