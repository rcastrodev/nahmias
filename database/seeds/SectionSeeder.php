<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        $home_id    = Page::where('name', 'home')->first()->id;
        Section::create(['page_id' => $home_id, 'name' => 'section_1']);
        Section::create(['page_id' => $home_id, 'name' => 'section_2']);

        /** Empresa */
        $empresa_id    = Page::where('name', 'empresa')->first()->id;
        Section::create(['page_id' => $empresa_id, 'name' => 'section_1']);
        Section::create(['page_id' => $empresa_id, 'name' => 'section_2']);
    }
}
