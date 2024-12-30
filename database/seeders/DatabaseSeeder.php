<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // seeder
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        // dummy
        // Question::factory()
        //     ->count(10)
        //     ->has(Option::factory()->count(4))
        //     ->create();
    }
}
