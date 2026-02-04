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
                                    <h4 class="mb-sm-0 font-size-18">Appointment Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Appointment Report</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">


                            <div class="col-md-8 col-12">
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
                                        <input type="search" name="search" class="form-control bg-black opacity-50"
                                            placeholder="Search..." value="{{ request()->get('search') }}">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="bx bx-search-alt align-middle"></i></button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $appointments?->total() ?? 0 }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>


                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">#</th>
                                                    <th data-priority="2" width="">Name</th>
                                                    <th data-priority="3" width="">EmpId</th>
                                                    <th data-priority="4" width="">R-Time</th>
                                                    <th data-priority="5" width="">L-Time</th>
                                                    <th data-priority="6" width="">In Time</th>
                                                    <th data-priority="7" width="">Out Time</th>
                                                    <th data-priority="8" width="">Status</th>
                                                    <th data-priority="9" width="">Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @if(isset($appointments) && $appointments->count() > 0)
                                                    @foreach ($appointments as $appointment)
                                                        <tr>
                                                            <td>{{ $appointment->rno }}</td>
                                                            <td>{{ $appointment?->viewProfile?->refname }}</td>
                                                            <td>{{ $appointment->empid }}</td>
                                                            <td>{{ $appointment->aptdate . ' ' . $appointment->apttime }}</td>
                                                            <td>{{ $appointment->contactaddress }}</td>
                                                            <td>{{ $appointment->contactphone }}</td>
                                                            <td>{{ $appointment->apttype }}</td>
                                                            <td>{{ $appointment->remarks }}</td>
                                                            <td>{!! $appointment->aptstatus->label() !!}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="9" class="text-center">No Appointment Found</td>
                                                    </tr>
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>


                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>

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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="from_date" class="form-label"> Appointment Report From
                            </label>
                            <input class="form-control" type="text" name="from_date"
                                value="{{ request()->get('from_date') }}" id="from_date" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="to_date" class="form-label"> Appointment Report To
                            </label>
                            <input class="form-control" type="text" name="to_date" value="{{ request()->to_date }}"
                                id="to_date" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="empid" class="form-label"> Select Employee Code</label>
                            <select class="form-select select2-notag" name="empid" id="empid">
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->username }}" {{ request()->get('empid') == $employee->username ? 'selected' : '' }}>
                                        {{ $employee->username . '-' . $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3 mt-3">
                            <label for="example-text-input" class="form-label"> Select Appointment
                                Type</label>
                            <select class="form-select" name="apttype">
                                <option value="">Select Appointment Type</option>
                                <option value="Final" {{ request()->apttype == 'Final' ? 'selected' : '' }}>
                                    Final</option>
                                <option value="Pickup" {{ request()->apttype == 'Pickup' ? 'selected' : '' }}>
                                    Pickup</option>
                                <option value="Home Visit" {{ request()->apttype == 'Home Visit' ? 'selected' : '' }}>Home
                                    Visit</option>
                                <option value="Upgradation" {{ request()->apttype == 'Upgradation' ? 'selected' : '' }}>
                                    Upgradation</option>
                                <option value="Meeting" {{ request()->apttype == 'Meeting' ? 'selected' : '' }}>Meeting
                                </option>
                            </select>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3 mt-3">
                            <label for="example-text-input" class="form-label">Select Appointment
                                Status</label>
                            <select class="form-select" name="aptstatus">
                                <option value="">Select Appointment Status</option>
                                <option value="0" {{ request()->get('aptstatus') == '0' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="1" {{ request()->get('aptstatus') == '1' ? 'selected' : '' }}>Done
                                </option>
                                <option value="2" {{ request()->get('aptstatus') == '2' ? 'selected' : '' }}>
                                    Cancelled</option>
                                <option value="3" {{ request()->get('aptstatus') == '3' ? 'selected' : '' }}>
                                    Postponed</option>
                                <option value="4" {{ request()->get('aptstatus') == '4' ? 'selected' : '' }}>All
                                </option>
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
    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function () {
            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

            $('#from_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                maxDate: today,
            });
            $('#to_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                minDate: function () {
                    return $('#from_date').val();
                },
                maxDate: today,
            });
        });
    </script>

@endsection