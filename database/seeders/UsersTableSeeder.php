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
    /*public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) { //insert 10 records
            User::create([
                'name' => $faker->name, 
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), 
            ]);
        }
    }*/
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // never store plain passwords
            'role' => 'admin', // 👈 important
        ]);

        User::create([
            'name' => 'Civil User',
            'email' => 'civil@example.com',
            'password' => bcrypt('password'),
            'role' => 'civil',
        ]);

        User::create([
            'name' => 'Mechanical User',
            'email' => 'mech@example.com',
            'password' => bcrypt('password'),
            'role' => 'mechanical',
        ]);
    }
}
