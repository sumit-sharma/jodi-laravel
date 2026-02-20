@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Roles Management</h2>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create New Role
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
                                <th>Permissions Count</th>
                                <th>Users Count</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration + ($roles->currentPage() - 1) * $roles->perPage() }}</td>
                                    <td>
                                        <strong>{{ $role->name }}</strong>
                                        @if($role->name === 'super-admin')
                                            <span class="badge bg-danger">Protected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $role->permissions->count() }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $role->users->count() }}</span>
                                    </td>
                                    <td>{{ $role->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-info"
                                                title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if(!in_array($role->name, ['super-admin', 'admin']))
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No roles found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $roles->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection