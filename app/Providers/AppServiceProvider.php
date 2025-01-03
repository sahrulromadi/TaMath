<?php

namespace App\Providers;

use App\Models\Question;
use App\Observers\QuestionObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Question::Observe(QuestionObserver::class);

        // blade components
        Blade::component('user.components.partials.previous', 'previous');
    }
}
