@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">
        <div class="mb-4">
            <h2>Create New Role</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}" placeholder="Enter role name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assign Permissions</label>
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
                                                    name="permissions[]" value="{{ $permission->id }}"
                                                    id="permission-{{ $permission->id }}" {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
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
                            <i class="fas fa-save"></i> Create Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
    <script>
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
@endsection