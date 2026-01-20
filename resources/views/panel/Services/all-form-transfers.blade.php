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
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Form Transfer</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                                            <li class="breadcrumb-item active">Form Transfer</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>



                            <div class="col-md-8">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bxs-eraser label-icon"></i> Remove</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $formTransfers->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Ser. No.</th>
                                                    <th data-priority="2" width="">Ref No.</th>
                                                    <th data-priority="3" width="">Name</th>
                                                    <th data-priority="4" width="">From</th>
                                                    <th data-priority="5" width="">A-Date</th>
                                                    <th data-priority="6" width="">A-Time</th>
                                                    <th data-priority="7" width="">To</th>
                                                    <th data-priority="8" width="">R-Date</th>
                                                    <th data-priority="9" width="">R-Time</th>
                                                    <th data-priority="10" width="">Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($formTransfers as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->rno }}</td>
                                                        <td>{{ $item->viewProfile->name }}</td>
                                                        <td>{{ $item->assign_from }}</td>
                                                        <td>{{ $item->assign_date }}</td>
                                                        <td>{{ $item->assign_time }}</td>
                                                        <td>{{ $item->assign_to }}</td>
                                                        <td>{{ $item->return_date }}</td>
                                                        <td>{{ $item->return_time }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center">No data available</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $formTransfers->withQueryString()->links() }}
                                    </div>


                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection