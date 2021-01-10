<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'doctor';
        $role_user->description = 'An doctor ';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'patient';
        $role_user->description = 'An patient';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An user';
        $role_user->save();
    }
}
