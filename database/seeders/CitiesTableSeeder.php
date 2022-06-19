<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    private $cities = [
        ["country_id" => 1, "name" => 'Ciudad Autónoma de Buenos Aires'],
        ["country_id" => 1, "name" => 'Gran Buenos Aires'],
        ["country_id" => 1, "name" => 'Córdoba'],
        ["country_id" => 1, "name" => 'Mendoza'],
        ["country_id" => 4, "name" => 'Santiago de Chile'],
        ["country_id" => 3, "name" => 'Bogota'],
        ["country_id" => 3, "name" => 'Cartagena'],
        ["country_id" => 5, "name" => 'La Paz'],
        ["country_id" => 6, "name" => 'Montevideo'],
        ["country_id" => 7, "name" => 'Asunción']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->cities as $city) {
            $this->createRow($city["country_id"], $city["name"]);
        }
    }

    private function createRow($country_id, $name)
    {
        $city = City::where([
            'name' => $name,
            'country_id' => $country_id
        ])->first();
       
        if ($city == null) {
            $city = new City;
        }

        $city->country_id = $country_id;
        $city->name = $name;
        $city->save();
    }
}
