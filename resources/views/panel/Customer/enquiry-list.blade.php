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
                                    <h4 class="mb-sm-0 font-size-18">
                                        {{ fetchCustomerByrno($rno)?->refname . ': ' . $rno }}
                                    </h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Enquiry List</li>
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
                                        {{ $enquiries->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>




                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered table-sm align-middle"
                                            style="table-layout: fixed; width: 100%;">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" style="width: 5%;">SI No.</th>
                                                    <th data-priority="2" style="width: 5%;">Dated</th>
                                                    <th data-priority="3" style="width: 5%;">Time</th>
                                                    <th data-priority="4" style="width: 5%;">EmpId</th>
                                                    <th data-priority="5" style="width: 5%;">Enq. Purpose</th>
                                                    <th data-priority="6" style="width: 5%;">Remarks</th>
                                                    <th data-priority="7" style="width: 3%;">Further Action</th>
                                                    <th data-priority="8" style="width: 5%;">SL</th>
                                                    <th data-priority="9" style="width: 5%;">Up By</th>
                                                    <th data-priority="10" style="width: 5%;">Update Date</th>
                                                    <th data-priority="11" style="width: 5%;">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($enquiries as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->dated }}</td>
                                                        <td>{{ $item->time }}</td>
                                                        <td>{{ $item->empid }}</td>
                                                        <td>{{ $item->enq_purpose }}</td>
                                                        <td>{{ $item->remarks }}</td>
                                                        <td>{{ $item->further_action }}</td>
                                                        <td>{{ $item->slfor }}</td>
                                                        <td>{{ $item->updatedby }}</td>
                                                        <td>{{ $item->updatedatetime }}</td>
                                                        <td>{{ $item->status == 0 ? 'Pending' : 'Done' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $enquiries->links() }}
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