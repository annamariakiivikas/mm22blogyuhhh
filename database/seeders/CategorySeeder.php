<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(4)->create();
        foreach($categories as $category){
            Category::factory(rand(0,5))->create(['parent_id' => $category->id]);
        }
    }
}
