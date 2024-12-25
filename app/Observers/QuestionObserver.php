<?php

namespace App\Observers;

use App\Models\Question;
use Illuminate\Support\Str;

class QuestionObserver
{
    // creating -> dijalankan sebelum model dibuat
    public function creating(Question $question): void
    {
        $question->slug = Str::uuid($question->id);
    }

    /**
     * Handle the Question "created" event.
     */
    public function created(Question $question): void
    {
        //
    }

    /**
     * Handle the Question "updated" event.
     */
    public function updated(Question $question): void
    {
        //
    }

    /**
     * Handle the Question "deleted" event.
     */
    public function deleted(Question $question): void
    {
        //
    }

    /**
     * Handle the Question "restored" event.
     */
    public function restored(Question $question): void
    {
        //
    }

    /**
     * Handle the Question "force deleted" event.
     */
    public function forceDeleted(Question $question): void
    {
        //
    }
}
