<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    protected $fillable = [
        'option_text',
        'is_correct',
        'question_id'
    ];

    // 1 option hanya bisa 1 question
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
