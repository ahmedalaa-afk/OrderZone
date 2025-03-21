<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        // $vendors = Vendor::all();
        // foreach ($vendors as $vendor){
        //     $vendor->assignRole('vendor');
        // }
    }
}
