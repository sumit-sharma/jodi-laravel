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
                                    <h4 class="mb-sm-0 font-size-18">Hold</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">Hold</li>
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


    </div> <!-- container-fluid -->

@endsection


@section('footer-script')
    <script>
        $(function () {
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