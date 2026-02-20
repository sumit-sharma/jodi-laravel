@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">


        <div class="mb-4">
            <h2>Permission Details: {{ $permission->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Permission Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Name:</th>
                                <td>{{ $permission->name }}</td>
                            </tr>
                            <tr>
                                <th>Guard:</th>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $permission->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $permission->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Permission
                            </a>
                            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Assigned to Roles ({{ $permission->roles->count() }})</h5>
                    </div>
                    <div class="card-body">
                        @if($permission->roles->count() > 0)
                            <div class="row">
                                @foreach($permission->roles as $role)
                                    <div class="col-md-6 mb-2">
                                        <span class="badge bg-info">
                                            <i class="fas fa-user-tag"></i> {{ $role->name }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">This permission is not assigned to any roles.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Users with this Permission ({{ $permission->users->count() }})</h5>
            </div>
            <div class="card-body">
                @if($permission->users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Source</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permission->users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->hasDirectPermission($permission->name))
                                                <span class="badge bg-warning">Direct</span>
                                            @endif
                                            @if($user->hasPermissionTo($permission->name))
                                                <span class="badge bg-info">Via Role</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No users have this permission directly assigned.</p>
                @endif
            </div>
        </div>



    </div> <!-- container-fluid -->
@endsection