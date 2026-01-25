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
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Web Data</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item active">Web Data</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">SNo.</th>
                                                    <th data-priority="1" width="">RNo.</th>
                                                    <th data-priority="2" width="">Name</th>
                                                    <th data-priority="2" width="">Age</th>
                                                    <th data-priority="2" width="">Phone</th>
                                                    <th data-priority="3" width="">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($TableData as $key => $row)

                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $row->rno }}</td>
                                                        <td>{{ $row->viewProfile?->refname }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($row->bio?->dob)->age }}</td>
                                                        <td>{{ $row->personal?->contactphone }}</td>
                                                        <td>
                                                            @if ($row->status == 1)
                                                                <button class="btn btn-success btn-sm btnStatus"
                                                                    data-id="{{ $row->id }}">
                                                                    <i class="bi bi-check2-square"></i>
                                                                </button>
                                                            @else
                                                                <button class="btn btn-primary btn-sm btnStatus"
                                                                    data-id="{{ $row->id }}">
                                                                    <i class="bi bi-ev-front"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    {{ $TableData->withQueryString()->links() }}

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


    </div>
@endsection
@section('footer-script')
    <script>
        $(document).ready(function () {
            $('.btnStatus').click(function () {
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to change the status!",
                    icon: "warning",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, cancel!',
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            var url = "{{ route('toggle-web-data', ['id' => ':id']) }}";
                            url = url.replace(':id', id);
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: url,
                                type: 'PUT',
                                success: function (data) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: data.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    location.reload();
                                }
                            });
                        }
                    });
            });
        });
    </script>
@endsection