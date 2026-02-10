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
                                    <h4 class="mb-sm-0 font-size-18">Print Request</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Others</a></li>
                                            <li class="breadcrumb-item active">Print Request</li>
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
                                        {{ $printRequests->total() }}</button>
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
                                                    <th data-priority="1">SI No.</th>
                                                    <th data-priority="2">RNo</th>
                                                    <th data-priority="3">Name</th>
                                                    <th data-priority="4">Dated</th>
                                                    <th data-priority="5">Time</th>
                                                    <th data-priority="6">EmpID</th>
                                                    <th data-priority="7">W/C</th>
                                                    <th data-priority="8">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="pdng_d">
                                                @forelse ($printRequests as $data)
                                                    <tr data-id="{{ $data->id }}">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $data->rno }}">{{ $data->rno }}</a></td>
                                                        <td>{{ $data->viewProfile?->refname }}</td>
                                                        <td>{{ convertCommonDate($data->dated)   }}</td>
                                                        <td>{{ $data->time }}</td>
                                                        <td>{{ $data->empid }}</td>
                                                        <td>{{ $data->wc == 1 ? 'C' : '--' }}</td>
                                                        <td>
                                                            @if($data->status == 2)
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm btn-print-action"
                                                                    data-action="approve"><i class="bi bi-hand-thumbs-up"></i>
                                                                    approve</button>
                                                                &nbsp;
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-sm btn-print-action"
                                                                    data-action="reject"><i class="bi bi-hand-thumbs-down"></i>
                                                                    reject</button>
                                                                &nbsp;
                                                                <button type="button" class="btn btn-danger btn-sm btn-print-action"
                                                                    data-action="delete"><i class="bi bi-trash"></i> delete</button>

                                                            @elseif($data->status == 0)
                                                                <span class="badge bg-success">Approved</span>
                                                            @elseif($data->status == 3)
                                                                <span class="badge bg-danger">Rejected</span>
                                                            @elseif($data->status == 4)
                                                                <span class="badge bg-danger">Deleted</span>
                                                            @elseif ($data->status == 1)
                                                                <span class="badge bg-primary">Print Job Done</span>
                                                            @else
                                                                <span class="badge bg-info">Error</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="21" class="text-center">No data found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $printRequests->withQueryString()->links() }}
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
                            <label class="form-label">Status:</label>
                            <select class="form-select" name="status">
                                <option value="">Select</option>
                                <option value="0" {{ request()->get('status') == '0' ? 'selected' : '' }}>Approved</option>
                                <option value="1" {{ request()->get('status') == '1' ? 'selected' : '' }}>Print job done
                                </option>
                                <option value="2" {{ request()->get('status') == '2' ? 'selected' : '' }}>Pending</option>
                                <option value="3" {{ request()->get('status') == '3' ? 'selected' : '' }}>Rejected</option>
                                <option value="4" {{ request()->get('status') == '4' ? 'selected' : '' }}>Deleted</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Emp Id:</label>
                            <input name="empid" class="form-control" type="text" value="{{ request()->get('empid') }}">
                        </div>


                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Select Employee:</label>
                            <select class="form-select select2-notag" name="emp_id">
                                <option value="">Select</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->username }}" {{ request()->get('emp_id') == $employee->username ? 'selected' : '' }}>
                                        {{ $employee->username . ' - ' . $employee->name }}
                                    </option>
                                @endforeach
                            </select>
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

                        <input type="hidden" name="search" value="{{ request()->get('search') }}" />

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

            $(".btn-print-action").click(function () {
                var action = $(this).data('action');
                var id = $(this).closest('tr').data('id');
                console.log("btn_prt", { "action": action, "id": id });
                var title = `Do you want to ${action} this record?`
                Swal.fire({
                    title: title,
                    text: "It won't able to revert this",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                            url: '{{ route("approve-reject-print-job") }}',
                            type: "PUT",
                            data: {
                                print_id: id,
                                action: action
                            },
                            success: function (response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message,
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: xhr.responseJSON.message,
                                });
                            }
                        })
                    }
                })


            });



        });
    </script>

@endsection