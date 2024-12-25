<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // 1 category bisa punya banyak questions
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
