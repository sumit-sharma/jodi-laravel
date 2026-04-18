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
                                    <h4 class="mb-sm-0 font-size-18">Finance Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Finance Report</li>
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
                                                    <th data-priority="2" width="">RNo</th>
                                                    <th data-priority="3" width="">Name</th>
                                                    <th data-priority="4" width="">TC</th>
                                                    <th data-priority="5" width="">TL</th>
                                                    <th data-priority="6" width="">RM</th>
                                                    <th data-priority="7" width="">Dated</th>
                                                    <th data-priority="8" width="">Details</th>
                                                    <th data-priority="9" width="">Amount</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($TableData as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $item->rno }}">
                                                                {{ $item->rno }}</a>
                                                        </td>
                                                        <td>{{ $item->viewProfile->refname }}</td>
                                                        <td>{{ $item->viewProfile->tc }}</td>
                                                        <td>{{ $item->viewProfile->tl }}</td>
                                                        <td>{{ $item->viewProfile->rm }}</td>
                                                        <td>{{ convertCommonDate($item->dated) }}</td>
                                                        <td>{{ $item->details }}</td>
                                                        <td>{{ $item->amount }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No Data Found</td>
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

        @include('components.biodata_modal')




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

                        <div class="col-12 mb-3">
                            <label class="form-label">TC:</label>
                            <input name="tc" class="form-control" type="text"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ request()->get('tc') }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">TL:</label>
                            <input name="tl" class="form-control" type="text"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ request()->get('tl') }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">RM:</label>
                            <input name="rm" class="form-control" type="text"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ request()->get('rm') }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Search</button>
                        </div>
                        <div class="clearfix"></div>

                    </div><!--end row-->
                    <input type="hidden" name="search" value="{{ request()->get('search') }}">
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