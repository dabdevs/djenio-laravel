<?php

namespace Database\Seeders;

use App\Models\Dj;
use Illuminate\Database\Seeder;

class DjsTableSeeder extends Seeder
{
    private $djs = [
        ["user_id" => 2, "firstname" => 'Alain', "lastname" => 'Jean', "dj_name" => "Notmixed"],
        ["user_id" => 3, "firstname" => 'Jacques', "lastname" => "Massu", "dj_name" => "Jaxz Bond"],
        ["user_id" => 6, "firstname" => 'Marc', "lastname" => "Jean", "dj_name" => "Astro"],
        ["user_id" => 5, "firstname" => 'Angela', "lastname" => "Gomez", "dj_name" => "Gelalu"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->djs as $dj) {
            $this->createRow($dj["user_id"], $dj["firstname"], $dj["lastname"], $dj["dj_name"]);
        }
    }

    private function createRow($user_id, $firstname, $lastname, $dj_name)
    {
        $dj = Dj::where('dj_name', $dj_name)->first(); 
       
        if ($dj == null) {
            $dj = new Dj;
        }

        $dj->user_id = $user_id;
        $dj->firstname = $firstname;
        $dj->lastname = $lastname;
        $dj->dj_name = $dj_name;
        $dj->save();
    }
}
