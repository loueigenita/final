<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Student;
use Illuminate\Support\Arr;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();

        foreach ($students as $student) {
            $account = Account::where('user_id', $student->user_id)->first();
            if ($account) {
                $account->department = $student->department;
                $account->save();
            }
        }

        $accounts = [
            [
                'user_id' => 1,
                'fname' => 'Altair',
                'lname' => 'Encina',
                'address' => 'Potohan, Tubigon.',
                'email' => 'altenci0812@gmail.com',
                'phone_no' => '09645365167',
            ],
            [
                'user_id' => 2,
                'fname' => 'Rosemarie',
                'lname' => 'Flores',
                'address' => 'Cangawa, Buenavista',
                'email' => 'rosasmoe@gmail.com',
                'phone_no' => '09974876553',
            ],
  
        ];

        foreach ($accounts as $acc) {
            // $departments = ['CON', 'CAST', 'CCJ', 'CBA', 'COE'];
            $department = Arr::random(['CON', 'CAST', 'CCJ', 'CBA', 'COE']);

            Account::create([
                'user_id' => $acc['user_id'],
                'fname' => $acc['fname'],
                'lname' => $acc['lname'],
                'address' => $acc['address'],
                'email' => $acc['email'],
                'phone_no' => $acc['phone_no'],
                'department' => $department,
            ]);
        }
    }
}
