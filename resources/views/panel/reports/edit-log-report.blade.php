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
                                    <h4 class="mb-sm-0 font-size-18">Edit Log Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Edit Log Report</li>
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
                                        {{ $editLogReports->total() }}</button>
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
                                                    <th data-priority="1" width="">Date Time</th>
                                                    <th data-priority="2" width="">Emp</th>
                                                    <th data-priority="3" width="">RNO</th>
                                                    <th data-priority="4" width="">Name</th>
                                                    <th data-priority="5" width="">Field</th>
                                                    <th data-priority="6" width="">Old Value</th>
                                                    <th data-priority="7" width="">New Value</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($editLogReports as $item)
                                                    <tr>
                                                        <td>{{ convertCommonDate($item->dated) . ' ' . convertCommonDate($item->time, 'h:i A') }}
                                                        </td>
                                                        <td>{{ $item->empid . ' ' . $item->employee?->name }}</td>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $item->rno }}">{{ $item->rno }}</a></td>
                                                        <td class="{{ $item->viewProfile->status == 'F' ? 'bg-pink' : '' }}">
                                                            {{ $item->viewProfile?->refname }}
                                                        </td>
                                                        <td>{{ $item->field }}</td>
                                                        <td>{{ $item->olddata }}</td>
                                                        <td>{{ $item->newdata }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">No edit log found for the period
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $editLogReports->withQueryString()->links() }}
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
                            <label for="from_date" class="form-label"> Edit Log Report From
                            </label>
                            <input class="form-control" type="text" name="from_date"
                                value="{{ request()->get('from_date') }}" id="from_date" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="to_date" class="form-label"> Edit Log Report To
                            </label>
                            <input class="form-control" type="text" name="to_date" value="{{ request()->to_date }}"
                                id="to_date" autocomplete="off">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="rno" class="form-label"> RNO
                            </label>
                            <input class="form-control" type="text" name="rno" value="{{ request()->get('rno') }}" id="rno"
                                autocomplete="off">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">EmpId:</label>
                            <select name="empid" class="form-control select2-notag">
                                <option value="">Select EmpId</option>
                                @foreach ($employees as $user)
                                    <option value="{{ $user->username }}" {{ request()->get('empid') == $user->username ? 'selected' : '' }}>
                                        {{ $user->username }} - {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="clearfix"></div>
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