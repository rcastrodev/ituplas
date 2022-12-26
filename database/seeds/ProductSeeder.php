<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'sub_category_id'   => 3,
            'name'              => 'Botella PET 1 lts',
        ]);

        Product::create([
            'sub_category_id'   => 8,
            'name'              => 'Hielo rolito 14kg',
        ]);

        Product::create([
            'sub_category_id'   => 11,
            'name'              => 'AGUA DESMINERALIZADA ANTICORROSIVA',
        ]);
    }
}

