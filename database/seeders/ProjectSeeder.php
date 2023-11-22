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
                'date_start'=> '2021-02-06',
                'date_end'=> '2021-02-06',
                'note' => 'dsadadada',
                'user_id' => '1',
                // 'customer_id'=> '1'
            ],
            [
                'project_code'=> 'Johsn Doe', 
                'name' => 'QL Sssserver 2017', 
                'active_status'=> 'Active',
                'date_start'=> '2021-02-06',
                'date_end'=> '2021-02-06',
                'note' => 'sadada',
                'user_id' => '2',
                // 'customer_id' => '2',
            ],[
                'project_code'=> 'Joahn Doe', 
                'name' => 'QL Servsssser 2017', 
                'active_status'=> 'Active',
                'date_start'=> '2021-02-06',
                'date_end'=> '2021-02-06',
                'note' => 'dsadadada',
                'user_id' => '3',
                // 'customer_id' => '3',
            ]    
        ]);
    }
}
