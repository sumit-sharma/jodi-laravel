<div>
    <div class="col-xl-12">
        <div class="topnav topnav_new bg-warning bg-gradient p-2">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                                    <i data-feather="align-justify"></i><span data-key="t-apps">Main</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages" {{--
                                    style="position: fixed; height: 50vh;"> --}}
                                    >



                                    {{-- <a href="#" class="dropdown-item" data-key="t-calendar">Delete member </a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Convert member </a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Change TC/TL/RM</a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Classified</a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Make non Act </a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Visited/Non Visited </a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">OC / non oc</a>
                                    <a href="#" class="dropdown-item" data-key="t-calendar">To follow up </a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Prospective </a> --}}
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal" id="modl_hold"
                                        data-key="holdMemberModal">Hold/ release</a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal" id="modl_fix"
                                        data-key="fixMemberModal">Fix/Active </a>
                                    {{-- <a href="#" class="dropdown-item" data-key="t-chat">Form Transfer</a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Sent package</a> --}}


                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">More Info</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/update-more-info/">Add more info </a>

                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/view-more-info/">View more info </a>
                                </div>
                            </li>

                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-data" role="button">
                                    <span data-key="t-apps">Services</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="#" class="dropdown-item" data-key="t-calendar">Coming soon</a>
                                    <a href="#" class="dropdown-item" data-key="t-chat">Coming soon</a>
                                </div>
                            </li> --}}


                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-follow"
                                    role="button">
                                    <span data-key="t-apps">Feedback</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                    <a href="#" class="dropdown-item" data-key="t-calendar">Coming soon</a>

                                </div>
                            </li> --}}


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">Mails</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/sendmail/">Create/Send Mail</a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/sendmail-list/">List Mails</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none inner-menu-item"
                                    href="javascript:void(0);" data-key="/feedback/">
                                    <span>Feedback</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">Enquiry</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="#" class="dropdown-item inner-menu-modal" id="modl_enquiry"
                                        data-key="EnquiryPageModal">Add Enquiry </a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/enquiry-list/">List Enquiries </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">Match</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/update-match-prefrence/">Update Match Preference </a>

                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/find-match/">Find Match </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none inner-menu-item"
                                    href="javascript:void(0);" data-key="/customer-photos/">
                                    <span>Photo</span>
                                </a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">Meeting</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="#" class="dropdown-item inner-menu-modal" id="modl_meet"
                                        data-key="MeetingPageModal">Add Meeting</a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/meeting-list/">List Meeting </a>
                                </div>
                            </li>




                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">Interaction</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="#" class="dropdown-item inner-menu-modal" id="modl_inter"
                                        data-key="IntractionPageModal">Add Interaction</a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/interaction-list/">View Interaction </a>
                                </div>
                            </li>



                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" role="button">
                                    <span data-key="t-horizontal">Documents</span>
                                </a>
                            </li> --}}

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ref" role="button">
                                    <span data-key="t-apps">ShortList</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                    <a href="#" class="dropdown-item inner-menu-modal" id="modl_sl"
                                        data-key="SaveSLModal">Save to SL </a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-item"
                                        data-key="/client-sl-list/">List Client SL</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @include('components.save-sl-modal')
    @include('components.interaction_modal')
    @include('components.meeting_modal')
    @include('components.enquiry_modal')
    @include('components.fix-member-modal')
    @include('components.hold-member-modal')
</div>

