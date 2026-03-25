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
                                    <h4 class="mb-sm-0 font-size-18">Fix/Active</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Other</a></li>
                                            <li class="breadcrumb-item active">Fix/Active</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

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
                                            <th data-priority="1" width="">SI. No.</th>
                                            <th data-priority="2" width="">Ref No.</th>
                                            <th data-priority="3" width="">Name</th>
                                            <th data-priority="4" width="">Date</th>
                                            <th data-priority="5" width="">Time</th>
                                            <th data-priority="6" width="">By</th>
                                            <th data-priority="7" width="">Through</th>
                                            <th data-priority="8" width="">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody class="pdng_d">
                                        @foreach ($members as $member)
                                            <tr data-id="{{ $member->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $member->rno }}</td>
                                                <td>
                                                    <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                        data-bs-target="#Modal_biodata" data-rno="{{ $member->rno }}">
                                                        {{ $member->viewProfile->refname }}</a>
                                                </td>
                                                <td>{{ convertCommonDate($member->dated) }}</td>
                                                <td>{{ convertCommonDate($member->time, 'h:i A') }}</td>
                                                <td>{{ $member->fix_by }}</td>
                                                <td>{{ $member->fixed_through }}</td>
                                                <td>
                                                    @if ($member->status == 0)
                                                        <button type="button" class="btn btn-light waves-effect btnAction btn-Fix"
                                                            data-rno="{{ $member->rno }}" data-action="fix">
                                                            <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                                                            Fix
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect btnAction btn-Delete waves-light"
                                                            data-rno="{{ $member->rno }}" data-action="delete">
                                                            <i class="bx bx-block font-size-16 align-middle me-2"></i> Delete
                                                        </button>
                                                    @elseif ($member->status == 1)
                                                        <button type="button"
                                                            class="btn btn-light waves-effect btnAction btn-Active"
                                                            data-rno="{{ $member->rno }}" data-action="active">
                                                            <i class="bx bx-check font-size-16 align-middle me-2"></i> Active
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect btnAction btn-Delete waves-light"
                                                            data-rno="{{ $member->rno }}" data-action="delete">
                                                            <i class="bx bx-block font-size-16 align-middle me-2"></i> Delete
                                                        </button>
                                                    @elseif ($member->status == 2)
                                                        <label class="btn btn-success waves-effect waves-light">
                                                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Job
                                                            Done
                                                        </label>

                                                    @elseif ($member->status == 3)
                                                        <label type="button" class="btn btn-success waves-effect waves-light">
                                                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                                            Activated
                                                        </label>
                                                    @elseif ($member->status == 4)
                                                        <label type="button" class="btn btn-success waves-effect waves-light">
                                                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                                            Deleted
                                                        </label>
                                                    @endif
                                                </td>
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
                            <label class="form-label">Fixed By:</label>
                            <input name="fix_by" class="form-control" type="text" value="{{ request()->get('fix_by') }}">
                        </div>


                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Start Date:</label>
                            <input id="start_date" name="start_date" class="form-control" type="text"
                                value="{{ request()->get('start_date') }}" readonly autocomplete="off">
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">End Date:</label>
                            <input id="end_date" name="end_date" class="form-control" type="text"
                                value="{{ request()->get('end_date') }}" readonly autocomplete="off">
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
                var pk = $(this).closest('tr').data('id');
                console.log("pk", pk);
                // return false;
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
                        var url = "{{ route('update-fix-active-job', ['action' => ':action', 'pk' => ':pk', 'rno' => ':rno']) }}";
                        url = url.replace(':action', action).replace(':pk', pk).replace(':rno', rno)
                        $.ajax({
                            type: "PUT",
                            url: url,
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