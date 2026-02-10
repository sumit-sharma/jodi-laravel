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
                                    <h4 class="mb-sm-0 font-size-18">Daily Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Daily Report</li>
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
                                        {{ $TableData->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>





                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">#</th>
                                                    <th data-priority="2" width="">EmpId</th>
                                                    <th data-priority="3" width="">Name</th>
                                                    <th data-priority="4" width="">New Data</th>
                                                    <th data-priority="5" width="">Edit Data</th>
                                                    <th data-priority="6" width="">Interaction</th>
                                                    <th data-priority="7" width="">Client SL</th>
                                                    <th data-priority="8" width="">Dispatch</th>
                                                    <th data-priority="9" width="">Feedback</th>
                                                    <th data-priority="10" width="">Mtng-By</th>
                                                    <th data-priority="11" width="">Mtng-Fdbk</th>
                                                    <th data-priority="12" width="">Roka</th>
                                                    <th data-priority="13" width="">Fr-Calls</th>
                                                    <th data-priority="14" width="">Nr-Calls</th>
                                                    <th data-priority="15" width="">Fw-Calls</th>
                                                    <th data-priority="16" width="">Ref Name</th>
                                                    <th data-priority="17" width="">Apt Fixed</th>
                                                    <th data-priority="18" width="">Apt Attnd</th>
                                                    <th data-priority="19" width="">No.of Regn</th>
                                                    <th data-priority="20" width="">DM</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($TableData as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->empid }}</td>
                                                        <td>{{ $item->empname }}</td>
                                                        <td>{{ $item->nde > 0 ? $item->nde : '-' }}</td>
                                                        <td>{{ $item->edata > 0 ? $item->edata : '-' }}</td>
                                                        <td>{{ $item->interaction > 0 ? $item->interaction : '-' }}</td>
                                                        <td>{{ $item->sl > 0 ? $item->sl : '-' }}</td>
                                                        <td>{{ $item->ms > 0 ? $item->ms : '-' }}</td>
                                                        <td>{{ $item->fu > 0 ? $item->fu : '-' }}</td>
                                                        <td>{{ $item->ma > 0 ? $item->ma : '-' }}</td>
                                                        <td>{{ $item->mf > 0 ? $item->mf : '-' }}</td>
                                                        <td>{{ $item->rd > 0 ? $item->rd : '-' }}</td>
                                                        <td>{{ $item->fc > 0 ? $item->fc : '-' }}</td>
                                                        <td>{{ $item->nr > 0 ? $item->nr : '-' }}</td>
                                                        <td>{{ $item->flc > 0 ? $item->flc : '-' }}</td>
                                                        <td>{{ $item->refa > 0 ? $item->refa : '-' }}</td>
                                                        <td>{{ $item->af > 0 ? $item->af : '-' }}</td>
                                                        <td>{{ $item->aa > 0 ? $item->aa : '-' }}</td>
                                                        <td>{{ $item->nor > 0 ? $item->nor : '-' }}</td>
                                                        <td>{{ $item->dm > 0 ? $item->dm : '-' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="14" class="text-center">No Data Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>

                                        </table>
                                        {{ $TableData->withQueryString()->links() }}
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
                            <label for="start_date" class="form-label"> Start Date</label>
                            <input class="form-control" type="text" name="start_date"
                                value="{{ request()->get('start_date') }}" id="start_date" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="end_date" class="form-label"> End Date</label>
                            <input class="form-control" type="text" name="end_date" value="{{ request()->get('end_date') }}"
                                id="end_date" autocomplete="off">
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
            $('#start_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
            $('#end_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
@endsection