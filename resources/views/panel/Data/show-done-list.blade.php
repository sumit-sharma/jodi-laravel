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
                                    <h4 class="mb-sm-0 font-size-18">Show Done List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">Show Done List</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>
                            <div class="col-12">
                                <table class="table table-bordered">
                                    @foreach ($fixGroupedYear as $item)
                                        <tr>
                                            <td>{{ $item->fix_year }}</td>
                                            <td>{{ $item->total }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="col-md-8 col-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"
                                        data-bs-toggle="offcanvas" data-bs-target="#filterModal"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;

                                    <a href="{{ request()->url() }}" type="button"
                                        class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</a>

                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-success waves-effect btn-label waves-light"><i
                                            class="bx dripicons-plus label-icon"></i> Add</button>
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
                                                    <th data-priority="1" width="">Bride Ref. ID</th>
                                                    <th data-priority="2" width="">Bride Name</th>
                                                    <th data-priority="3" width="">Occupation</th>
                                                    <th data-priority="4" width="">Location</th>
                                                    <th data-priority="5" width="">Month</th>
                                                    <th data-priority="6" width="">Year</th>
                                                    <th data-priority="7" width="">Groom Ref. ID</th>
                                                    <th data-priority="8" width="">Groom Name</th>
                                                    <th data-priority="9" width="">Occupation</th>
                                                    <th data-priority="10" width="">Location</th>
                                                    <th data-priority="11" width="">R-Date</th>
                                                    <th data-priority="12" width="">W-date</th>
                                                    <th data-priority="13" width="">By-1</th>
                                                    <th data-priority="14" width="">By-2</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($TableData as $member)
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $member->rno }}">
                                                                {{ $member->br_rno }}</a>
                                                        </td>
                                                        <td>{{ $member->br_name }}</td>
                                                        <td>{{ $member->br_business }}</td>
                                                        <td>{{ $member->br_location }}</td>
                                                        <td>{{ Carbon\Carbon::create()->month($member->fix_month)->format('F') }}</td>
                                                        <td>{{ $member->fix_year }}</td>
                                                        <td>{{ $member->gr_rno }}</td>
                                                        <td>{{ $member->gr_name }}</td>
                                                        <td>{{ $member->gr_business }}</td>
                                                        <td>{{ $member->gr_location }}</td>
                                                        <td>{{ $member->rdate }}</td>
                                                        <td>{{ $member->wdate }}</td>
                                                        <td>{{ $member->done_by1 }}</td>
                                                        <td>{{ $member->done_by2 }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="14" class="text-center">No Data Found</td>
                                                    </tr>
                                                @endforelse
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
                            <label class="form-label">Hold Req By:</label>
                            <input name="hold_req_by" class="form-control" type="text"
                                value="{{ request()->get('hold_req_by') }}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Hold By:</label>
                            <input name="hold_by" class="form-control" type="text" value="{{ request()->get('hold_by') }}">
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




    </div> <!-- container-fluid -->
@endsection