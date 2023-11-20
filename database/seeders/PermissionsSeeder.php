<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'Admin']);
        // $permisson1 = Permission::create(['name' => 'edit user']);
        // $role1->givePermissionTo($permisson1);

        $role2 = Role::create(['name' => 'Team Leader']);
        // $permisson2 = Permission::create(['name' => 'view user']);
        // $role2->givePermissionTo($permisson2);

        $role3 = Role::create(['name' => 'Developer']);
        // $permisson2 = Permission::create(['name' => 'view user']);
        // $role2->givePermissionTo($permisson2);



        // $user1 = User::findOrFail(1);
        // $user1->assignRole($role1);

        // $user2 = User::findOrFail(2);
        // $user2->assignRole($role2);


    }
}
