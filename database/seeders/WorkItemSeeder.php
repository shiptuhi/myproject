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
                'work_item_code' => 'John Doe',
                'name' => 'QL Server 2017',
                'module_id' => 1,
                'project_id' => 1,
                'emp_workitem' => 1,
                'priority' => 'Emergency',
                'date_start' => '2021-06-08',
                'date_end' => '2021-06-08',
                'note' => 'aasdadada',
                
            ],
            [
                'work_item_code' => 'John Joe King',
                'name' => 'QL Server 2018',
                'module_id' => 2,
                'project_id' => 2,
                'emp_workitem' => 2,
                'priority' => 'High',
                'date_start' => '2021-06-08',
                'date_end' => '2021-06-08',
                'note' => 'aasdadada',
            ],
            [
                'work_item_code' => 'John Loe LOUS',
                'name' => 'QL Server 2019',
                'module_id' => 3,
                'project_id' => 3,
                'emp_workitem' => 3,
                'priority' => 'Medium',
                'date_start' => '2021-06-08',
                'date_end' => '2021-06-08',
                'note' => 'aasdadada',
            ],
        ]);
    }
}
