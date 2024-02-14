<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('role_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = permissions();
        $roleId = 1;

        foreach ($permissions as $permissionKey => $permissionOptions) {
            foreach ($permissionOptions as $permissionOptionKey => $permissionOptionValue) {
                $permissionName = $permissionKey . '-' . $permissionOptionKey;

                RolePermission::updateOrInsert(
                    ['role_id' => $roleId, 'permission' => $permissionName],
                    ['permission' => $permissionName,'created_at' => now()]
                );
            }

        }

    }
}
