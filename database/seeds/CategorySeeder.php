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
        Category::create([
            'order'=> 'AA',
            'name' => 'Tablillas',
            'image'=> 'images/categories/Mask_Group_104.png'
        ]);
        Category::create([
            'order'=> 'BB',
            'name' => 'Mallas rectangulares',
            'image'=> 'images/categories/Mask_Group_105.png'
        ]);
        Category::create([
            'order'=> 'CC',
            'name' => 'Tablillas inyectadas',
            'image'=> 'images/categories/Mask_Group_106.png'
        ]);
    }
}
