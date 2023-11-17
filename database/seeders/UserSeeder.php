<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            [
            "name" => "khanh",
            "email" => "khanh@gmail.com",
            'password'=>  "123456",
            "gender" =>  "Male",
            "phoneNumber" =>  "0987654321",
            "active_status" =>  "Active",
            ],
            [
                "name" => "long",
                "email" => "long@gmail.com",
                'password'=>  "123456",
                "gender" =>  "Male",
                "phoneNumber" =>  "0987654322",
                "active_status" =>  "Active",
            ]

        ]);
    }
}
