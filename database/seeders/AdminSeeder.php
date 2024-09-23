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
        $role = Role::where('name', 'product_manager')->get();
         Admin::create([
            'name' => 'product_manager',
            'email' => 'product_manager@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $admin = Admin::where('name', '=', 'product_manager')->first();
        $admin->assignRole($role);
    }
}
