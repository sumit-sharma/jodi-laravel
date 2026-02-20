@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

<div class="mb-4">
    <h2>User Details: {{ $user->name }}</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">User Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="150">Name:</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Created:</th>
                        <td>{{ $user->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Updated:</th>
                        <td>{{ $user->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit User
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Assigned Roles ({{ $user->roles->count() }})</h5>
            </div>
            <div class="card-body">
                @if($user->roles->count() > 0)
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($user->roles as $role)
                            <div class="badge bg-primary p-2">
                                <i class="fas fa-user-tag"></i> {{ $role->name }}
                                <span class="badge bg-light text-dark ms-1">{{ $role->permissions->count() }} perms</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No roles assigned to this user.</p>
                @endif
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Direct Permissions ({{ $user->permissions->count() }})</h5>
            </div>
            <div class="card-body">
                @if($user->permissions->count() > 0)
                    <div class="row">
                        @foreach($user->permissions as $permission)
                            <div class="col-md-6 mb-2">
                                <span class="badge bg-warning">
                                    <i class="fas fa-key"></i> {{ $permission->name }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No direct permissions assigned.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">All Permissions ({{ $allPermissions->count() }})</h5>
        <small class="text-muted">Includes permissions from roles and direct permissions</small>
    </div>
    <div class="card-body">
        @if($allPermissions->count() > 0)
            <div class="row">
                @foreach($allPermissions->groupBy(function($item) {
                    return explode(' ', $item->name)[0];
                }) as $group => $permissions)
                    <div class="col-md-6 mb-3">
                        <h6 class="text-capitalize">{{ $group }}</h6>
                        <div class="d-flex flex-wrap gap-1">
                            @foreach($permissions as $permission)
                                <span class="badge bg-info">{{ $permission->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">This user has no permissions.</p>
        @endif
    </div>
</div>
</div>
@endsection
