<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                'name' => 'John Doe',
                'email' => 'johndoe@admin.com',
                'password' => '1234',
            ])->assignRole('Admin');

            User::create([
                'name' => 'John Not Doe',
                'email' => 'johndoe@gmail.com',
                'password' => '1234',
            ])->assignRole('Admin');

            User::create([
                'name' => 'John May Doe',
                'email' => 'johnmaydoe@admin.com',
                'password' => '1234',
            ])->assignROle('User');
        //
    }
}
