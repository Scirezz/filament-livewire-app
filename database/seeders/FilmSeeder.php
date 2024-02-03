<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create([
            'film_name' => 'Duro de Matar',
            'film_description' => 'description available',
            'genre_fke' => '2',
        ]);

        Film::create([
            'film_name' => 'La Familia Adams',
            'film_description' => 'no description available',
            'genre_fke' => '1',
        ]);

        Film::create([
            'film_name' => 'La Casa del Mar',
            'film_description' => 'description available',
            'genre_fke' => '3',
        ]);
        //
    }
}
