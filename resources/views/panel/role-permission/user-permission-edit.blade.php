@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">
        <div class="mb-4">
            <h2>Assign Permission: {{ $user->name . ' ' . $user->username }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Permissions Through Role({{ count($userRolePermissions) }})</h5>
                    </div>
                    <div class="card-body">
                        @if(count($userRolePermissions) > 0)
                            <div class="row">
                                @foreach($userRolePermissions as $permission)
                                    <div class="col-md-6 mb-2">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-key"></i> {{ $permission }}
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('roles-permissions.update-user-permission', $user->username) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            {{-- <div class="mb-3">
                                <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $role->name) }}" placeholder="Enter role name" {{
                                    $role->name ===
                                'super-admin' ? 'disabled' : '' }} required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($role->name === 'super-admin')
                                <small class="text-muted">Super Admin role name cannot be changed.</small>
                                @endif
                            </div> --}}

                            <div class="mb-3">
                                <label class="form-label">Assign Permissions to User Directly</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="select-all">
                                            <label class="form-check-label fw-bold" for="select-all">
                                                Select All
                                            </label>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                                            name="permissions[]" value="{{ $permission->name }}"
                                                            id="permission-{{ $permission->id }}" 
                                                            {{ in_array($permission->id, $userDirectPermissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Role
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Check if all permissions are selected on page load
        window.addEventListener('DOMContentLoaded', function () {
            const allCheckboxes = document.querySelectorAll('.permission-checkbox');
            const selectAllCheckbox = document.getElementById('select-all');
            selectAllCheckbox.checked = Array.from(allCheckboxes).every(cb => cb.checked);
        });

        document.getElementById('select-all').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Update select-all checkbox based on individual checkboxes
        document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const allCheckboxes = document.querySelectorAll('.permission-checkbox');
                const selectAllCheckbox = document.getElementById('select-all');
                selectAllCheckbox.checked = Array.from(allCheckboxes).every(cb => cb.checked);
            });
        });
    </script>
@endpush