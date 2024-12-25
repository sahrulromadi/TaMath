<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // category
        DB::table('categories')->insert([
            ['name' => 'TK', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'SD', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'SMP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'SMA', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
