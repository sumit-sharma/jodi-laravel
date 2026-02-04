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
                                    <h4 class="mb-sm-0 font-size-18">Daily Moment</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">Daily Moment</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-12 col-12">
                                <form id="frmDailyMoment" action="{{ route('save-daily-moment') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="empid" class="form-label"> Employee ID </label>
                                            <input class="form-control" type="text"
                                                value="{{ auth()->user()->username . '-' . auth()->user()->name }}"
                                                disabled>
                                        </div>

                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="dated" class="form-label">Date </label>
                                            <input class="form-control" type="text" name="dated" id="dated" required>
                                            <label id="dated-error" class="is-invalid" for="dated"></label>
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="timefrom" class="form-label"> Start Time </label>
                                            <input class="form-control" type="text" name="timefrom" id="timefrom" readonly
                                                required>
                                            <label id="timefrom-error" class="is-invalid" for="timefrom"></label>
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="timeto" class="form-label"> End Time </label>
                                            <input class="form-control" type="text" name="timeto" id="timeto" readonly
                                                required>
                                            <label id="timeto-error" class="is-invalid" for="timeto"></label>
                                        </div>
                                        <div class="clearfix"></div>


                                        <div class="col-md-12 col-12 mt-2">
                                            <label for="moment" class="form-label"> Moment </label>
                                            <textarea id="moment" name="moment" class="form-control" rows="3"
                                                spellcheck="false" aria-label="Moment" required></textarea>
                                        </div>
                                        <div class="clearfix"></div>

                                        <input type="hidden" name="empid" value="{{ auth()->user()->username }}" />

                                        <div class="col-md-12 col-12 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary w-lg waves-effect waves-light">Save</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>

            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Moments</h4>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Total
                                        Result-{{ $dailyMoments->total() }}</button>
                                </div>
                            </div>

                            <hr>

                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Serial No.</th>
                                                    <th data-priority="2" width="">Name</th>
                                                    <th data-priority="3" width="">Employee ID</th>
                                                    <th data-priority="4" width="">Date</th>
                                                    <th data-priority="5" width="">Start Time</th>
                                                    <th data-priority="6" width="">End Time</th>
                                                    <th data-priority="7" width="">Moment</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($dailyMoments as $dailyMoment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dailyMoment->employee->name }}</td>
                                                        <td>{{ $dailyMoment->empid }}</td>
                                                        <td>{{ $dailyMoment->dated }}</td>
                                                        <td>{{ $dailyMoment->timefrom }}</td>
                                                        <td>{{ $dailyMoment->timeto }}</td>
                                                        <td>{{ $dailyMoment->moment }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No data found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                                <div class="col-12">
                                    {{ $dailyMoments->withQueryString()->links() }}
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

@section('footer-script')
    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>


        $(document).ready(function () {
            let today = new Date();
            let yesterday = new Date();
            let tomorrow = new Date();
            yesterday.setDate(today.getDate() - 2);
            tomorrow.setDate(today.getDate() + 1);

            $("#dated").datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd',
                minDate: yesterday,
                maxDate: tomorrow,
                change: function () {
                    $('#dated').valid(); // 🔥 force validation on change
                }
            });

            $("#timefrom").timepicker({
                uiLibrary: 'bootstrap5',
                format: 'HH:MM',
                keyboardNavigation: false,
                modal: true,
                footer: true,
                change: function () {
                    $('#timefrom').valid(); // 🔥 force validation on change
                }

            });

            $("#timeto").timepicker({
                uiLibrary: 'bootstrap5',
                format: 'HH:MM',
                modal: true,
                keyboardNavigation: false,
                footer: true,
                change: function () {
                    $('#timeto').valid(); // 🔥 force validation on change
                }

            });

            $('#frmDailyMoment').validate({
                ignore: [],
                rules: {
                    date: {
                        required: true
                    },
                    timefrom: {
                        required: true,
                    },
                    timeto: {
                        required: true,
                    },
                    moment: {
                        required: true,
                        maxlength: 500
                    }
                },
                messages: {
                    date: {
                        required: "Please select a date"
                    },
                    timefrom: {
                        required: "Please select a time",
                        time: "Please enter a valid time"
                    },
                    timeto: {
                        required: "Please select a time",
                        time: "Please enter a valid time"
                    },
                    moment: {
                        required: "Please enter a moment",
                        maxlength: "Moment should be less than 500 characters"
                    }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: true,
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
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: xhr.responseJSON.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection