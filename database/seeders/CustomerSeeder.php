<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customer::insert([
            [
                'username'=> 'JD', 
                'name' => 'John Doe', 
                'email'=> 'doe@gmail.com',
                'phoneNumber'=> '0987654321',
                'company'=> 'Does Company',
                'gender' => 'Male',
                'active_status' => 'Active',
                'note'=> 'asdadas'
            ],
            [
                'username'=> 'JJ', 
                'name' => 'John Joe', 
                'email'=> 'Joe@gmail.com',
                'phoneNumber'=> '0987654322',
                'company'=> 'Does Company',
                'gender' => 'Female',
                'active_status' => 'Active',
                'note'=> 'asdadas'
            ],[
                'username'=> 'JDK', 
                'name' => 'John Doe King', 
                'email'=> 'king@gmail.com',
                'phoneNumber'=> '0987654323',
                'company'=> 'Kaoes Company',
                'gender' => 'Other',
                'active_status' => 'Inactive',
                'note'=> 'asdadas'
            ]    
        ]);
    }
}
