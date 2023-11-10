<?php

namespace Database\Seeders;

use App\Models\WorkItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WorkItem::insert([
            [
                'code' => 'John Doe',
                'name' => 'QL Server 2017',
                'module_id' => 1,
                'project_id' => 3,
                'priority' => 'Strong',
                'emp_workitem' => 4, 
                'note' => 'aasdadada',
                
            ],
            [
                'code' => 'Johsdadsadadn Doe',
                'name' => 'QL Server 2014654646',
                'module_id' => 2,
                'project_id' => 2,
                'priority' => 'Strong',
                'emp_workitem' => 6, 
                'note' => 'aasdadasdsadadada',
            ],
        ]);
    }
}
