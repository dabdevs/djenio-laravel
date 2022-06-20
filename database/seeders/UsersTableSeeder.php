<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    private $users = ['dabdevs@gmail.com','notmixedofficial@gmail.com','jaxzbond@gmail.com','djmaxtavo@gmail.com', 'gelalu@gmail.com', 'astro@gmail.com',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as  $email) {
            $this->createRow($email);
        }
       
    }

    private function createRow($email)
    {
        $user = User::whereEmail($email)->first();
            
        if($user === null) {
            $user = new User;
        }

        $user->email = $email;
        $user->password = Hash::make('1234');
        $user->country_id = 1;
        $user->city_id = 1;

        $user->save();
    }
}
