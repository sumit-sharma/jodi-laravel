@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">


        <div class="row">

            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Users</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Role &amp;
                                                    Permission</a>
                                            </li>
                                            <li class="breadcrumb-item active">All Users</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>



                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"
                                        data-bs-toggle="offcanvas" data-bs-target="#filterModal"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;

                                    <a href="{{ request()->url() }}" type="button"
                                        class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</a>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <form class="app-search d-none d-lg-block pt-0 pb-0" method="GET"
                                    action="{{ request()->url() }}">
                                    <div class="position-relative">
                                        @if(request()->has('show_all'))
                                            <input type="hidden" name="show_all" value="1">
                                        @endif
                                        <input type="search" name="search" class="form-control bg-black opacity-50"
                                            placeholder="Search..." value="{{ request()->get('search') }}">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="bx bx-search-alt align-middle"></i></button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 text-right" style="text-align: right;">

                                <div class="mb-4">
                                    <form class="d-inline-block" method="GET" action="{{ request()->url() }}">
                                        <input type="hidden" name="show_all" value="1">
                                        <button type="submit" class="btn btn-primary waves-effect btn-label waves-light"><i
                                                class='bx bx-show label-icon'></i> Show All</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $employees->total() }}</button>
                                    &nbsp;&nbsp;
                                    <a href="{{ route('roles-permissions.make-user') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Create New User
                                    </a>

                                </div>
                            </div>
                            <div class="clearfix"></div>



                        </div>



                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-bordered">
                                    <thead class="table-primary pdng_d">
                                        <tr>
                                            <th data-priority="1" width="">User ID</th>
                                            <th data-priority="2" width="">Name</th>
                                            <th data-priority="3" width="">Dept</th>
                                            <th data-priority="4" width="">Email</th>
                                            <th data-priority="5" width="">Mobile</th>
                                            <th data-priority="6" width="">Shift</th>
                                            <th data-priority="7" width="">Offday</th>
                                            <th data-priority="8" width="">Status</th>
                                            <th data-priority="9" width="">Action</th>
                                            {{-- <th data-priority="9" width="">Reset</th>
                                            <th data-priority="10" width="">Move</th>
                                            <th data-priority="11" width="">Unlock</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody class="pdng_d">
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->username }}</td>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->details?->department }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->mobile }}</td>
                                                <td>{{ $employee->details?->intime }} - {{ $employee->details?->outtime }}</td>
                                                <td>{{ $employee->details?->offday }}</td>
                                                <td>{{ $employee->status == 1 ? 'Working' : 'Left' }}</td>
                                                <td>
                                                    <a href="{{ route('roles-permissions.edit-user', ['username' => $employee->username]) }}"
                                                        class="btn btn-sm btn-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- <a href="javascript:;" class="btn btn-primary btn-sm btn-reset"
                                                        data-username="{{ $employee->username }}"><i
                                                            class="bi bi-r-circle"></i></a> --}}
                                                    @if ($employee->status == 1)
                                                        <a href="javascript:;" class="btn btn-danger btn-sm btn-block-toggle"
                                                            data-username="{{ $employee->username }}" data-blocked="0">
                                                            <i class="bi bi-lock"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:;" class="btn btn-success btn-sm btn-block-toggle"
                                                            data-username="{{ $employee->username }}" data-blocked="1">
                                                            <i class="bi bi-lock-fill"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                                {{ $employees->withQueryString()->links() }}
                            </div>


                        </div>

                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- end row-->



        <!-- right offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="filterModal" aria-labelledby="filterModalLabel">
            <div class="offcanvas-header">
                <h5 id="filterModalLabel">Set Filters</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form id="searchFilterForm" method="GET" action="{{ request()->url() }}">
                    @if(request()->has('show_all'))
                        <input type="hidden" name="show_all" value="1">
                    @endif

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Department:</label>
                            <input name="department" class="form-control" type="text"
                                value="{{ request()->get('department') }}">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Status:</label>
                            <select class="form-select" name="status">
                                <option value="">Select</option>
                                <option value="1" {{ request()->get('status') == '1' ? 'selected' : '' }}>Working</option>
                                <option value="0" {{ request()->get('status') == '0' ? 'selected' : '' }}>Left</option>
                            </select>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Offday:</label>
                            <select class="form-select" name="offday">
                                <option value="">Select</option>
                                <option value="Sunday" {{ request()->get('offday') == 'Sunday' ? 'selected' : '' }}>Sunday
                                </option>
                                <option value="Monday" {{ request()->get('offday') == 'Monday' ? 'selected' : '' }}>Monday
                                </option>
                                <option value="Tuesday" {{ request()->get('offday') == 'Tuesday' ? 'selected' : '' }}>Tuesday
                                </option>
                                <option value="Wednesday" {{ request()->get('offday') == 'Wednesday' ? 'selected' : '' }}>
                                    Wednesday</option>
                                <option value="Thursday" {{ request()->get('offday') == 'Thursday' ? 'selected' : '' }}>
                                    Thursday</option>
                                <option value="Friday" {{ request()->get('offday') == 'Friday' ? 'selected' : '' }}>Friday
                                </option>
                                <option value="Saturday" {{ request()->get('offday') == 'Saturday' ? 'selected' : '' }}>
                                    Saturday</option>
                            </select>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Search</button>
                        </div>
                        <div class="clearfix"></div>





                    </div><!--end row-->
                </form>
            </div>
        </div>



    </div> <!-- container-fluid -->
@endsection

@section('footer-script')
    <script>
        $(document).ready(function () {
            $('.btn-reset').click(function () {
                var username = $(this).data('username')
                var url = "{{ route('password-regenerate', ['username' => ':username']) }}".replace(":username", username);

                // STEP 1: Confirm
                Swal.fire({
                    title: 'Are you sure to reset password?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, reset it!',
                    confirmButtonColor: "#dc3545",
                    cancelButtonText: 'Cancel'
                }).then((result) => {

                    if (!result.isConfirmed) return;
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        success: function (response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success...',
                                    text: response.message,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error...',
                                    text: response.message,
                                });
                            }
                        }
                    });

                })
            });


            $('.btn-block-toggle').click(function () {
                var username = $(this).data('username')
                var blocked = $(this).data('blocked')
                var url = "{{ route('toggle-employee-status', ['username' => ':username']) }}".replace(":username", username);
                if (blocked == 1) {
                    var text = 'This action will unblock the user';
                    var confirmButtonText = 'Yes, unblock it!';
                    var confirmButtonColor = "#28a745";
                } else {
                    var text = 'This action will block the user';
                    var confirmButtonText = 'Yes, block it!';
                    var confirmButtonColor = "#dc3545";
                }

                // STEP 1: Confirm
                Swal.fire({
                    title: 'Are you sure?',
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: confirmButtonText,
                    confirmButtonColor: confirmButtonColor,
                    cancelButtonText: 'Cancel'
                }).then((result) => {

                    if (!result.isConfirmed) return;
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        success: function (response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success...',
                                    text: response.message,
                                }).then(() => {
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error...',
                                    text: response.message,
                                });
                            }
                        }
                    });

                })
            });
        });
    </script>
@endsection