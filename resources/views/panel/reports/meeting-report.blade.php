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
                                    <h4 class="mb-sm-0 font-size-18">Meeting Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Meeting Report</li>
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
                                                    <th data-priority="1" width="">RNo</th>
                                                    <th data-priority="2" width="">Name</th>
                                                    <th data-priority="3" width="">Proposal</th>
                                                    <th data-priority="4" width="">Name</th>
                                                    <th data-priority="5" width="">Date</th>
                                                    <th data-priority="6" width="">Time</th>
                                                    <th data-priority="7" width="">Place</th>
                                                    <th data-priority="8" width="">By-1</th>
                                                    <th data-priority="9" width="">By-2</th>
                                                    <th data-priority="10" width="">Att-1</th>
                                                    <th data-priority="11" width="">Att-2</th>
                                                    <th data-priority="12" width="">Type</th>
                                                    <th data-priority="13" width="">Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($meetings as $meeting)
                                                    <tr>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $meeting->rno }}">{{ $meeting->rno }}</a></td>
                                                        <td class="{{ $meeting->rnoData->status == 'F' ? 'bg-pink' : '' }}">
                                                            {{ $meeting->rnoData->refname }}
                                                        </td>
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
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">No meetings found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $meetings->withQueryString()->links() }}
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
                            <label class="form-label">Meeting Type:</label>
                            <select class="form-select" name="meeting_type">
                                <option value="">Select</option>
                                <option value="Family Meeting" {{ request()->get('meeting_type') == 'Family Meeting' ? 'selected' : '' }}>Family Meeting</option>
                                <option value="Parent Meeting" {{ request()->get('meeting_type') == 'Parent Meeting' ? 'selected' : '' }}>Parent Meeting</option>
                                <option value="Individual Meeting" {{ request()->get('meeting_type') == 'Individual Meeting' ? 'selected' : '' }}>Individual Meeting</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="start_date" class="form-label"> Meeting Report From
                            </label>
                            <input class="form-control" type="text" name="start_date"
                                value="{{ request()->get('start_date') }}" id="start_date" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label for="end_date" class="form-label"> Meeting Report To
                            </label>
                            <input class="form-control" type="text" name="end_date" value="{{ request()->get('end_date') }}"
                                id="end_date" autocomplete="off">
                        </div>

                        <div class="clearfix"></div>
                        @if (!request()->has('empid'))

                            <div class="col-12 mb-3">
                                <label class="form-label">Meeting By-1:</label>
                                <input name="mtg_by1" class="form-control" type="text" value="{{ request()->get('mtg_by1') }}">
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Meeting By-2:</label>
                                <input name="mtg_by2" class="form-control" type="text" value="{{ request()->get('mtg_by2') }}">
                            </div>
                        @endif

                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Meeting Attended By-1:</label>
                            <input name="att_by1" class="form-control" type="text" value="{{ request()->get('att_by1') }}">
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Meeting Attended By-2:</label>
                            <input name="att_by2" class="form-control" type="text" value="{{ request()->get('att_by2') }}">
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
    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function () {
            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

            $('#start_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                maxDate: today,
            });
            $('#end_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                minDate: function () {
                    return $('#start_date').val();
                },
                maxDate: today,
            });
        });
    </script>

@endsection