<?php

namespace Database\Seeders;

use App\Models\Actuator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *estamos mandando llamar el archivo UsersTableSeederphp
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            SensorsTableSeeder::class,
            ActuatorsTableSeeder::class]);
    }
}
