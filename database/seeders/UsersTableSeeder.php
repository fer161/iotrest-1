<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * forma de crear un usuario 
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('123'),
            'rol' => 'A',
        ]);

         /**
     * Run the database seeds.
     * crearemos 10 usuarios aleatorios
     */

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->unique()->userName,
                'password' => Hash::make('111'),
                'rol' => $faker->randomElement(['A', 'U', 'D']),
            ]);
        }
    }
}
