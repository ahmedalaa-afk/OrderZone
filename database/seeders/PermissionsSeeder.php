<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User permissions
            // 'buy',
            // 'comment',
            // 'review',

            // ------------------------------------------------------------------------------------------------

            // Super Admin Permissions
            // 'view_users', // this include users , vendors , admin , super_admin
            // 'create_user', // create user like admin and super_admin
            // 'delete_user', // delete user and vendor
            // 'block_user', // block user and vendor

            // 'create_admin', // create admin
            // 'edit_admin', // edit admin name and it's permissions
            // 'delete_admin', // delete admin

            // 'create_role', // create role
            // 'edit_role', // edit role name and it's permissions
            // 'delete_role', // delete role

            // 'create_permission', // create permission
            // 'edit_permission', // edit permission name
            // 'delete_permission', // delete permission

            // 'edit_settings', // edit website settings

            // Supporter

            // 'provide_feedback', // provide feedback
            // 'handle_customer_inquiries', // handle customer inquiries
            // 'assist_with_order_issues', // handle order issues

            // Vendor Manager

            // 'approve_vendor', // approve vendor registration request
            // 'reject_vendor', // reject vendor registration request
            // 'manage_vendor', // manage vendor : block or delete vendor
            // 'communicate_with_vendor', // communicate with vendor about platform infomation or guaidance or issues

            // Product Manager

            // 'approve_product', // approve product request
            // 'reject_product', // reject product request
            // 'delete_product', // delete product
            // 'organize_product', // assing product to the correct category
            // 'create_category',
            // 'edit_category',
            // 'delete_category',
            // 'handle_product_complaints', // handle complaints requests about product

            // // User Manager
            // 'delete_user', // delete user
            // 'block_user', // block user
            // 'monitor_user', // monitor user
            // 'assign_roles', // manage roles with user
            // 'manage_user_requests', // mange requset like user become a vendor or staff member
        ];
        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'admin',
            ]);
        }
        $role = Role::where('name', '=', 'vendor_manager')->first();
        $role->syncPermissions($permissions);
    }
}
