@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

<div class="mb-4">
    <h2>Edit User: {{ $user->name }}</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <h5 class="mb-3">User Information</h5>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name', $user->name) }}" 
                           placeholder="Enter full name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email', $user->email) }}" 
                           placeholder="Enter email address" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" 
                           placeholder="Leave blank to keep current password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Only fill if you want to change the password</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" 
                           id="password_confirmation" name="password_confirmation" 
                           placeholder="Re-enter new password">
                </div>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">Assign Roles</h5>
            <div class="card mb-3">
                <div class="card-body">
                    @if($roles->count() > 0)
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                               type="checkbox" 
                                               name="roles[]" 
                                               value="{{ $role->id }}" 
                                               id="role-{{ $role->id }}"
                                               {{ in_array($role->id, old('roles', $userRoles)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="role-{{ $role->id }}">
                                            {{ $role->name }}
                                            <small class="text-muted">({{ $role->permissions->count() }} permissions)</small>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">No roles available.</p>
                    @endif
                </div>
            </div>

            <h5 class="mb-3">Direct Permissions (Optional)</h5>
            <div class="card mb-3">
                <div class="card-body">
                    @if($permissions->count() > 0)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="select-all-permissions">
                            <label class="form-check-label fw-bold" for="select-all-permissions">
                                Select All
                            </label>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input permission-checkbox" 
                                               type="checkbox" 
                                               name="permissions[]" 
                                               value="{{ $permission->id }}" 
                                               id="permission-{{ $permission->id }}"
                                               {{ in_array($permission->id, old('permissions', $userPermissions)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">No permissions available.</p>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update User
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script>
    // Check if all permissions are selected on page load
    window.addEventListener('DOMContentLoaded', function() {
        const allCheckboxes = document.querySelectorAll('.permission-checkbox');
        const selectAllCheckbox = document.getElementById('select-all-permissions');
        if (selectAllCheckbox && allCheckboxes.length > 0) {
            selectAllCheckbox.checked = Array.from(allCheckboxes).every(cb => cb.checked);
        }
    });

    document.getElementById('select-all-permissions')?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const allCheckboxes = document.querySelectorAll('.permission-checkbox');
            const selectAllCheckbox = document.getElementById('select-all-permissions');
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = Array.from(allCheckboxes).every(cb => cb.checked);
            }
        });
    });
</script>
@endpush
