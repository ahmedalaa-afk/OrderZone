<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'user_manager')->get();
         Admin::create([
            'name' => 'user_manager',
            'email' => 'user_manager@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $admin = Admin::where('name', '=', 'user_manager')->first();
        $admin->assignRole($role);
    }
}
