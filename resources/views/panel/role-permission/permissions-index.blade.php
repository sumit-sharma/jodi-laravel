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
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="mb-3">
                            {{-- <button data-bs-toggle="offcanvas" data-bs-target="#filterModal" type="button"
                                class="btn btn-primary waves-effect btn-label waves-light"><i
                                    class="bx bx-filter-alt label-icon"></i> Filter</button> --}}
                            &nbsp;&nbsp;
                            <a href="{{ request()->url() }}" class="btn btn-primary waves-effect btn-label waves-light"><i
                                    class="bx bx-reset label-icon"></i> Reset</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <form class="app-search d-none d-lg-block pt-0 pb-0">
                            <div class="position-relative">
                                <form method="GET" action="{{ request()->url() }}">
                                    <input type="search" name="search" class="form-control bg-black opacity-50"
                                        placeholder="Search..." value="{{ request()->get('search') }}">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="bx bx-search-alt align-middle"></i></button>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-12 text-right" style="text-align: right;">
                        <div class="mb-4">
                            <button type="button" class="btn btn-secondary">Total Record -
                                {{ $permissions->total() }}</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

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
                    {{ $permissions->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection