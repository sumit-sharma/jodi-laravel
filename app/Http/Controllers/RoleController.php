<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        return view('panel.role-permission.roles-index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('panel.role-permission.roles-create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(RoleRequest $request)
    {

        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);

        if ($request->has('permissions')) {
            $permissions = array_map('intval', $request->permissions);
            $role->syncPermissions($permissions);
        }

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully with permissions.');
    }

    /**
     * Display the specified role.
     */
    public function show(Role $role)
    {
        $role->load('permissions', 'users');
        return view('panel.role-permission.roles-show', compact('role'));
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('panel.role-permission.roles-edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        // dd($request->permissions);
        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $permissions = array_map('intval', $request->permissions);
            $role->syncPermissions($permissions);
        } else {
            $role->syncPermissions([]);
        }

        return back()->with('success', 'Role updated successfully.');
        // return redirect()->route('roles.index')
        //     ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(Role $role)
    {
        // Prevent deletion of super-admin role
        if (in_array($role->name, ['super-admin', 'admin'])) {
            return redirect()->route('roles.index')
                ->with('error', 'Cannot delete ' . $role->name . ' role.');
        }

        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully.');
    }

    /**
     * Assign permissions to a role.
     */
    public function assignPermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $role->givePermissionTo($request->permissions);

        return redirect()->back()
            ->with('success', 'Permissions assigned successfully.');
    }

    /**
     * Remove a specific permission from a role.
     */
    public function removePermission(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);

        return redirect()->back()
            ->with('success', 'Permission removed successfully.');
    }
}
