<?php

namespace Database\Seeders;

use App\Models\WorkDo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WorkDo::insert([
            [
                'work_do_code' => 'John Doe',
                'name' => 'QL Server 2017',
                'work_item_id' => 1,
                'module_id' => 1,
                'project_id' => 1,
                'emp_workdo' => 1,
                'priority' => 'Emergency',
                'type_of_work' => 'Complex',
                'status' => 'Finish',
                'date_start' => '2021-06-08',
                'date_end' => '2021-06-08',
                'note' => 'aasdadada',
                
            ],
            [
                'work_do_code' => 'John Joe King',
                'name' => 'QL Server 2018',
                'work_item_id' => 2,
                'module_id' => 2,
                'project_id' => 2,
                'emp_workitem' => 2,
                'priority' => 'High',
                'type_of_work' => 'Simple',
                'status' => 'Processing',
                'date_start' => '2021-06-08',
                'date_end' => '2021-06-08',
                'note' => 'aasdadada',
            ],
            [
                'work_item_code' => 'John Loe LOUS',
                'name' => 'QL Server 2019',
                'work_item_id' => 3,
                'module_id' => 3,
                'project_id' => 3,
                'emp_workitem' => 3,
                'priority' => 'Medium',
                'type_of_work' => 'Simple',
                'status' => 'Pause',
                'date_start' => '2021-06-08',
                'date_end' => '2021-06-08',
                'note' => 'aasdadada',
            ],
        ]);
    }
}
