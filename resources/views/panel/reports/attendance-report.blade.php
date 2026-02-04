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
                                    <h4 class="mb-sm-0 font-size-18">Attendance Report</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                            <li class="breadcrumb-item active">Attendance Report</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-12 col-12">
                                <form id="frmAttendanceReport" action="{{ request()->url() }}" method="GET">
                                    <div class="row">
                                        <div class="col-4 mt-2">
                                            <label for="example-text-input" class="form-label"> Assign To</label>
                                            <select class="form-select select2-notag" name="empid" required>
                                                <option value="">Select</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->username }}" {{ request()->get('empid') == $employee->username ? 'selected' : '' }}>
                                                        {{ $employee->username . ' - ' . $employee->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 mt-2">
                                            <label for="start_date" class="form-label"> Dated From </label>
                                            <input id="start_date" class="form-control" type="text" name="start_date"
                                                autocomplete="off" required
                                                value="{{ request()->get('start_date') ?? date('Y-m-d') }}">
                                        </div>
                                        <div class="col-4 mt-2">
                                            <label for="end_date" class="form-label"> Dated To </label>
                                            <input id="end_date" class="form-control" type="text" name="end_date"
                                                autocomplete="off" required
                                                value="{{ request()->get('end_date') ?? date('Y-m-d') }}">
                                        </div>
                                        <div class="clearfix"></div>

                                        <input type="hidden" name="viewtype" value="result" />

                                        <div class="col-md-12 col-12 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary w-lg waves-effect waves-light">Search</button>
                                            {{-- <button type="button"
                                                class="btn btn-success w-lg waves-effect waves-light"><i
                                                    class="bx bx-export icon-lg"></i> Export</button> --}}
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>

            @if ($viewtype == 'result')
                <div class="col-xl-12">
                    <!-- card -->
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">Result</h4>
                                        <!--<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Total Result-1</button>-->
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <hr>

                                <div class="col-md-8 col-12">
                                    <div class="mb-3">

                                        &nbsp;&nbsp;
                                        <a href="{{ request()->url() }}" type="button"
                                            class="btn btn-primary waves-effect btn-label waves-light"><i
                                                class="bx bx-reset label-icon"></i> Reset</a>
                                        &nbsp;&nbsp;
                                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Report
                                            Download
                                            <i class="bx bx-download"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <form class="app-search d-none d-lg-block pt-0 pb-0" method="GET"
                                        action="{{ request()->url() }}">
                                        <div class="position-relative">
                                            <input type="search" class="form-control bg-black opacity-50"
                                                placeholder="Search..." name="search" value="{{ request()->get('search') }}" />
                                            <input type="hidden" name="start_date" value="{{ request()->get('start_date') }}" />
                                            <input type="hidden" name="end_date" value="{{ request()->get('end_date') }}" />
                                            <input type="hidden" name="viewtype" value="result" />
                                            <input type="hidden" name="empid" value="{{ request()->get('empid') }}" />
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="bx bx-search-alt align-middle"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                    <div class="mb-4">
                                        <button type="button" class="btn btn-secondary">Total Record -
                                            {{ $attendances?->count() ?? 0 }}</button>
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
                                                        <th data-priority="1" width="">Ser. No.</th>
                                                        <th data-priority="2" width="">Emp. ID</th>
                                                        <th data-priority="3" width="">Name</th>
                                                        <th data-priority="4" width="">R-Time</th>
                                                        <th data-priority="5" width="">L-Time</th>
                                                        <th data-priority="6" width="">Dated</th>
                                                        <th data-priority="7" width="">In-Time</th>
                                                        <th data-priority="8" width="">Out-Time</th>
                                                        <th data-priority="9" width="">Status</th>
                                                        <th data-priority="10" width="">Remarks</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="pdng_d">
                                                    @forelse ($attendances as $key => $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->empid }}</td>
                                                            <td>{{ $item->user->name }}</td>
                                                            <td>{{ $item->user->details->intime }}</td>
                                                            <td>{{ $item->user->details->outtime }}</td>
                                                            <td>{{ $item->dated }}</td>
                                                            <td>{{ $item->intime }}</td>
                                                            <td>{{ $item->outtime }}</td>
                                                            <td>{{ $item->status }}</td>
                                                            <td>{{ $item->remarks }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="10" class="text-center">No Data Found</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>

                                            {{ $attendances->withQueryString()->links() }}
                                        </div>


                                    </div>
                                </div>
                                <div class="clearfix"></div>


                            </div>
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>
            @endif

            <div class="clearfix"></div>

        </div>
        <!-- end row-->





    </div> <!-- container-fluid -->
@endsection

@section('footer-script')
    <script>
        $(document).ready(function () {
            $('#start_date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            $('#end_date').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            $('#frmAttendanceReport').validate({
                ignore: [],
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                errorPlacement: function (error, element) {
                    if (element.hasClass('select2-hidden-accessible')) {
                        error.insertAfter(element.next('.select2')); // place after Select2
                    }
                    else if (element.closest('.gj-datepicker, .gj-timepicker').length) {
                        error.insertAfter(element.closest('.input-group'));
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element) {
                    $(element).next('.select2').find('.select2-selection')
                        .addClass('is-invalid');
                },

                unhighlight: function (element) {
                    $(element).next('.select2').find('.select2-selection')
                        .removeClass('is-invalid');
                },
                rules: {
                    empid: "required",
                    start_date: "required",
                    end_date: "required"
                },
                messages: {
                    empid: "Please select employee",
                    start_date: "Please select start date",
                    end_date: "Please select end date"
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection