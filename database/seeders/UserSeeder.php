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

        $users = [

            [
                
                'name' => 'Altair Encina',
                'email' => 'altenci0812@gmail.com',
                'password' => bcrypt('password123'),
            ],

            [
                'name' => 'Rosemarie Flores',
                'email' => 'rosasmoe@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'James Christian Fronteras',
                'email' => 'santiagodebohol@gmail.com',
                'password' => bcrypt('password123'),
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
       
    }
   
}
