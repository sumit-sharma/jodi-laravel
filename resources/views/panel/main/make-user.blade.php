@extends('layouts.home')
@section('main-content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Page Title -->
                        <div class="row mb-3">
                            <div class="col-12 d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Create New User</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Main</a></li>
                                    <li class="breadcrumb-item active">User Page</li>
                                </ol>
                            </div>
                        </div>

                        <hr>

                        <!-- Radio -->
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                    <label class="form-check-label" for="formRadios1">
                                        Elite Marriage Bureau
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Form Start -->
                        <form method="post" action="{{ route('panel.make-user') }}">
                            @csrf

                            <div class="row">

                                <!-- Department -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Department</label>
                                    <select class="form-select" name="department" required>
                                        <option value="">Select</option>
                                        <option value="Director">Director</option>
                                        <option value="Head of Service Dept.">Head of Service Dept.</option>
                                        <option value="Branch Manager">Branch Manager</option>
                                        <option value="Tele Councelor">Tele Councelor</option>
                                        <option value="Team Leader">Team Leader</option>
                                        <option value="Relationship Manager">Relationship Manager</option>
                                        <option value="Back Office">Back Office</option>
                                        <option value="Emp Old">Emp Old</option>
                                    </select>
                                </div>

                                <!-- User ID -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">User ID</label>
                                    <input class="form-control" type="text" name="username" value="{{ old('username') }}"
                                        required>
                                </div>

                                <!-- Name -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Email ID</label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                        required>
                                </div>

                                <!-- Mobile -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Mobile No.</label>
                                    <input class="form-control" type="text" name="mobile" value="{{ old('mobile') }}"
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" required>
                                </div>

                                <!-- Submit -->
                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">
                                        Make User
                                    </button>
                                </div>

                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div>
            </div>
        </div>

        <!-- end row-->


    </div>
@endsection

@section('footer-script')

@endsection