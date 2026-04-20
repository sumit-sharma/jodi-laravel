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
                                    <h4 class="mb-sm-0 font-size-18">{{ $heading }}</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Follow</a></li>
                                            <li class="breadcrumb-item active">{{ $heading }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

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
                                        {{ $followups->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>



                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-bordered">
                                    <thead class="table-primary pdng_d">
                                        <tr>
                                            <th data-priority="1" width="">Ref No.</th>
                                            <th data-priority="2" width="">G</th>
                                            <th data-priority="3" width="">Member Name</th>
                                            <th data-priority="4" width="">Age</th>
                                            <th data-priority="5" width="">OC</th>
                                            <th data-priority="6" width="">PI</th>
                                            <th data-priority="7" width="">RS</th>
                                            <th data-priority="8" width="">MS</th>
                                            <th data-priority="9" width="">City</th>
                                            <th data-priority="10" width="">Phone</th>
                                            <th data-priority="11" width="">TC</th>
                                            <th data-priority="12" width="">Assign To</th>
                                            <th data-priority="13" width="">Assign Dt</th>
                                            <th data-priority="14" width="">Assign By</th>
                                            <th data-priority="15" width="">L Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="pdng_d">
                                        @forelse ($followups as $followup)
                                            <tr>
                                                <td>
                                                    <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                        data-bs-target="#Modal_biodata"
                                                        data-rno="{{ $followup->rno }}">{{ $followup->rno }}</a>
                                                </td>
                                                <td>{{ $followup->viewProfile?->g }}</td>
                                                <td>{{ $followup->viewProfile?->refname }}</td>
                                                <td>{{ \Carbon\Carbon::parse($followup->viewProfile?->bio?->dob)->age }}</td>
                                                <td>{{ $followup->viewProfile?->occupation?->name }}</td>
                                                <td>{{ $followup->viewProfile?->income?->income }}</td>
                                                <td>{{  rs_label($followup?->viewProfile?->rs) }}</td>
                                                <td>{{ ms_label($followup?->viewProfile?->ms) }}</td>
                                                <td>{{ $followup?->viewProfile?->personal?->rcity }}</td>
                                                <td>{{ $followup?->viewProfile?->personal?->contactphone }}</td>
                                                <td>{{ $followup?->viewProfile?->tc }}</td>
                                                <td>{{ $followup->empid }}</td>
                                                <td>{{ convertCommonDate($followup->dated) }}</td>
                                                <td>{{ $followup->d_by }}</td>
                                                <td>{{ convertCommonDate($followup->viewProfile->last_call) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="15" class="text-center">No data available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{ $followups->withQueryString()->links() }}
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
                    <div class="row">

                        <div class="col-12 mb-3">
                            <label class="form-label">Gender:</label>
                            <select class="form-select" name="g">
                                <option value="">Select</option>
                                <option value="M" {{ request()->get('g') == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ request()->get('g') == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        {{-- <div class="col-12 mb-3">
                            <label class="form-label">Occupation:</label>
                            <select name="oc" class="form-select">
                                <option value="">Select</option>
                                @foreach ($occupations as $occupation)
                                <option value="{{ $occupation->occ_code }}" {{ request()->get('oc') == $occupation->occ_code
                                    ? 'selected' : '' }}>{{ $occupation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div> --}}

                        <div class="col-12 mb-3">
                            <label class="form-label">Emp Id:</label>
                            <input name="empid" class="form-control" type="text" value="{{ request()->get('empid') }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Assign By:</label>
                            <input name="d_by" class="form-control" type="text" value="{{ request()->get('d_by') }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Start Date:</label>
                            <input id="start_date" name="start_date" class="form-control" type="text"
                                value="{{ request()->get('start_date') }}" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">End Date:</label>
                            <input id="end_date" name="end_date" class="form-control" type="text"
                                value="{{ request()->get('end_date') }}" autocomplete="off">
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



        @include('components.biodata_modal')




    </div> <!-- container-fluid -->

@endsection
@section('footer-script')

    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <script>
        $(function () {

            $("#start_date").datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
            });
            $("#end_date").datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
            });

        });
    </script>

@endsection