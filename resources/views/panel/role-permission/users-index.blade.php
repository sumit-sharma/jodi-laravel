@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>User Role Management</h2>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create New User
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Direct Permissions</th>
                                {{-- <th>Created At</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->roles->count() > 0)
                                            @foreach($user->roles as $role)
                                                <span class="badge bg-primary me-1">{{ $role->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No roles</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->permissions->count() > 0)
                                            <span class="badge bg-info">{{ $user->permissions->count() }}</span>
                                        @else
                                            <span class="text-muted">None</span>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $user?->created_at?->format('M d, Y') }}</td> --}}
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- @if($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex float-end">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection