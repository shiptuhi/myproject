<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Project::insert([
            [
                'project_code'=> 'John Doe', 
                'name' => 'QL Server 2017', 
                'active_status'=> 'Active',
                'date_start'=> '20-05-2021',
                'date_end'=> '20-05-2021',
                'note' => 'dsadadada',
                'user_id' => '1',
                'customer_id'=> '1'
            ],
            [
                'project_code'=> 'Johsn Doe', 
                'name' => 'QL Sssserver 2017', 
                'active_status'=> 'Active',
                'date_start'=> '20-05-2021',
                'date_end'=> '20-05-2021',
                'note' => '20-05-2021',
                'user_id' => '2',
                'customer_id' => '2',
            ],[
                'project_code'=> 'Joahn Doe', 
                'name' => 'QL Servsssser 2017', 
                'active_status'=> 'Active',
                'date_start'=> '20-05-2021',
                'date_end'=> '20-05-2021',
                'note' => 'dsadadada',
                'user_id' => '3',
                'customer_id' => '3',
            ]    
        ]);
    }
}
