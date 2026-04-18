<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
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


        $results       = DB::select('select permission from jodi_new.permission');
        $permissions   = Arr::pluck($results, 'permission');
        $permissions[] = 'Create Online Data';

        $this->savePermissions($permissions);

        // Create roles and assign permissions

        // Super Admin - has all permissions
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin - has all permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
    }

    private function savePermissions(array $permissions, $guard = 'web')
    {
        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
            ], [
                'guard_name' => $guard,
            ]);
        }
    }
}
