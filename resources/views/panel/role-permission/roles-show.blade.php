@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">
        <div class="mb-4">
            <h2>Role Details: {{ $role->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Role Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="150">Name:</th>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <th>Guard:</th>
                                <td>{{ $role->guard_name }}</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $role->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Updated:</th>
                                <td>{{ $role->updated_at->format('M d, Y H:i') }}</td>
                            </tr>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Role
                            </a>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Permissions ({{ $role->permissions->count() }})</h5>
                    </div>
                    <div class="card-body">
                        @if($role->permissions->count() > 0)
                            <div class="row">
                                @foreach($role->permissions as $permission)
                                    <div class="col-md-6 mb-2">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-key"></i> {{ $permission->name }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">No permissions assigned to this role.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Users with this Role ({{ $role->users->count() }})</h5>
            </div>
            <div class="card-body">
                @if($role->users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($role->users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        {{-- <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No users have this role.</p>
                @endif
            </div>
        </div>
    </div>
@endsection