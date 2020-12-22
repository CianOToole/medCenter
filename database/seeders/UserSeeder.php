<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_doctor = Role::where('name', 'doctor')->first();
        $role_patient = Role::where('name', 'patient')->first();

        $admin = new User;
        $admin->name = 'Mo Che';
        $admin->email = 'admin@bookstore.ie';
        $admin->address = '63 the hill';
        $admin->phone = '0862084993';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User;
        $user->name = 'Cian O';
        $user->email = 'doctor@bookstore.ie';
        $user->address = '63 the hill';
        $user->phone = '0862084993';
        $user->password = Hash::make('secret');
        $user->save();
        $admin->roles()->attach($role_doctor);

        $user = new User;
        $user->name = 'Joe K';
        $user->email = 'patient@bookstore.ie';
        $user->address = '63 the hill';
        $user->phone = '0862084993';
        $user->password = Hash::make('secret');
        $user->save();
        $admin->roles()->attach($role_patient);
    }
}
