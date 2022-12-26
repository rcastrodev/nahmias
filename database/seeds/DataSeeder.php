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
        $company_id = Company::first()->id;

        Data::create([
            'company_id'=> $company_id,
            'address'   => 'Gral. César Díaz 2849 CABA',
            'email'     => 'ventas@mnahmias.com',
            'phone1'    => '+541145815644|54 11 4581-5644',
            'phone2'    => '+541145824657|54 11 4582-4657',
            'logo_header'=> 'images/data/logoheader.png',
            'logo_footer'=> 'images/data/logofooter.png'
        ]);
    }
}
