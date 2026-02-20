<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     */
    public function index()
    {
        $permissions = Permission::with('roles')->paginate(15);
        return view('panel.role-permission.permissions-index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        return view('panel.role-permission.permissions-create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(PermissionRequest $request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified permission.
     */
    public function show(Permission $permission)
    {
        $permission->load('roles', 'users');
        return view('panel.role-permission.permission-show', compact('permission'));
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(Permission $permission)
    {
        return view('panel.role-permission.permissions-edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update(['name' => $request->name]);

        return redirect()->route('permissions.index')
            ->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission)
    {
        // Check if permission is assigned to any roles
        if ($permission->roles()->count() > 0) {
            return redirect()->route('permissions.index')
                ->with('error', 'Cannot delete permission that is assigned to roles.');
        }

        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Permission deleted successfully.');
    }
}
