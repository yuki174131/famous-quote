<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['content' => 'history'],
            ['content' => 'sports'],
            ['content' => 'business'],
            ['content' => 'anime'],
            ['content' => 'other'],
    ]);
    }
}
