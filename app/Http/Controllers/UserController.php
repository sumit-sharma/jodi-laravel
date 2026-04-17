<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function __construct(private User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with('roles', 'permissions')->paginate(10);
        return view('panel.role-permission.users-index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('panel.role-permission.users-create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }

        if ($request->has('permissions')) {
            $user->givePermissionTo($request->permissions);
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        $user->load('roles', 'permissions');
        $allPermissions = $user->getAllPermissions();

        return view('panel.role-permission.users-show', compact('user', 'allPermissions'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('panel.role-permission.users-edit', compact('user', 'roles', 'permissions', 'userRoles', 'userPermissions'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Sync roles
        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        } else {
            $user->syncRoles([]);
        }

        // Sync direct permissions
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->syncPermissions([]);
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Prevent deletion of current user
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Assign roles to a user.
     */
    public function assignRoles(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id'
        ]);

        $user->assignRole($request->roles);

        return redirect()->back()
            ->with('success', 'Roles assigned successfully.');
    }

    /**
     * Remove a specific role from a user.
     */
    public function removeRole(User $user, Role $role)
    {
        $user->removeRole($role);

        return redirect()->back()
            ->with('success', 'Role removed successfully.');
    }

    /**
     * Assign permissions to a user.
     */
    public function assignPermissions(Request $request, User $user)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $user->givePermissionTo($request->permissions);

        return redirect()->back()
            ->with('success', 'Permissions assigned successfully.');
    }

    /**
     * Remove a specific permission from a user.
     */
    public function removePermission(User $user, Permission $permission)
    {
        $user->revokePermissionTo($permission);

        return redirect()->back()
            ->with('success', 'Permission removed successfully.');
    }

    public function showUserPermissions($id)
    {
        $user = $this->user->where('username', $id)->first();
        $userPermissions = $user->permissions->pluck('id')->toArray();
        $userRolePermissions = $user->roles->first()?->permissions?->pluck('name', 'id')->toArray() ?? [];
        $userRolePermissionIds = array_keys($userRolePermissions);
        $permissions = Permission::whereNotIn('id', $userRolePermissionIds)->get();
        $userDirectPermissions = $user->getDirectPermissions()->pluck('id')->toArray();
        // dd($userDirectPermissions);
        return view('panel.role-permission.user-permission-edit', compact('user', 'permissions', 'userPermissions', 'userRolePermissions', 'userRolePermissionIds', 'userDirectPermissions'));
    }

    public function updateUserPermissions(Request $request, $id)
    {
        // return $request->all();
        $user = $this->user->where('username', $id)->first();
        if ($user->syncPermissions($request->permissions)) {
            return back()
                ->with('success', 'User permissions updated successfully.');
        }
        return back()
            ->with('error', 'User permissions updated failed.');
    }
}
