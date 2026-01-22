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
                                    <h4 class="mb-sm-0 font-size-18">{{ $heading }}</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">{{ $heading }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-8 col-12">
                                <div class="mb-3">
                                    <button data-bs-toggle="offcanvas" data-bs-target="#filterModal" type="button"
                                        class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;
                                    <a href="{{ $reset_link}}" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</a>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <form method="GET" action="{{ request()->url() }}">
                                            <input type="search" name="search" class="form-control bg-black opacity-50"
                                                placeholder="Search..." value="{{ request()->get('search') }}">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="bx bx-search-alt align-middle"></i></button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $members->total() }}</button>
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
                                            <th data-priority="2" width="">Name</th>
                                            <th data-priority="3" width="">Hold Req By</th>
                                            <th data-priority="4" width="">Hold Done By</th>
                                            <th data-priority="5" width="">Reason</th>
                                            <th data-priority="6" width="">Date</th>
                                            <th data-priority="7" width="">Time</th>
                                        </tr>
                                    </thead>

                                    <tbody class="pdng_d">
                                        @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $member->rno }}</td>
                                                <td>
                                                    <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                        data-bs-target="#Modal_biodata" data-rno="{{ $member->rno }}">
                                                        {{ $member->viewProfile->refname }}</a>
                                                </td>
                                                <td>{{ $member->hold_req_by }}</td>
                                                <td>{{ $member->hold_by }}</td>
                                                <td>{{ $member->reason }}</td>
                                                <td>{{ convertCommonDate($member->dated) }}</td>
                                                <td>{{ convertCommonDate($member->time, 'h:i A') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $members->links() }}
                        </div>

                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

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


@section('footer-script')

    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <script>
        $(function () {

            $("#start_date").datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
            });
            $("#end_date").datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
            });



            $('button.btnAction').click(function () {


                var rno = $(this).data('rno');
                var action = $(this).data('action');

                swal.fire({
                    title: 'Are you sure?',
                    text: `It will ${action} this member`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: `Yes, ${action} it!`,
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "{{ route('update-fix-active-job', ['action' => ':action', 'rno' => ':rno']) }}";
                        $.ajax({
                            url: url.replace(':action', action).replace(':rno', rno),
                            type: "PUT",
                            data: {
                                rno: rno,
                                action: action,
                            },
                            success: function (response) {
                                console.log(response);
                                if (response.status == 'success') {
                                    Swal.fire({
                                        title: "success",
                                        text: response.message,
                                        icon: "success"
                                    });

                                    location.reload();
                                } else {
                                    Swal.fire({
                                        title: "error",
                                        text: response.message,
                                        icon: "error"
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                })
            })
        });
    </script>


@endsection