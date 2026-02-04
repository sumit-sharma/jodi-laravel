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
                                    <h4 class="mb-sm-0 font-size-18">No Meeting Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">No Meeting Report</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>


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
                                        {{ $noMeetings->total() }}</button>
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
                                                    <th data-priority="1">Ref No.</th>
                                                    <th data-priority="2">Gender</th>
                                                    <th data-priority="3">Name</th>
                                                    <th data-priority="4">Born</th>
                                                    <th data-priority="5">Age</th>
                                                    <th data-priority="6">Ms</th>
                                                    <th data-priority="7">Caste</th>
                                                    <th data-priority="8">Height</th>
                                                    <th data-priority="9">Ast</th>
                                                    <th data-priority="10">Ed</th>
                                                    <th data-priority="11">CB</th>
                                                    <th data-priority="12">Family Income</th>
                                                    <th data-priority="13">Location</th>
                                                    <th data-priority="14">Occupation</th>
                                                    <th data-priority="15">Rs</th>
                                                    <th data-priority="16">TC</th>
                                                    <th data-priority="17">RM</th>
                                                    <th data-priority="18">L_CALL</th>
                                                    <th data-priority="19">L_Mail</th>
                                                    <th data-priority="20">L_Mtng</th>
                                                    <th data-priority="21">R_Date</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="pdng_d">
                                                @forelse ($noMeetings as $data)
                                                    <tr data-rno="{{ $data->rno }}">
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $data->rno }}">{{ $data->rno }}</a></td>
                                                        <td>{{ $data->g }}</td>
                                                        <td>{{ $data->refname }}
                                                            {!! $data->vc == 1 ? '<i class="bi bi-vimeo"></i>' : '' !!}
                                                            {!! $data->oc == 1 ? '<i class="text-danger"><strong>O</strong></i>' : '' !!}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data?->bio?->dob)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data?->bio?->dob)->age }}</td>
                                                        <td>{{ ms_label($data->ms) }}</td>
                                                        <td>{{ $data->cst }}</td>
                                                        <td>{{ $data->hg }}</td>
                                                        <td>{{ $data?->bio?->astrostatus->label() }}</td>
                                                        <td>{{ $data?->bio?->education->label() }}</td>
                                                        <td>{{ $data->personal->budget }}</td>
                                                        <td>{{ $data?->income?->income }}</td>
                                                        <td>{{ $data->personal->arealocation }}</td>
                                                        <td>{{ $data->occupation?->name }}</td>
                                                        <td>{{ rs_label($data?->rs) }}</td>
                                                        <td>{{ $data->tc }}</td>
                                                        <td>{{ $data->rm }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_call)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mail)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mtng)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data?->bio?->profiledate)->format('M d Y') }}
                                                        </td>
                                                        {{-- <td>
                                                            <div class="btn-group me-1 mt-2">
                                                                <span class="dropdown-toggle  dropstart dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i data-feather="more-vertical"></i>
                                                                </span>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.edit', ['customer' => $data->rno]) }}"
                                                                        target="_blank">Edit
                                                                        Profile</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.uplod-photo', ['rno' => $data->rno]) }}"
                                                                        target="_blank">Upload
                                                                        Photo</a>
                                                                </div>
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="21" class="text-center">No data found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $noMeetings->links() }}
                                    </div>

                                    <!-- Modal -->
                                    @include('components.biodata_modal')
                                    <!-- end modal -->

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
                            <label class="form-label">Meeting Type:</label>
                            <select class="form-select" name="dtype">
                                <option value="">Select</option>
                                <option value="P" {{ request()->get('dtype') == 'P' ? 'selected' : '' }}>Paid Member</option>
                                <option value="N" {{ request()->get('dtype') == 'N' ? 'selected' : '' }}>Non Paid Member
                                </option>
                                <option value="P,N" {{ request()->get('dtype') == 'P,N' ? 'selected' : '' }}>Both Paid & Non
                                    Paid</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">No Meeting Period:</label>
                            <select class="form-select" name="ntp">
                                <option value="">Select</option>
                                <option value="7" {{ request()->get('ntp') == '7' ? 'selected' : '' }}>No Meeting in last 7
                                    Days
                                </option>
                                <option value="15" {{ request()->get('ntp') == '15' ? 'selected' : '' }}>No Meeting in last 15
                                    Days</option>
                                <option value="30" {{ request()->get('ntp') == '30' ? 'selected' : '' }}>No Meeting in last 1
                                    Month</option>
                                <option value="90" {{ request()->get('ntp') == '90' ? 'selected' : '' }}>No Meeting in last 3
                                    Months</option>
                                <option value="180" {{ request()->get('ntp') == '180' ? 'selected' : '' }}>No Meeting in last
                                    6
                                    Months</option>
                                <option value="365" {{ request()->get('ntp') == '365' ? 'selected' : '' }}>No Meeting in last
                                    1
                                    Year</option>
                            </select>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Select Employee:</label>
                            <select class="form-select select2-notag" name="empid">
                                <option value="">Select</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->username }}" {{ request()->get('empid') == $employee->username ? 'selected' : '' }}>
                                        {{ $employee->username . ' - ' . $employee->name }}
                                    </option>
                                @endforeach
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