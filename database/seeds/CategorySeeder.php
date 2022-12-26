<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'productos']);
        Category::create(['name' => 'ituhielo']);
        Category::create(['name' => 'ituagua']);
    }
}
