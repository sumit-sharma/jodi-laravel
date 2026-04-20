<?php

namespace Database\Seeders;

use App\Models\EmpDetail;
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


        $superAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
        ], [
            'guard_name' => 'web',
        ]);

        $superAdmin->givePermissionTo(Permission::all());


        $admin = Role::firstOrCreate([
            'name' => 'admin',
        ], [
            'guard_name' => 'web',
        ]);

        // Admin - has all permissions
        $admin->givePermissionTo(Permission::all());

        $adminUser = User::where('username', 9999)->first();
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }

        $superAdminUser = User::firstOrCreate([
            'username' => 2111,
        ], [
            'name' => 'Super Admin',
            'email' => '211.sumit@gmail.com',
            'mobile' => '9667471608',
            'status' => 1,
            'is_blocked' => false,
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        $superAdminUser->assignRole('super-admin');
        $this->assignRoleDept();
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

    private function assignRoleDept()
    {
        $depatments = EmpDetail::query()
            ->whereNotNull('department')
            ->distinct()
            ->pluck('department')
            ->toArray();
        // print_r($depatments);
        foreach ($depatments as $depatment) {
            $role = Role::firstOrCreate([
                'name' => $depatment,
            ], [
                'guard_name' => 'web',
            ]);
        }

        User::with('details')->get()->map(function ($user) {
            if ($user?->details?->department) {
                $user->assignRole($user->details->department);
            }
            // echo ($user->username . " " . $user?->details?->department . "\n");
        });
    }
}
