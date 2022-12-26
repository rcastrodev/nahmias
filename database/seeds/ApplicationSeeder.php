<?php

use App\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::create([
            'order'=> 'AA',
            'name' => 'Para tu hogar',
            'image'=> 'images/applications/Mask_Group_279.png'
        ]);

        Application::create([
            'order'=> 'BB',
            'name' => 'Cortinados',
            'image'=> 'mages/applications/Mask_Group_280.png'
        ]);

        Application::create([
            'order'=> 'CC',
            'name' => 'Sábanas',
            'image'=> 'mages/applications/Mask_Group_281.png'
        ]);

        Application::create([
            'order'=> 'DD',
            'name' => 'Colchones',
            'image'=> 'images/applications/Mask_Group_282.png'
        ]);

        Application::create([
            'order'=> 'EE',
            'name' => 'Pelotas para deporte',
            'image'=> 'mages/applications/Mask_Group_282.png'
        ]);

        Application::create([
            'order'=> 'FF',
            'name' => 'Etiquetas',
            'image'=> 'mages/applications/Mask_Group_283.png'
        ]);
    }
}
