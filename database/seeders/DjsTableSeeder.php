<?php

namespace Database\Seeders;

use App\Models\Dj;
use App\Models\User;
use Illuminate\Database\Seeder;

class DjsTableSeeder extends Seeder
{
    private $djs = [
        ["user_id" => 2, "firstname" => 'Alain', "lastname" => 'Jean', "name" => "Notmixed"],
        ["user_id" => 3, "firstname" => 'Jacques', "lastname" => "Massu", "name" => "Jaxz Bond"],
        ["user_id" => 6, "firstname" => 'Marc', "lastname" => "Jean", "name" => "Astro"],
        ["user_id" => 5, "firstname" => 'Angela', "lastname" => "Gomez", "name" => "Gelalu", "gender" => "F"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->djs as $dj) {
            $this->createRow($dj["user_id"], $dj["firstname"], $dj["lastname"], $dj["name"]);
        }
    }

    private function createRow($user_id, $firstname, $lastname, $name)
    {
        $dj = Dj::where('name', $name)->first(); 
       
        if ($dj == null) {
            $dj = new Dj;
        }

        $user = User::findOrFail($user_id);

        $dj->user_id = $user_id;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $dj->name = $name;

        $user->save();
        $dj->save();
    }
}
