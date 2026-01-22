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
                                    <h4 class="mb-sm-0 font-size-18">Show Advt Data</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">Show Advt Data</li>
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
                                        {{ $advtdatas->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Refrence ID</th>
                                                    <th data-priority="2" width="">Gender</th>
                                                    <th data-priority="3" width="">Age</th>
                                                    <th data-priority="4" width="">Hght</th>
                                                    <th data-priority="5" width="">Community</th>
                                                    <th data-priority="6" width="">Education</th>
                                                    <th data-priority="7" width="">Occupation</th>
                                                    <th data-priority="8" width="">Number</th>
                                                    <th data-priority="9" width="">Email ID</th>
                                                    <th data-priority="10" width="">Remarks</th>
                                                    <th data-priority="11" width="">Asgn. To</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($advtdatas as $item)
                                                    <tr>
                                                        <td>{{ $item->rno }}</td>
                                                        <td>{{ $item->matchfor }}</td>
                                                        <td>{{ $item->age }}</td>
                                                        <td>{{ $item->hght }}</td>
                                                        <td>{{ $item->community }}</td>
                                                        <td>{{ $item->education }}</td>
                                                        <td>{{ $item->occupation }}</td>
                                                        <td>{{ $item->mobile }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>{{ $item->assignto }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $advtdatas->withQueryString()->links() }}
                                    </div>


                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xl-12">

                            </div>

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
                            <label class="form-label">Gender:</label>
                            <select class="form-select" name="matchfor">
                                <option value="">Select</option>
                                <option value="M" {{ request()->get('matchfor') == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ request()->get('matchfor') == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Community:</label>
                            <input name="community" class="form-control" type="text"
                                value="{{ request()->get('community') }}">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Mobile:</label>
                            <input name="mobile" class="form-control" type="text" value="{{ request()->get('mobile') }}">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Email:</label>
                            <input name="email" class="form-control" type="text" value="{{ request()->get('email') }}">
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

    </div>
@endsection