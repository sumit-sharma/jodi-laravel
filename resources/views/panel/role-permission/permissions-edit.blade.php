@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">
        <div class="mb-4">
            <h2>Edit Permission: {{ $permission->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Permission Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name', $permission->name) }}"
                            placeholder="e.g., create posts, edit users, delete comments" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Use lowercase with spaces (e.g., "create posts", "edit users")</small>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Note:</strong> Changing the permission name will affect all roles and users that have this
                        permission.
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Permission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection