<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_user');

        $admin_role = Role::where('name', 'admin')->first();
        $polioworker_role = Role::where('name', 'polioworker')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admn.com',
            'password' => bcrypt('admin@123'),
        ]);

        $polio_worker = User::create([
            'name' => 'Polio Worker',
            'email' => 'polioworker@polioworker.com',
            'password' => bcrypt('polioworker@123'),
        ]);

        $admin->roles()->attach($admin_role);
        $polio_worker->roles()->attach($polioworker_role);
    }
}
