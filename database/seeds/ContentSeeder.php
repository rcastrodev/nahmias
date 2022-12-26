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
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 1,
                'image'     => 'images/home/Mask_Group_188.png',
                'content_1' => 'nahmias',
                'content_2' => 'Somos especialistas en la producción de hilados teñidos con gran solidez a la luz'
            ]);
        }

        Content::create([
            'section_id'=> 2,
            'image'     => 'images/home/Mask_Group_249.png',
            'content_1' => 'nahmias',
            'content_2' => 'Más de 50 años de trayectoria en la industria textil argentina produciendohilados de poliéster de filamento contínuo con los más altos standards de calidad'
        ]);


        /** Empresa  */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 3,
                'image'     => 'images/company/Mask_Group_183.png',
            ]);
        }

        Content::create([
            'section_id'=> 4,
            'content_2' => '<p>Con una trayectoria afianzada en la experiencia de 60 años en la industria textil argentina, iniciamos en el año 1967 la producción de hilado de poliéster de filamento contínuo de alta calidad.</p><p>Somos una empresa de mediana envergadura, brindamos atención personalizada, asesoramiento específico para cada necesidad y gran agilidad en los procesos.</p><p>Nos especializamos en la producción de hilados de gran solidez a la luz (teñido en la masa) mediante un método ecológico -sin consumo de agua como en las tintorerías convencionales- desarrollado por nuestra empresa.</p>',
            'content_3' => '<iframe height="362" src="https://www.youtube.com/embed/OqSQo2aifAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-100"></iframe>'
        ]);
    }
}



