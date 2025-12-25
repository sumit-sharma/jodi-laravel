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
                                    <h4 class="mb-sm-0 font-size-18">Meeting List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Meeting</a></li>
                                            <li class="breadcrumb-item active">Meeting List</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="col-md-8 col-12">
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
                            <div class="col-md-2 col-12">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $meetings->total() }}</button>
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
                                                    <th data-priority="1" width="">Proposal</th>
                                                    <th data-priority="2" width="">Name</th>
                                                    <th data-priority="3" width="">Date</th>
                                                    <th data-priority="4" width="">Time</th>
                                                    <th data-priority="5" width="">Place</th>
                                                    <th data-priority="6" width="">By-1</th>
                                                    <th data-priority="7" width="">By-2</th>
                                                    <th data-priority="8" width="">Att-1</th>
                                                    <th data-priority="9" width="">Att-2</th>
                                                    <th data-priority="10" width="">Type</th>
                                                    <th data-priority="11" width="">Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($meetings as $meeting)
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $meeting->proposal }}">
                                                                {{ $meeting->proposal }}
                                                            </a>
                                                        </td>
                                                        <td
                                                            class="{{ $meeting->proposalData->status == 'F' ? 'bg-pink' : '' }}">
                                                            {{ $meeting->proposalData->refname }}
                                                        </td>
                                                        <td>{{ \App\Traits\CommonTrait::convertCommonDate($meeting->dated) }}
                                                        </td>
                                                        <td>{{ \App\Traits\CommonTrait::convertCommonDate($meeting->time, 'h:i A') }}
                                                        </td>
                                                        <td>{{ $meeting->place }}</td>
                                                        <td>{{ $meeting->mtg_by1 }}</td>
                                                        <td>{{ $meeting->mtg_by2 }}</td>
                                                        <td>{{ $meeting->att_by1 }}</td>
                                                        <td>{{ $meeting->att_by2 }}</td>
                                                        <td>{{ $meeting->meeting_type }}</td>
                                                        <td>{{ $meeting->remarks }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $meetings->links() }}
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


    </div> <!-- container-fluid -->
@endsection