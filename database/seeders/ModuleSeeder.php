<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Module::insert([
            [
                'module_code' => 'John Doe',
                'name' => 'QL Server 2017',
                'project_id' => 4,
                'user_module' => 1,
                'note' => 'aasdadada',
            ],
            [
                'module_code' => 'Johsdadsadadn Doe',
                'name' => 'QL Server 2014654646',
                'project_id' => 5,
                'user_module' => 1,
                'note' => 'aasdadada',
            ],
            [
                'module_code' => 'John Doeewqeqe',
                'name' => 'qweqweqqweqeQL Server 2017',
                'project_id' => 4,
                'user_module' => 1,
                'note' => 'aasdadada',
            ]
        ]);
    }
}
