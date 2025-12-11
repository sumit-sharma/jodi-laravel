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
                                    <h4 class="mb-sm-0 font-size-18">Add / Edit Appointment</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">Add / Edit Appointment</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-12 col-12">
                                <form id="frmAddEditAppointment" method="post" accept="{{ route('appointment.save') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="rno" class="form-label">Ref No. (Optional)</label>
                                            <input class="form-control" type="text" id="rno" name="rno" value="0">
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="refname" class="form-label"> Member Name </label>
                                            <input class="form-control" type="text" name="refname" id="refname">
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="contactphone" class="form-label"> Contact No </label>
                                            <input class="form-control" type="text" name="contactphone" id="contactphone">
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="apttype" class="form-label">Appointment Type</label>
                                            <select class="form-select" name="apttype" id="apttype">
                                                <option value="Final">Final</option>
                                                <option value="Pickup">Pickup</option>
                                                <option value="Home Visit">Home Visit</option>
                                                <option value="Upgradation">Upgradation</option>
                                                <option value="Meeting">Meeting</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="aptdate" class="form-label"> Appointment Date </label>
                                            <input class="form-control" type="date" name="aptdate" id="aptdate">
                                        </div>
                                        <div class="col-md-2 col-12 mt-2">
                                            <label for="apttime" class="form-label"> Appointment Time </label>
                                            <input class="form-control" type="time" name="apttime" id="apttime" readonly>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-md-4 col-12 mt-2">
                                            <label for="contactaddress" class="form-label">Address</label>
                                            <textarea id="contactaddress" name="contactaddress" class="form-control"
                                                rows="3" spellcheck="false" aria-label=""></textarea>
                                        </div>
                                        <div class="col-md-4 col-12 mt-2">
                                            <label for="remarks" class="form-label">Remarks (if any)</label>
                                            <textarea id="remarks" name="remarks" class="form-control" rows="3"
                                                spellcheck="false" aria-label=""></textarea>
                                        </div>
                                        <div class="col-md-4 col-12 mt-2">
                                            <label for="aptstatus" class="form-label">Status</label>
                                            <select id="aptstatus" name="aptstatus" class="form-select">
                                                <option value="0">Pending</option>
                                                <option value="1">Done</option>
                                                <option value="2">Cancelled</option>
                                                <option value="3">Postponed</option>
                                            </select>
                                        </div>

                                        <div class="clearfix"></div>

                                        <input type="hidden" name="appointment_id" id="appointment_id" />


                                        <div class="col-md-12 col-12 mt-2">
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
                            <div class="col-md-12 col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add Appointment</h4>
                                    <!--<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Total Result-1</button>-->
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
                                    <button type="button" class="btn btn-secondary">Total Record - 8</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">ID</th>
                                                    <th data-priority="2" width="">Date</th>
                                                    <th data-priority="3" width="">Time</th>
                                                    <th data-priority="4" width="">Emp</th>
                                                    <th data-priority="5" width="">RNo</th>
                                                    <th data-priority="6" width="">Name</th>
                                                    <th data-priority="7" width="30%">Address</th>
                                                    <th data-priority="8" width="">Phone</th>
                                                    <th data-priority="9" width="">Appointment Type</th>
                                                    <th data-priority="10" width="">Status</th>
                                                    <th data-priority="11" width="">Remarks</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($appointments as $appointment)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="edit-appointment"
                                                                data-appointment_id="{{ $appointment->id }}"
                                                                data-empid="{{ $appointment->empid }}">{{ $appointment->id }}</a>
                                                        </td>
                                                        <td>{{ $appointment->aptdate }}</td>
                                                        <td>{{ $appointment->apttime }}</td>
                                                        <td>{{ $appointment->empid }}</td>
                                                        <td>{{ $appointment->rno }}</td>
                                                        <td>{{ $appointment->refname }}</td>
                                                        <td>{{ $appointment->contactaddress }}</td>
                                                        <td>{{ $appointment->contactphone }}</td>
                                                        <td>{{ $appointment->apttype }}</td>
                                                        <td>{!! $appointment->aptstatus->label() !!}</td>
                                                        <td>{{ $appointment->remarks }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{-- <div class="pagination"> --}}
                                            {{--
                                        </div> --}}
                                    </div>
                                    {{ $appointments->links() }}
                                    @include('components.biodata_modal')
                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

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
            var current_username = "{{ Auth::user()->username }}";
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let currentTime = `${hours}:${minutes}`;

            $("#apttime").timepicker({
                uiLibrary: 'bootstrap5',
                value: currentTime
            });

            $('.edit-appointment').click(function () {
                $this = $(this);
                var appointment_id = $this.data('appointment_id');
                var empid = $this.data('empid');
                // if (empid !== current_username) {
                //     return false
                // }
                let url = "{{ route('appointment.show', ['id' => ':id']) }}"; // placeholder :id
                url = url.replace(':id', appointment_id);
                const options = {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                };
                fetch(url, options)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status === 'success') {
                            $('#frmAddEditAppointment #appointment_id').val(appointment_id);
                            $('#frmAddEditAppointment #aptdate').val(data.data.aptdate);
                            $('#frmAddEditAppointment #rno').val(data.data.rno);
                            $('#frmAddEditAppointment #refname').val(data.data.refname.trim());
                            $('#frmAddEditAppointment #contactaddress').val(data.data.contactaddress.trim());
                            $('#frmAddEditAppointment #contactphone').val(data.data.contactphone.trim());
                            $('#frmAddEditAppointment #apttime').val(data.data.apttime);
                            $('#frmAddEditAppointment #apttype').val(data.data.apttype);
                            $('#frmAddEditAppointment #aptstatus').val(data.data.aptstatus);
                            $('#frmAddEditAppointment #remarks').val(data.data.remarks.trim());
                        }

                    })
            });
            $("#frmAddEditAppointment").validate({
                rules: {
                    aptdate: {
                        required: true
                    },
                    apttime: {
                        required: true
                    },
                    apttype: {
                        required: true
                    },
                    aptstatus: {
                        required: true
                    },
                    remarks: {
                        required: true
                    },
                    refname: {
                        required: true
                    },
                    contactaddress: {
                        required: true
                    },
                    contactphone: {
                        required: true
                    }
                },
                messages: {
                    aptdate: {
                        required: 'Appointment Date is required'
                    },
                    apttime: {
                        required: 'Appointment Time is required'
                    },
                    apttype: {
                        required: 'Appointment Type is required'
                    },
                    aptstatus: {
                        required: 'Appointment Status is required'
                    },
                    remarks: {
                        required: 'Remarks is required'
                    },
                    refname: {
                        required: 'Member Name is required'
                    },
                    contactaddress: {
                        required: 'Address is required'
                    },
                    contactphone: {
                        required: 'Contact No is required'
                    }
                },
                // errorElement: 'span',
                // errorPlacement: function (error, element) {
                //     error.addClass('invalid-feedback');
                //     element.closest('.form-group').append(error);
                // },
                // highlight: function (element, errorClass, validClass) {
                //     $(element).addClass('is-invalid');
                // },
                // unhighlight: function (element, errorClass, validClass) {
                //     $(element).removeClass('is-invalid');
                // }
                submitHandler: function (form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: formData,
                        processData: false,
                        contentType: false,
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
                    });
                }
            })
        });
    </script>
@endsection