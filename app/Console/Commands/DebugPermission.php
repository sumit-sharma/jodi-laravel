<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DebugPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleName = 'TC';
        $permissionName = 'Transfer RM/TC';

        $role = \Spatie\Permission\Models\Role::where('name', $roleName)->first();
        $permission = \Spatie\Permission\Models\Permission::where('name', $permissionName)->first();

        $this->info("Checking Role: $roleName");
        if ($role) {
            $this->info("Role '$roleName' exists. Guard: " . $role->guard_name);
        } else {
            $this->error("Role '$roleName' does not exist.");
        }

        $this->info("Checking Permission: $permissionName");
        if ($permission) {
            $this->info("Permission '$permissionName' exists. Guard: " . $permission->guard_name);
        } else {
            $this->error("Permission '$permissionName' does not exist.");
        }

        if ($role && $permission) {
            if ($role->hasPermissionTo($permissionName)) {
                $this->info("Role '$roleName' HAS permission '$permissionName'.");
            } else {
                $this->error("Role '$roleName' DOES NOT HAVE permission '$permissionName'.");
            }
        }

        $users = \App\Models\User::role($roleName)->get();
        $this->info("Found " . $users->count() . " users with role '$roleName'.");

        foreach ($users as $user) {
            $this->info("User: " . $user->name . " (ID: " . $user->id . ")");
            if ($user->can($permissionName)) {
                $this->info("  - Can '$permissionName': YES");
            } else {
                $this->error("  - Can '$permissionName': NO");
            }
        }
    }
}
