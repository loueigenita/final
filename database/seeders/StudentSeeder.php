<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Account;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = Account::all();

        foreach ($accounts as $account) {
            // Use the Student factory to create 10 random student records for each account
            \App\Models\Student::factory(10)->create([
                'user_id' => $account->id, // Assign the account ID to the user_id field
            ]);
        }
         $departments = ['CON', 'CAST', 'CCJ', 'CBA', 'COE'];
        $selectedDepartment = $departments[array_rand($departments)];

        Student::factory(10)->create(['department' => $selectedDepartment]);
    }
}
