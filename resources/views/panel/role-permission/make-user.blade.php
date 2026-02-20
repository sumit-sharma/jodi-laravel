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
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Role-Permission</a></li>
                                    <li class="breadcrumb-item active">Create User</li>
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
                        <form id="frmAddUser" method="post" action="{{ route('roles-permissions.store-user') }}">
                            @csrf

                            <div class="row">

                                <!-- Department -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">Department</label>
                                    <select class="form-select select2-notag" name="department" required>
                                        <option value="">Select</option>
                                        <option value="DR">Director</option>
                                        <option value="HS">Head of Service Dept.</option>
                                        <option value="BM">Branch Manager</option>
                                        <option value="TC">Tele Councelor</option>
                                        <option value="TL">Team Leader</option>
                                        <option value="RM">Relationship Manager</option>
                                        <option value="BO">Back Office</option>
                                        <option value="EMOLD">Em Old</option>
                                    </select>
                                </div>

                                <div class="col-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select select2-notag" name="roles[]" required>
                                        <option value="">Select</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- User ID -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">User ID</label>
                                    <input class="form-control" type="text" id="username" name="username"
                                        value="{{ old('username') }}" required>
                                </div>

                                <!-- Name -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                                </div>

                                <!-- Email -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">Email ID</label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                        required>
                                </div>

                                <!-- Mobile -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">Mobile No.</label>
                                    <input class="form-control" type="text" name="mobile" value="{{ old('mobile') }}"
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-6 mb-3">
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

    <script>
        $(document).ready(function () {
            $('#frmAddUser').validate({
                ignore: [],
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                errorPlacement: function (error, element) {
                    if (element.hasClass('select2-hidden-accessible')) {
                        error.insertAfter(element.next('.select2')); // place after Select2
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element) {
                    $(element).next('.select2').find('.select2-selection')
                        .addClass('is-invalid');
                },

                unhighlight: function (element) {
                    $(element).next('.select2').find('.select2-selection')
                        .removeClass('is-invalid');
                },
                rules: {
                    department: {
                        required: true
                    },
                    roles: {
                        required: true
                    },
                    username: {
                        required: true,
                        remote: {
                            url: "{{ route('panel.check-exist') }}",
                            type: "POST",
                            data: {
                                table: 'users',
                                whereArray: {
                                    username: function () {
                                        return $("#username").val();
                                    }
                                }
                            }
                        }
                    },
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "[name='password']"
                    }
                },
                messages: {
                    department: {
                        required: "Please select department"
                    },
                    'roles[]': {
                        required: "Please select role"
                    },
                    username: {
                        required: "Please enter username",
                        remote: "This Username already exists"
                    },
                    name: {
                        required: "Please enter name"
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter mobile number",
                        number: "Please enter a valid mobile number",
                        minlength: "Mobile number must be 10 digits",
                        maxlength: "Mobile number must be 10 digits"
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        required: "Please enter confirm password",
                        equalTo: "Password and confirm password do not match"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.col-6').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

@endsection