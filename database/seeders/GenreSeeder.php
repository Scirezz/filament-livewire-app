<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'genre_name' => 'Comedia',
        ]);

        Genre::create([
            'genre_name' => 'Acción',
        ]);

        Genre::create([
            'genre_name' => 'Drama',
        ]);
        //
    }
}
