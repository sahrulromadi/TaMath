<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'question_text' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
