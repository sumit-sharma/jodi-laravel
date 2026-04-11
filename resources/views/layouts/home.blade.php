<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Elite Marriage Bureau - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/js-logo.webp">


    <link rel="stylesheet" href="/assets/css/style2.css" type="text/css" />

    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="/assets/libs/twitter-bootstrap-wizard/prettify.css">


    <!-- plugin css -->
    <link href="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @vite(['resources/js/app.js'])
</head>

<body data-topbar="dark" data-sidebar="brand">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('components.header_new')


        <!-- start main content -->
        <div class="main-content">

            <div class="page-content">


                <!-- start page title -->
                <!--<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Horizontal</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                            <li class="breadcrumb-item active">Horizontal</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>-->
                <!-- end page title -->

                @yield('main-content')


            </div>
            <!-- End Page-content -->



            @include('components.footer')


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->










    @include('components.footer-js')

    <script>
        function debounce(func, delay) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        function cacheClear(key = null) {
            fetch("{{ route('cache-clear') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    cacheKey: key
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }

        function convertDate(date, format = 'MMM D, YYYY') {
            return dayjs(date).format(format);
        }

        $(document).ready(function () {
            // Save jQuery UI datepicker
            // var uiDatepicker = $.fn.datepicker;

            // // Init all datepickers dynamically
            // $(".js-date").each(function () {
            //     let format = $(this).data("date-format") || "yy-mm-dd";

            //     uiDatepicker.call($(this), {
            //         dateFormat: format,
            //         changeMonth: true,
            //         changeYear: true

            //     });
            // });

        });
    </script>

    @yield('footer-script')

    <!--     timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <x-toast />

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        const fetchActiveEmployee = async () => {
            const response = await fetch("{{ route('panel.get-active-employee') }}", {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            const data = await response.json();
            return data;
        }

        const fetchActiveCustomer = async () => {
            const response = await fetch("{{ route('customer.picklist-viewprofile-data') }}", {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            const data = await response.json();
            return data;
        }

        $(function () {
            document.body.setAttribute('data-sidebar-size', 'sm');

            $('.select2-tag').select2({
                tags: true,
                placeholder: "Select or type to Search",
                allowClear: true,
            });

            $('.select2-notag').select2({
                placeholder: "Select or type to Search",
                allowClear: true,
            });

        });
    </script>


    @yield('bottom-section')

    @yield('bottom-js')

    <script>
        $(document).ready(function () {
            $("#directMeeting_menu").click(function () {
                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    $('#frmAddDirectMeeting #mtg_by1').html(options).select2({
                        dropdownParent: $('#DirectMeetingPageModal'),
                        placeholder: "Select or type to add",
                        allowClear: true
                    });
                    $('#frmAddDirectMeeting #mtg_by2').html(options).select2({
                        dropdownParent: $('#DirectMeetingPageModal'),
                        placeholder: "Select or type to add",
                        allowClear: true
                    });
                    $('#frmAddDirectMeeting #att_by1').html(options).select2({
                        dropdownParent: $('#DirectMeetingPageModal'),
                        placeholder: "Select or type to add",
                        allowClear: true
                    });
                    $('#frmAddDirectMeeting #att_by2').html(options).select2({
                        dropdownParent: $('#DirectMeetingPageModal'),
                        placeholder: "Select or type to add",
                        allowClear: true
                    });
                });

                var picklistViewProfileUrl = "{{ route('customer.picklist-viewprofile-data') }}";
                $("#frmAddDirectMeeting #meet_refno").select2({
                    placeholder: 'Search rno or name.',
                    dropdownParent: $('#DirectMeetingPageModal'),
                    minimumInputLength: 4,
                    ajax: {
                        url: picklistViewProfileUrl,
                        dataType: 'json',
                        delay: 250,

                        data: function (params) {
                            return {
                                q: params.term,       // search term
                                page: params.page || 1
                            };
                        },

                        processResults: function (data) {
                            return {
                                results: data.results,
                                pagination: data.pagination
                            };
                        },

                        cache: true
                    }
                });
                $("#frmAddDirectMeeting #meet_with").select2({
                    placeholder: 'Search rno or name.',
                    dropdownParent: $('#DirectMeetingPageModal'),
                    minimumInputLength: 4,
                    ajax: {
                        url: picklistViewProfileUrl,
                        dataType: 'json',
                        delay: 250,

                        data: function (params) {
                            return {
                                q: params.term,       // search term
                                page: params.page || 1
                            };
                        },

                        processResults: function (data) {
                            return {
                                results: data.results,
                                pagination: data.pagination
                            };
                        },

                        cache: true
                    }
                });
            });

            $("#frmAddDirectMeeting").validate({
                ignore: ':hidden:not(.select2-hidden-accessible)',
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                errorPlacement: function (error, element) {
                    if (element.hasClass('select2-hidden-accessible')) {
                        error.insertAfter(element.next('.select2')); // place after Select2
                    } else {
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
                    rno: {
                        required: true
                    },
                    proposal: {
                        required: true
                    },
                    dated: {
                        required: true
                    },
                    time: {
                        required: true
                    },
                    place: {
                        required: true
                    }
                },
                messages: {
                    rno: {
                        required: "Please select Meeting RNo"
                    },
                    proposal: {
                        required: "Please select Proposal"
                    },
                    dated: {
                        required: "Please select Meeting Date"
                    },
                    time: {
                        required: "Please select Meeting Time"
                    },
                    place: {
                        required: "Please select Meeting Place"
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
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#DirectMeetingPageModal").modal("hide");
                                $("#frmAddDirectMeeting").trigger("reset");
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
            })

            $("#addAttendance_menu").click(function () {
                // $("#addAttendanceModal").modal("show");

                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    $('#frmaddAttendanceModal #empid').html(options).select2({
                        dropdownParent: $('#addAttendanceModal'),
                        placeholder: "Select or type to search",
                        allowClear: true
                    });

                });

                $("#frmaddAttendanceModal #dated").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    maxDate: new Date(),
                    change: function () {
                        $('#frmaddAttendanceModal #dated').valid(); // 🔥 force validation on change
                    }
                });

                $("#frmaddAttendanceModal #intime").timepicker({
                    uiLibrary: 'bootstrap5',
                    modal: true,
                    footer: true,
                    change: function () {
                        $('#frmaddAttendanceModal #intime').valid(); // 🔥 force validation on change
                    }
                });

                $("#frmaddAttendanceModal #outtime").timepicker({
                    uiLibrary: 'bootstrap5',
                    modal: true,
                    footer: true,
                    change: function () {
                        $('#frmaddAttendanceModal #outtime').valid(); // 🔥 force validation on change
                    }
                });

            });
            $("#frmaddAttendanceModal .tp").on('focus', function () {
                $(this).closest('.gj-timepicker').find('button').click();
            });


            $('#frmaddAttendanceModal #empid').on('change', function () {
                let selectedValue = $(this).val();
                let url = `{{ route('get-attendance', ['empid' => ':empid', 'dated' => ':dated']) }}`
                let dated = $('#frmaddAttendanceModal #dated').val();
                url = url.replace(':empid', selectedValue).replace(':dated', dated);
                console.log(url);
                fetch(url).then(response => response.json()).then(data => {
                    console.log(data);
                    if (data.status == "success") {
                        $('#frmaddAttendanceModal #intime').val(data?.data?.intime);
                        $('#frmaddAttendanceModal #outtime').val(data?.data?.outtime);
                        $('#frmaddAttendanceModal #status').val(data?.data?.status);
                        $('#frmaddAttendanceModal #remarks').val(data?.data?.remarks);
                    }
                })
            })


            $("#frmaddAttendanceModal").validate({
                // ignore: ':hidden:not(.select2-hidden-accessible)',
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
                    empid: {
                        required: true
                    },
                    dated: {
                        required: true
                    },
                    intime: {
                        required: true
                    },
                    outtime: {
                        required: true
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    empid: {
                        required: "Please select Employee"
                    },
                    dated: {
                        required: "Please select Date"
                    },
                    intime: {
                        required: "Please select In Time"
                    },
                    outtime: {
                        required: "Please select Out Time"
                    },
                    status: {
                        required: "Please select Status"
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
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                }).then((result) => {
                                    $("#frmaddAttendanceModal").trigger("reset");
                                    $("#addAttendanceModal").modal("hide");
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
            });
            $("#btnShowDailyRep").click(function () {
                $("#frmShowDailyReportModal #daily_start_date").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    maxDate: new Date()
                });

                $("#frmShowDailyReportModal #daily_end_date").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    maxDate: new Date()
                });


            });

            $("#btnShowFinRep").click(function () {
                // $("#finStartDate").datepicker({
                //     changeMonth: true,
                //     changeYear: true
                // });
                // $("#finEndDate").datepicker({
                //     changeMonth: true,
                //     changeYear: true
                // });
                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    $('#frmShowFinanceReportModal #finance_report_tc').html(options).select2({
                        dropdownParent: $('#showFinanceReportModal'),
                        placeholder: "Select or type to search",
                        allowClear: true
                    });

                });
            });



            $("#btnShowMeetingRep").click(function () {
                allemp = $(this).data('allemp');
                $("#frmShowMeetingReportModal #meeting_start_date").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    maxDate: new Date()
                });

                $("#frmShowMeetingReportModal #meeting_end_date").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    minDate: $("#frmShowMeetingReportModal #meeting_start_date").val(),
                    maxDate: new Date()
                });
                if (allemp == 1) {
                    fetchActiveEmployee().then((employeeData) => {
                        let options = '<option value="">Select</option>';
                        employeeData.data.forEach(element => {
                            options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                        });

                        $('#frmShowMeetingReportModal #meeting_empid').html(options).select2({
                            dropdownParent: $('#ShowMeetingReportModal'),
                            placeholder: "Select or type to search",
                            allowClear: true
                        });

                    });
                } else {
                    let options = `<option value="{{ auth()->user()->username }}">{{ auth()->user()->username }} - {{ auth()->user()->name }}</option>`;
                    $('#frmShowMeetingReportModal #meeting_empid').html(options).select2({
                        dropdownParent: $('#ShowMeetingReportModal'),
                        allowClear: false
                    });
                }
            });


            $("#btnShowAppointmentRep").click(function () {
                $("#frmAppointmentReportModal #appointment_start_date").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    maxDate: new Date()
                });

                $("#AppointmentReportModal #appointment_end_date").datepicker({
                    uiLibrary: 'bootstrap5',
                    format: 'yyyy-mm-dd',
                    minDate: $("#AppointmentReportModal #appointment_start_date").val(),
                    maxDate: new Date()
                });

                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    $('#frmAppointmentReportModal #appointment_empid').html(options).select2({
                        dropdownParent: $('#AppointmentReportModal'),
                        placeholder: "Select or type to search",
                        allowClear: true
                    });

                });
            });





            $("#newEntry_menu").click(function () {
                Swal.fire({
                    title: "Submit Mobile Number/s",
                    html: `<input id="mobile1" class="swal2-input" placeholder="Mobile 1"> <input id="mobile2" class="swal2-input" placeholder="Mobile 2"> <input id="mobile3" class="swal2-input" placeholder="Mobile 3"> `,
                    showCancelButton: true,
                    confirmButtonText: "Check Mobiles",
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        const m1 = $('#mobile1').val().trim();
                        const m2 = $('#mobile2').val().trim();
                        const m3 = $('#mobile3').val().trim();

                        const mobiles = [m1, m2, m3].filter(v => v !== '');

                        if (mobiles.length === 0) {
                            Swal.showValidationMessage('At least one mobile number is required');
                            return false;
                        }

                        const regex = /^\d{10}$/;

                        // Validate format
                        for (let m of mobiles) {
                            if (!regex.test(m)) {
                                Swal.showValidationMessage(`Invalid mobile: ${m}`);
                                return false;
                            }
                        }

                        // Check duplicate in entered values
                        if (new Set(mobiles).size !== mobiles.length) {
                            Swal.showValidationMessage('Duplicate mobile numbers entered');
                            return false;
                        }



                        const checkExistAPI = "{{ route('panel.check-mobiles') }}";
                        $.ajax({
                            url: checkExistAPI,
                            type: 'POST',
                            data: {
                                mobiles: mobiles
                            },
                            success: function (response) {
                                console.log("response", response);
                                if (response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: "Your will be redirected to a new entry page",
                                    }).then((result) => {
                                        window.location.href = "{{ route('customer.create') }}";
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: `All Phone Numbers have been already associated with another client`,
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
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            });


        });
    </script>

    @stack('scripts')

</body>

</html>