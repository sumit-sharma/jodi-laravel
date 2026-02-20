<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $results = DB::select('select * from old_jodi.permission');
        foreach ($results as $result) {
            echo nl2br($result->permission . "\n");
            Permission::updateOrCreate([
                'name' => $result->permission,
            ], [
                'guard_name' => 'web',
            ]);
            // $empIds = explode(',', $result->empid);
            // foreach ($empIds as $empId) {
            //     $user = User::where('username', $empId)->first();
            //     if ($user) {
            //         $user->assignRole($result->permission);
            //     }
            // }
        }

        // Create roles and assign permissions

        // Super Admin - has all permissions
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin - has all permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
    }
}
