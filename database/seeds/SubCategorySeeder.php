<?php

use App\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'ENVASES DE POLICARBONATO'
        ]);


        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'BIDONES PET'
        ]);

        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'ENVASES PET'
        ]);

        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'TAPAS'
        ]);

        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'DISPENSER'
        ]);

        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'ENVASES DE POLIETILENO'
        ]);


        SubCategory::create([
            'category_id'   => 1,
            'name'          => 'ENVASES DE POLICARBONATO'
        ]);




        SubCategory::create([
            'category_id'   => 2,
            'name'          => 'HIELO TIPO ROLITO'
        ]);

        SubCategory::create([
            'category_id'   => 2,
            'name'          => 'HIELO EN ESCAMAS'
        ]);

        SubCategory::create([
            'category_id'   => 2,
            'name'          => 'HIELO PICADO'
        ]);



        SubCategory::create([
            'category_id'   => 3,
            'name'          => 'AGUA DESMINERALIZADA ANTICORROSIVA'
        ]);

        SubCategory::create([
            'category_id'   => 3,
            'name'          => 'AGUA DESMINERALIZADA DESIONIZADA'
        ]);

    }
}
