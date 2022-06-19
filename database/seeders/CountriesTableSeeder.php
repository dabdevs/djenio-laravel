<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    private $countries = [
        'ARG' => 'Argentina',
        'BR' => 'Brazil',
        'COL' => 'Colombia',
        'CHL' => 'Chile',
        'BOL' => 'Bolivia',
        'URU' => 'Uruguay',
        'PAG' => 'Paraguay'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->countries as $code => $name) {
            $this->createRow($name, $code);
        }
       
    }

    private function createRow($name, $code)
    {
        $country = Country::whereCode($code)->first();
            
        if($country === null) {
            $country = new Country;
        }

        $country->code = $code;
        $country->name = $name;
        $country->save();
    }
}
