<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Image_364.png',
                'content_1' => 'SOLUCIONES ENERGÉTICAS PARA TODAS LAS INDUSTRIAS',
                'content_2' => '<p>Trabajamos arduamente para garantizar la calidad de nuestros servicios teniendo en cuenta la necesidad de cada cliente.</p>',
            ]);
        }

        Content::create([
            'section_id'    => 2,
            'image'     => 'images/home/Mask_Group_234.png',
            'content_1'     => 'ITUPLAS',
            'content_2'     => '<p>Somos una empresa Argentina que se dedica a la producción de envases de policarbonato y derivados del plástico desde hace ya mas de 20 años.</p>',
        ]);

        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 3,
                'order'     => 'AA',
                'image'     => 'images/company/Image_364.png',
                'content_1' => 'QUIENES SOMOS'
            ]);
        }

        Content::create([
            'section_id'    => 4,
            'content_1'     => '<p>Experiencia, tecnología, calidad, eficiencia y competitividad, son los pilares fundamentales en los que nos apoyamos, cumpliendo con las necesidades y requerimientos específicos de nuestros clientes.</p>'
        ]);

        Content::create([
            'section_id'    => 5,
            'content_1'     => '<p>Somos una empresa Argentina que se dedica a la producción de envases de policarbonato y derivados del plástico desde hace ya mas de 20 años. </p>
            <p>Contamos con tecnología y maquinarias de avanzada para la fabricación de los mismos, siendo los primeros en adquirir una Máquina Inyecto-Soplado de origen japonés, única en el mercado de Latino América.</p>',
            'content_2'     => '<p>Este sistema permite un producto final inmejorable ya que cuenta con una vida útil mayor que el de los sistemas tradicionales.</p>
            <p>A su vez, contamos con un servicio de matricería y etiquetado que nos permite personalizar su pedido, con el nombre de su marca en relieve, y entregarle un producto listo para su comercialización.</p>'
        ]);
        
        Content::create([
            'section_id'    => 6,
            'order'         => 'AA',
            'image'         => 'images/company/Mask_Group_255.png',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'BB',
            'image'         => 'images/company/MaskGroup257.png',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'CC',
            'image'         => 'images/company/MaskGroup258.png',
        ]);
        
        Content::create([
            'section_id'    => 6,
            'order'         => 'DD',
            'image'         => 'images/company/MaskGroup259.png',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'EE',
            'image'         => 'images/company/MaskGroup261.png',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'FF',
            'image'         => 'images/company/MaskGroup260.png',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'GG',
            'image'         => 'images/company/MaskGroup256.png',
        ]);

        Content::create([
            'section_id'    => 7,
            'image'         => 'images/Logistics/Mask_Group_234.png',
            'content_1'     => 'ITUPLAS',
            'content_2'     => '<p>Somos una empresa Argentina que se dedica a la producción de envases de policarbonato y derivados del plástico desde hace ya mas de 20 años.</p>',
        ]);

        Content::create([
            'section_id'    => 7,
            'image'         => 'images/Logistics/Mask_Group_234.png',
            'content_1'     => 'ITUPLAS',
            'content_2'     => '<p>Somos una empresa Argentina que se dedica a la producción de envases de policarbonato y derivados del plástico desde hace ya mas de 20 años.</p>',
        ]);

        Content::create([
            'section_id'    => 8,
            'image'         => 'images/features/MaskGroup265.png',
            'content_1'     => 'ITUHIELO',
        ]);

        Content::create([
            'section_id'    => 9,
            'image'         => 'images/features/MaskGroup265copia.png',
            'content_1'     => 'ITUAGUA',
        ]);
        
    }
    
}