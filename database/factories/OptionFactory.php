<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Option::class;

    public function definition(): array
    {
        return [
            'option_text' => $this->faker->word(),
            'is_correct' => $this->faker->boolean(),
            'question_id' => Question::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
