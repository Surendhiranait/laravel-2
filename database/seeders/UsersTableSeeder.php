<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) { //insert 10 records
            User::create([
                'name' => $faker->name, 
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), 
            ]);
        }
    }
}
