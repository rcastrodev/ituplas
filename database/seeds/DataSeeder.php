<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'Av. Presidente Perón 9140/9202 Ituzaingó, Colectora Sur, Buenos Aires.',
            'email'         => 'ventas@ituplas.com ',
            'email2'        => 'ventas@ituplassrl.com.ar',
            'phone1'        => '+541146219200|46219200',
            'phone2'        => '+541146219300|46219300',
            'logo_header'   => 'images/data/Mask_Group_251.png',
            'logo_footer'   => 'images/data/Mask_Group_254.png'
        ]);
         
    }
}

