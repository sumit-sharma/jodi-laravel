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


                                    <a href="javascript:;" class="dropdown-item inner-menu-modal"
                                        id="modl_delete_member" data-key="DeleteMemberModal">Delete Member </a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal"
                                        id="modl_convert_member" data-key="ConvertMemberModal">Convert Member </a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal"
                                        id="modl_change_tctlrm" data-key="ChangeTCTLRMPageModal">Change TC/TL/RM</a>

                                    <a href="javascript:;" class="dropdown-item" id="btnToggleClassified"
                                        data-key="t-chat">Classified</a>
                                    <a href="javascript:;" class="dropdown-item" id="btnToggleNonActive"
                                        data-key="t-chat">Make Non Active </a>
                                    <a href="javascript:;" class="dropdown-item" id="btnToggleVisited"
                                        data-key="t-chat">Visited/Non Visited </a>
                                    <a href="javascript:;" class="dropdown-item" id="btnToggleOC" data-key="t-chat">OC /
                                        Non-OC</a>
                                    <a href="javascript:;" class="dropdown-item" id="btnFollowUp"
                                        data-key="t-calendar">To follow up </a>
                                    {{-- <a href="#" class="dropdown-item" data-key="t-chat">Prospective </a> --}}
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal" id="modl_hold"
                                        data-key="holdMemberModal">Hold/Release</a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal" id="modl_fix"
                                        data-key="fixMemberModal">Fix/Active </a>
                                    <a href="javascript:;" class="dropdown-item inner-menu-modal"
                                        id="modl_form_transfer" data-key="formTransferModal">Form Transfer</a>
                                    {{--
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
    @include('components.change_tctlrm_modal')
    @include('components.followup_modal')
    @include('components.form-transfer-modal')
    @include('components.convert_modal')
    {{-- @include('components.delete_member_modal') --}}
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
            let changeTctlrmModalEl = document.getElementById('ChangeTCTLRMPageModal');
            let followUpModalEl = document.getElementById('FollowUpModal');
            let formTransferModalEl = document.getElementById('FormTransferModal');
            let convertMemberModalEl = document.getElementById('ConvertMemberModal');

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
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status === 'success') {
                                cacheClear(cacheKey);
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



            $('#modl_change_tctlrm').click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                $("#ChangeTCTLRMPageModal #chg_tctlrm_refno").text(selected_rno);
                $("#ChangeTCTLRMPageModal #chg_tctlrm_refname").text(selected_refname)
                $("#ChangeTCTLRMPageModal #tctlrm_rno").val(selected_rno)

                let url = "{{ route('fetch-tctlrm-member', ['rno' => ':rno']) }}";
                url = url.replace(':rno', selected_rno);
                fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                    }
                }).then(response => response.json()).then(data => {
                    let modal = bootstrap.Modal.getInstance(changeTctlrmModalEl) ||
                        new bootstrap.Modal(changeTctlrmModalEl);
                    modal.show()

                    fetchActiveEmployee().then((employeeData) => {
                        let options = '<option value="">Select</option>';
                        employeeData.data.forEach(element => {
                            options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                        });
                        $('#ChangeTCTLRMPageModal #tc').html(options).select2({
                            dropdownParent: $('#ChangeTCTLRMPageModal'),
                            placeholder: "Select",
                            allowClear: true
                        });
                        $('#ChangeTCTLRMPageModal #tl').html(options).select2({
                            dropdownParent: $('#ChangeTCTLRMPageModal'),
                            placeholder: "Select",
                            allowClear: true
                        });
                        $('#ChangeTCTLRMPageModal #rm').html(options).select2({
                            dropdownParent: $('#ChangeTCTLRMPageModal'),
                            placeholder: "Select",
                            allowClear: true
                        });
                        if (data.status == 'success') {
                            $('#ChangeTCTLRMPageModal #tc').val(data.data.tc).trigger('change')
                            $('#ChangeTCTLRMPageModal #tl').val(data.data.mc).trigger('change')
                            $('#ChangeTCTLRMPageModal #rm').val(data.data.rm).trigger('change')
                            $('#ChangeTCTLRMPageModal #old_tc').val(data.data.tc)
                            $('#ChangeTCTLRMPageModal #old_tl').val(data.data.mc)
                            $('#ChangeTCTLRMPageModal #old_rm').val(data.data.rm)
                        }
                    });


                })

            });

            $("#frmConvertMember").validate({
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
                    tc: {
                        required: true
                    },
                    tl: {
                        required: true
                    },
                    rm: {
                        required: true
                    }
                },
                messages: {
                    tc: {
                        required: "Please select a TC"
                    },
                    tl: {
                        required: "Please select a TL"
                    },
                    rm: {
                        required: "Please select a RM"
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


            $("#btnToggleVisited").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                var txtMsh = "Are you sure to mark this candidate as visited ?";
                if (selected_vc == 1) {
                    txtMsh = "Are you sure to remove visited status ?";
                }
                var title = selected_rno + " - " + selected_refname

                Swal.fire({
                    title: title,
                    text: txtMsh,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "{{ route('toggle-visited', ['rno' => ':rno']) }}";
                        url = url.replace(':rno', selected_rno);
                        $.ajax({
                            url: url,
                            type: "PUT",
                            data: {
                                cacheKey: cacheKey
                            },
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
                })
            });


            $("#btnToggleOC").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                var txtMsh = "Are you sure to move to open community ?";
                if (selected_oc == 1) {
                    txtMsh = "Are you sure to remove from open community ?";
                }
                var title = selected_rno + " - " + selected_refname

                Swal.fire({
                    title: title,
                    text: txtMsh,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, do it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "{{ route('toggle-oc', ['rno' => ':rno']) }}";
                        url = url.replace(':rno', selected_rno);
                        $.ajax({
                            url: url,
                            type: "PUT",
                            data: {
                                cacheKey: cacheKey
                            },
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
                })
            });


            $("#btnToggleClassified").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }

                fetch("{{ route('get-classified', ['rno' => ':rno']) }}".replace(':rno', selected_rno))
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            if (data?.data?.status == 1) {
                                txtMsg = "You want to make this candidate as non-classified";
                                btnText = "Make Non-Classified";
                            } else {
                                txtMsg = "You want to make this candidate as classified";
                                btnText = "Make Classified";
                            }
                            var title = selected_rno + " - " + selected_refname
                            Swal.fire({
                                title: title,
                                text: txtMsg,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: btnText,
                                showLoaderOnConfirm: true,

                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var url = "{{ route('toggle-classified', ['rno' => ':rno']) }}";
                                    url = url.replace(':rno', selected_rno);
                                    $.ajax({
                                        url: url,
                                        type: "PUT",
                                        success: function (response) {
                                            if (response.status === 'success') {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Success',
                                                    text: response.message,
                                                })
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
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    });
            });

            $("#btnToggleNonActive").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }

                if (selected_rno.charAt(0) != '4') {
                    toastr.error("Applicable only to paid customers")
                    return;
                }
                if (selected_ost == "F") {
                    toastr.error("Customer is already on-hold")
                    return;
                }
                var title = selected_rno + " - " + selected_refname
                var actText = ""
                if (selected_ost == "N") {
                    actText = "Do you want to this candidate release from non active?"
                } else {
                    actText = "Do you want to this candidate put into non active?"
                }
                Swal.fire({
                    title: title,
                    text: actText,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes",
                    showLoaderOnConfirm: true,

                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('toggle-non-active', ['rno' => ':rno']) }}";
                        url = url.replace(':rno', selected_rno);

                        $.ajax({
                            url: url,
                            type: "PUT",
                            data: {
                                cacheKey: cacheKey
                            },
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

            $("#btnFollowUp").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                if (selected_rno.charAt(0) == '4') {
                    toastr.error("Applicable only to non paid customers")
                    return;
                }

                let modal = bootstrap.Modal.getInstance(followUpModalEl) || new bootstrap.Modal(followUpModalEl);
                modal.show();
                $("#frmFollowUp #followup_refno").text(selected_rno);
                $("#frmFollowUp #followup_refname").text(selected_refname);
                $("#frmFollowUp #followup_rno").val(selected_rno);
                let empid = "";
                let url = "{{ route('fetch-followup', ['rno' => ':rno']) }}".replace(':rno', selected_rno)

                $("label#followup_empid-error").text("");

                Promise.all([
                    fetch(url).then(r => r.json()),
                    fetchActiveEmployee()
                ]).then(([followupRes, employeeData]) => {

                    if (followupRes?.data?.dated) {
                        $(".prev_date").removeClass("d-none");
                        $("#frmFollowUp #followup_prev_date").text(convertDate(followupRes.data.dated));
                        empid = followupRes.data.empid;
                    } else {
                        $(".prev_date").addClass("d-none");
                    }

                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    const $emp = $("#frmFollowUp #followup_empid");

                    $emp.html(options).select2({
                        dropdownParent: $('#FollowUpModal'),
                        placeholder: "Select",
                        allowClear: true
                    });

                    if (empid) {
                        $emp.val(String(empid)).trigger("change");
                    }

                }).catch(err => console.error(err));

            });

            $("#frmFollowUp").validate({
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
                    empid: {
                        required: true,
                        remote: {
                            url: "{{ route('check-limit') }}",
                            type: "GET",
                            data: {
                                empid: function () {
                                    return $("#frmFollowUp #followup_empid").val();
                                },
                                rno: function () {
                                    return $("#frmFollowUp #followup_rno").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    empid: {
                        required: "Please select employee",
                        remote: "Reached Maximum Limit of Followup ({{ config('constants.FOLLOWUP_LIMIT') }})"
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
                                $("#FollowUpModal").modal("hide");
                                $("#frmFollowUp").trigger("reset");
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


            $("#modl_form_transfer").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                if (selected_rno.charAt(0) == '4') {
                    toastr.error("Applicable only to non paid customers")
                    return;
                }

                let modal = bootstrap.Modal.getInstance(formTransferModalEl) || new bootstrap.Modal(formTransferModalEl);
                modal.show();
                $("#frmFormTransfer #form_transfer_refno").text(selected_rno);
                $("#frmFormTransfer #form_transfer_refname").text(selected_refname);
                $("#frmFormTransfer #form_transfer_rno").val(selected_rno);



                fetchActiveEmployee().then((employeeData) => {
                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });
                    $("#frmFormTransfer #form_transfer_empid").html(options)
                        .select2({
                            dropdownParent: $('#FormTransferModal'),
                            placeholder: "Select",
                            allowClear: true
                        });
                });
            });
            $("#frmFormTransfer").validate({
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
                    assign_to: {
                        required: true
                    },
                    remarks: {
                        required: true
                    }
                },
                messages: {
                    assign_to: {
                        required: "Please select assign to"
                    },
                    remarks: {
                        required: "Please enter remarks"
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
                                $("#FormTransferModal").modal("hide");
                                $("#frmFormTransfer").trigger("reset");
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
            $("#modl_convert_member").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }
                if (selected_rno.charAt(0) == '4') {
                    toastr.error("Applicable only to non paid customers")
                    return;
                }

                let modal = bootstrap.Modal.getInstance(convertMemberModalEl) || new bootstrap.Modal(convertMemberModalEl);
                modal.show();

                $("#convert_loader").show();
                $("#frmConvertMemberProcess").addClass("d-none");

                let url = "{{ route('get-counter-number') }}?countername=PAID";
                let maxPaidCounter;

                Promise.all([
                    fetch(url).then(r => r.json()),
                    fetchActiveEmployee()
                ]).then(([maxPaidCounterRes, employeeData]) => {
                    $("#convert_loader").hide();
                    $("#frmConvertMemberProcess").removeClass("d-none");
                    if (maxPaidCounterRes?.status == "success") {
                        maxPaidCounter = parseInt(maxPaidCounterRes?.data) + 1;
                        $("#convert_to").val(`${maxPaidCounter} - ${selected_refname}`);
                        $("#convert_from").val(`${selected_rno} - ${selected_refname}`);
                        $("#convert_rno").val(selected_rno);
                    }


                    let options = '<option value="">Select</option>';
                    employeeData.data.forEach(element => {
                        options += `<option value="${element.username}">${element.username} - ${element.name}</option>`;
                    });

                    const tc_code = $("#frmConvertMemberProcess #tc_code");
                    const tl_code = $("#frmConvertMemberProcess #tl_code");
                    const rm_code = $("#frmConvertMemberProcess #rm_code");

                    tc_code.html(options).select2({
                        dropdownParent: $('#ConvertMemberModal'),
                        placeholder: "Select",
                        allowClear: true
                    });

                    tl_code.html(options).select2({
                        dropdownParent: $('#ConvertMemberModal'),
                        placeholder: "Select",
                        allowClear: true
                    });

                    rm_code.html(options).select2({
                        dropdownParent: $('#ConvertMemberModal'),
                        placeholder: "Select",
                        allowClear: true
                    });

                    // tc_code.trigger("change");
                    // tl_code.trigger("change");
                    // rm_code.trigger("change");


                }).catch(err => console.error(err));

            });

            $("#frmConvertMemberProcess").validate({
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
                    tc_code: {
                        required: true
                    },
                    tl_code: {
                        required: true
                    },
                    rm_code: {
                        required: true
                    }
                },
                messages: {
                    tc_code: {
                        required: "Please select TC"
                    },
                    tl_code: {
                        required: "Please select TL"
                    },
                    rm_code: {
                        required: "Please select RM"
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
                                cacheClear(cacheKey);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#ConvertMemberModal").modal("hide");
                                $("#frmConvertMemberProcess").trigger("reset");
                                window.location.reload();
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

            $("#modl_delete_member").click(function () {
                if (selected_rno == "") {
                    toastr.error("please check candidate first")
                    return;
                }

                let rno = selected_rno;

                // STEP 1: Confirm
                Swal.fire({
                    title: 'Are you sure to delete this member?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    confirmButtonColor: "#dc3545",
                    cancelButtonText: 'Cancel'
                }).then((result) => {

                    if (!result.isConfirmed) return;

                    // STEP 2: Ask password
                    Swal.fire({
                        title: 'Confirm Password',
                        input: 'password',
                        inputPlaceholder: 'Enter your password',
                        inputAttributes: {
                            autocomplete: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Verify & Proceed',
                        showLoaderOnConfirm: true,
                        preConfirm: (password) => {

                            if (!password) {
                                Swal.showValidationMessage('Password is required');
                                return false;
                            }

                            // STEP 3: AJAX call
                            return $.ajax({
                                url: "{{ route('customer.delete') }}",
                                type: 'POST',
                                data: {
                                    rno: rno,
                                    password: password,
                                    _token: '{{ csrf_token() }}'
                                }
                            }).catch(xhr => {
                                Swal.showValidationMessage(
                                    xhr.responseJSON?.message || 'Invalid password'
                                );
                            });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        cacheClear(cacheKey);
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Done!',
                                text: 'Action completed successfully'
                            });
                            $('tr[data-rno="' + rno + '"]').fadeOut(300, function () {
                                $(this).remove();
                            });

                            // Optional: reload / remove row
                            // location.reload();
                        }
                    });

                });
            });
        });
    </script>
@endsection