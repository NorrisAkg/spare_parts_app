<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Core\Categories\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(3)->hasSpareParts(6)->create();
    }
}
