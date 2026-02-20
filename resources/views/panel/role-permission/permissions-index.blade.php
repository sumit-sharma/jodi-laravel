@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Permissions Management</h2>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create New Permission
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
                                {{-- <th>Guard</th> --}}
                                <th>Assigned to Roles</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration + ($permissions->currentPage() - 1) * $permissions->perPage() }}
                                    </td>
                                    <td><strong>{{ $permission->name }}</strong></td>
                                    {{-- <td><span class="badge bg-secondary">{{ $permission->guard_name }}</span></td> --}}
                                    <td>
                                        @if($permission->roles->count() > 0)
                                            @foreach($permission->roles as $role)
                                                <span class="badge bg-info me-1">{{ $role->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">Not assigned</span>
                                        @endif
                                    </td>
                                    <td>{{ $permission->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('permissions.show', $permission->id) }}"
                                                class="btn btn-sm btn-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No permissions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex float-end">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection