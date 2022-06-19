<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    private $genres = ['Hip Hop', 'Trap', 'Dancehall', 'Salsa', 'Reggaeton', 'Drill', 'Cachenge', 'Rap', 'Electrónica', 'House', 'Techno', 'Afrobeat', 'Amapiano', 'Disco', 'Tango', 'Valse', 'Reggae', 'Rock', 'Pop'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->genres as $name) {
            $this->createRow($name);
        }
       
    }

    private function createRow($name)
    {
        $genre = Genre::whereName($name)->first();
            
        if($genre === null) {
            $genre = new Genre; 
        }

        $genre->name = $name;
        $genre->save();
    }
}