@section('bottom-js')
    <!--     timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function () {
            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span class="' + $(state.element).attr('class') + '">' + state.text + '</span>'
                );
                return $state;
            }


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

            const fetchBioDataPickList = async (rno) => {
                try {
                    const tbody = document.querySelector('#table-sl-result tbody');
                    tbody.innerHTML = 'loading....';
                    document.getElementById('sl_input_name').value = ""
                    const response = await fetch("{{ route('customer.picklistbiodata') }}" + '?rno=' + rno, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    const data = await response.json();
                    if (data.results.length > 0) {
                        let html = '';
                        data.results.forEach(element => {
                            html += `<tr><td><div class="form-check"><input class="form-check-input" type="radio" name="proposal" value="${element.id}" checked></div></td><td>${element.id}</td><td>${element.name}</td><td>${element.gender}</td></tr>`;
                        });
                        tbody.innerHTML = html;
                        document.getElementById('sl_input_name').value = data.results[0].name;
                    }
                } catch (error) {
                    console.log('Error:', error);
                }
            }


            // $(".upper-menu-item").click(function () {
            //     if (selected_rno == "") return false;
            //     URL = $(this).data('key') + selected_rno
            //     console.log("url", URL);
            //     window.open(URL, "_blank").focus();
            // });


            $(".inner-menu-item").click(function () {
                if (selected_rno) {
                    URL = $(this).data('key') + selected_rno
                    console.log("url", URL);
                    window.open(URL, "_blank").focus();
                } else {
                    toastr.error("please check candidate first")
                    return;
                }
            });
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let currentTime = `${hours}:${minutes}`;
            let intModalEl = document.getElementById('IntractionPageModal');
            let meetModalEl = document.getElementById('MeetingPageModal');
            let saveSLModalEl = document.getElementById('SaveSLModal');
            let enqModalEl = document.getElementById('EnquiryPageModal');
            let fixModalEl = document.getElementById('fixMemberModal');
            let holdModalEl = document.getElementById('holdMemberModal');


            $(".timepicker").timepicker({
                uiLibrary: 'bootstrap5',
                value: currentTime
            });

            $('#modl_inter').click(function () {
                if (selected_rno) {
                    let interactionmodal = bootstrap.Modal.getInstance(intModalEl) ||
                        new bootstrap.Modal(intModalEl);;
                    interactionmodal.show()
                } else {
                    toastr.error("please check candidate first")
                    return;
                }
                $("#IntractionPageModal #inter_rno").val(rno);
                $("#IntractionPageModal #inter_refname").text(selected_refname)
                $("#IntractionPageModal #inter_refno").text(rno)
            });

            $("#modl_enquiry").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }

                // check if client has already enquired
                let url = "{{ route('get-enquiry', ['rno' => ':rno']) }}";
                url = url.replace(':rno', selected_rno);
                fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(response => response.json()).then(data => {
                    console.log(data)
                    if (data.status == 'success' && data?.data?.status == 0) {
                        toastr.error("Enquiry already entered and not updated yet")
                        return;
                    } else {
                        let enquiryModal = bootstrap.Modal.getInstance(enqModalEl) ||
                            new bootstrap.Modal(enqModalEl);
                        enquiryModal.show()

                    }

                })

                $("#EnquiryPageModal #enquiry_rno").val(rno);
                $("#EnquiryPageModal #enquiry_refno").text(rno);
                $("#EnquiryPageModal #enquiry_refname").text(selected_refname)

                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });
                    $('#EnquiryPageModal #slfor').html(options).select2({
                        dropdownParent: $('#EnquiryPageModal'),
                        placeholder: "Select",
                        allowClear: true
                    });
                });
            });


            $('#modl_meet').click(function () {
                if (selected_rno) {
                    let modal = bootstrap.Modal.getInstance(meetModalEl) ||
                        new bootstrap.Modal(meetModalEl);
                    modal.show()
                } else {
                    toastr.error("please check candidate first")
                    return;
                }

                let url = `{{ route('sendmail.show', ['id' => ':id']) }}`
                url = url.replace(':id', selected_rno);
                fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(response => response.json()).then(data => {
                    console.log(data);
                    let options = '<option value="">Select</option>';

                    data.forEach(element => {
                        let cls = '';
                        let disabled = '';
                        if (element.status == 'F') {
                            cls = 'bg-pink';
                            disabled = 'disabled';
                        }

                        options += `<option value="${element.id}" class="${cls}" ${disabled}>${element.id} - ${element.text}</option>`;
                    });
                    $('#MeetingPageModal #meeting_with')
                        .html(options)
                        .select2({
                            dropdownParent: $('#MeetingPageModal'),
                            placeholder: "Select or type to add",
                            allowClear: true,
                            templateResult: formatState
                        });
                })

                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    $('#MeetingPageModal #att_by1').html(options).select2({
                        dropdownParent: $('#MeetingPageModal'),
                        placeholder: "Select or type to add",
                        allowClear: true
                    });
                    $('#MeetingPageModal #att_by2').html(options).select2({
                        dropdownParent: $('#MeetingPageModal'),
                        placeholder: "Select or type to add",
                        allowClear: true
                    });
                });

                $("#MeetingPageModal #meet_rno").val(rno);
                $("#MeetingPageModal #meet_refname").text(selected_refname)
                $("#MeetingPageModal #meet_refno").text(rno)
            });
            $('#MeetingPageModal #meeting_with').on('change', function () {
                let selectedValue = $(this).val();
                let url = `{{ route('get-meeting_by') }}`
                fetch(url, {
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    method: 'POST',
                    body: JSON.stringify({
                        rno: selected_rno,
                        proposal: selectedValue
                    })
                }).then(response => response.json()).then(data => {
                    if (data.status == "success") {
                        let options = '<option value="">Select</option>';
                        data.data.forEach(element => {
                            options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                        });
                        $('#MeetingPageModal #mtg_by1').html(options)
                        $('#MeetingPageModal #mtg_by2').html(options)
                    }
                })
            })

            $('#modl_sl').click(function () {
                if (selected_rno) {
                    let modal = bootstrap.Modal.getInstance(saveSLModalEl) ||
                        new bootstrap.Modal(saveSLModalEl);
                    modal.show()
                } else {
                    toastr.error("please check candidate first")
                    return;
                }
                $("#SaveSLModal #saveSLModal_rno").val(selected_rno);
                // $("#SaveSLModal #meet_refname").text(selected_refname)
                // $("#SaveSLModal #meet_refno").text(rno)
            });

            document.getElementById('sl_input_rno').addEventListener('input', function (event) {
                let rno = event.target.value;
                const debouncedFetch = debounce(fetchBioDataPickList, 300);
                document.getElementById('error_msg').textContent = '';
                document.getElementById('success_msg').textContent = '';
                debouncedFetch(rno);
            });

            $("#frmSaveSL").submit(async function (e) {
                e.preventDefault();
                let form = this;

                if (!form.checkValidity()) {
                    form.reportValidity(); // Shows browser validation messages
                    return; // Stop submission
                }
                document.getElementById('error_msg').textContent = '';
                document.getElementById('success_msg').textContent = '';
                let formData = new FormData(form);
                const url = "{{ route('save-client-sl') }}";
                let response = await fetch(url, {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                });

                let data = await response.json();
                console.log(data);
                if (data.status === 'error') {
                    document.getElementById('error_msg').textContent = data.message;
                } else {
                    document.getElementById('success_msg').textContent = data.message;
                }
            })

            document.getElementById('btnAddInteraction').addEventListener('click', async function () {
                let form = document.getElementById('frmAddInteraction');

                if (!form.checkValidity()) {
                    form.reportValidity(); // Shows browser validation messages
                    return; // Stop submission
                }


                let formData = new FormData(form);
                const url = "{{ route('save-interaction') }}"
                let response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });

                let data = await response.json();
                let interactionmodal = bootstrap.Modal.getInstance(intModalModalEl);

                // interactionmodal.hide();

                if (data.status === 'success') {
                    interactionmodal.hide();
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message || 'There was an error saving the interaction.');
                }
            });


            $("#frmAddEnquiry").submit(async function (e) {
                e.preventDefault();
                let form = this;

                if (!form.checkValidity()) {
                    form.reportValidity(); // Shows browser validation messages
                    return; // Stop submission
                }

                let formData = new FormData(form);
                const url = "{{ route('save-enquiry') }}"
                let response = await fetch(url, {
                    method: 'POST',
                    body: formData
                });

                let data = await response.json();
                let enquiryModal = bootstrap.Modal.getInstance(enqModalEl) ||
                    new bootstrap.Modal(enqModalEl);

                if (data.status === 'success') {
                    enquiryModal.hide();
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message || 'There was an error saving the enquiry.');
                }
            });



            $('#modl_fix').click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                // check if client has already enquired
                let url = "{{ route('check-fix-member', ['rno' => ':rno']) }}";
                url = url.replace(':rno', selected_rno);
                fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(response => response.json()).then(data => {
                    console.log(data)
                    if (data.status == 'error') {
                        toastr.error(data.message)
                        return;
                    } else {
                        let modal = bootstrap.Modal.getInstance(fixModalEl) ||
                            new bootstrap.Modal(fixModalEl);
                        modal.show()
                    }
                })

                $("#fixMemberModal #fixMemberModal_rno").val(selected_rno);
                $("#fixMemberModal #fixMemberModal_refname").val(selected_refname)
                $("#fixMemberModal #fixMemberModal_refno").val(selected_rno)
                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });
                    $('#fixMemberModal #fix_by').html(options).select2({
                        dropdownParent: $('#fixMemberModal'),
                        placeholder: "Select",
                        allowClear: true
                    });
                });
            });


            $("#frmFixMember").validate({
                rules: {
                    fix_by: "required",
                    fixed_through: "required",
                    remarks: "required",
                },
                messages: {
                    fix_by: "Please select fix by",
                    fixed_through: "Please select fixed through",
                    remarks: "Please enter remarks",
                },
                submitHandler: function (form) {
                    // form.submit();
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
            });



            $('#modl_hold').click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                let url = "{{ route('check-hold-member', ['rno' => ':rno']) }}";
                url = url.replace(':rno', selected_rno);
                fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(response => response.json()).then(data => {
                    console.log(data)
                    if (data.status == 'error') {
                        $("#holdMemberModal #holdMemberModal_status").val(1);
                        $("#holdMemberModal .holdMemberModal_action_label").text("Release");
                    } else {
                        $("#holdMemberModal #holdMemberModal_status").val(0);
                        $("#holdMemberModal .holdMemberModal_action_label").text("Hold");
                    }

                    let modal = bootstrap.Modal.getInstance(holdModalEl) ||
                        new bootstrap.Modal(holdModalEl);
                    modal.show()
                })

                $("#holdMemberModal #holdMemberModal_rno").val(selected_rno);
                $("#holdMemberModal #holdMemberModal_refname").val(selected_refname)
                $("#holdMemberModal #holdMemberModal_refno").val(selected_rno)
                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });
                    $('#holdMemberModal #hold_by').html(options).select2({
                        dropdownParent: $('#holdMemberModal'),
                        placeholder: "Select",
                        allowClear: true
                    });
                });
            });



            $("#frmHoldMember").validate({
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
                    hold_by: "required",
                    reason: "required",
                },
                messages: {
                    hold_by: "Please select hold by",
                    reason: "Please enter reason",
                },
                submitHandler: function (form) {
                    // form.submit();
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
                                    window.location.reload();
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

        });
    </script>
@endsection