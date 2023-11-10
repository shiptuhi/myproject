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
                'date_start'=> '2021-02-02',
                'date_end'=> '2021-03-02',
                'note' => 'dsadadada',
                'user_id' => '1',
            ],
            [
                'project_code'=> 'Johsn Doe', 
                'name' => 'QL Sssserver 2017', 
                'active_status'=> 'Active',
                'date_start'=> '2021-02-02',
                'date_end'=> '2021-04-02',
                'note' => 'dsadadada',
                'user_id' => '2',
            ],[
                'project_code'=> 'Joahn Doe', 
                'name' => 'QL Servsssser 2017', 
                'active_status'=> 'Active',
                'date_start'=> '2021-02-02',
                'date_end'=> '2021-06-02',
                'note' => 'dsadadada',
                'user_id' => '1',
            ]    
        ]);
    }
}
