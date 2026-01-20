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
                                    <h4 class="mb-sm-0 font-size-18">All My Follow Ups</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Follow</a></li>
                                            <li class="breadcrumb-item active">All My Follow Ups</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

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
                                            <th data-priority="12" width="">Assgin To</th>
                                            <th data-priority="13" width="">Assgin Dt</th>
                                            <th data-priority="14" width="">Assgin By</th>
                                            <th data-priority="15" width="">L Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="pdng_d">
                                        @forelse ($followups as $followup)
                                            <tr>
                                                <td>{{ $followup->rno }}</td>
                                                <td>{{ $followup->viewProfile?->g }}</td>
                                                <td>{{ $followup->viewProfile?->refname }}</td>
                                                <td>{{ \Carbon\Carbon::parse($followup->viewProfile?->bio?->dob)->age }}</td>
                                                <td>{{ $followup->viewProfile?->oc }}</td>
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


    </div> <!-- container-fluid -->

@endsection