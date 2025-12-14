@extends('layouts.home')
@section('main-content')
    <div class="container-fluid">
        <style>
            .form-check-input {
                width: 1em !important;
                height: 1em !important;
                border: 1px solid #420d1c !important;
            }

            td {
                vertical-align: middle;
                text-align: center;
            }
        </style>
        <div class="row">
            @include('components.inner-menu')
        </div>
        <div class="row">
            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Search Member Result</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                                            <li class="breadcrumb-item active">Form Transfer</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>


                            <div class="col-md-8">
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
                            <div class="col-md-2">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $results->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            {{-- @dump($results) --}}
                            @php
                                function msValue($msInt)
                                {
                                    $ms = '';
                                    switch ($msInt) {
                                        case '1':
                                            $ms = 'Never Married';
                                            break;
                                        case '2':
                                            $ms = 'Divorced';
                                            break;
                                        case '3':
                                            $ms = 'Widow';
                                            break;
                                        case '4':
                                            $ms = 'Separated';
                                            break;
                                    }
                                    return $ms;
                                }

                                function rsValue($rs)
                                {
                                    $rs_value = '';
                                    switch ($rs) {
                                        case '1':
                                            $rs_value = 'Indian Citizen';
                                            break;
                                        case '2':
                                            $rs_value = 'Temp. Residing Abroad';
                                            break;
                                        case '3':
                                            $rs_value = 'Non Resident Indian';
                                            break;
                                    }
                                    return $rs_value;
                                }

                            @endphp

                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="{!! $results->count() > 2 ? 'table-responsive' : '' !!} mb-0"
                                        data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ref No.</th>
                                                    <th>Gender</th>
                                                    <th>Name</th>
                                                    <th>Born</th>
                                                    <th>Age</th>
                                                    <th>Ms</th>
                                                    <th>Caste</th>
                                                    <th>Height</th>
                                                    <th>Ast</th>
                                                    <th>Ed</th>
                                                    <th>CB</th>
                                                    <th>Family Income</th>
                                                    <th>Location</th>
                                                    <th>Occupation</th>
                                                    <th>Rs</th>
                                                    <th>TC</th>
                                                    <th>RM</th>
                                                    <th>L_CALL</th>
                                                    <th>L_Mail</th>
                                                    <th>L_Mtng</th>
                                                    <th>R_Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($results as $data)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input chkrno" type="radio"
                                                                    name="formRadios" data-refname="{{ $data->refname }}"
                                                                    value="{{ $data->rno }}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $data->rno }}">{{ $data->rno }}</a>
                                                        </td>
                                                        <td>{{ $data->g }}</td>
                                                        <td>{{ $data->refname }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->dob)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->dob)->age }}</td>
                                                        <td>{{ msValue($data->ms) }}</td>
                                                        <td>{{ $data->cst }}</td>
                                                        <td>{{ $data->hg }}</td>
                                                        <td>{{ $data->bio->astrostatus->label() }}</td>
                                                        <td>{{ $data->bio->education->label() }}</td>
                                                        <td>{{ $data->personal->budget }}</td>
                                                        <td>{{ $data?->income?->income }}</td>
                                                        <td>{{ $data->personal->arealocation }}</td>
                                                        <td>{{ $data->occupation?->name }}</td>
                                                        <td>{{ rsValue($data->rs) }}</td>
                                                        <td>{{ $data->tc }}</td>
                                                        <td>{{ $data->rm }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_call)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mail)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mtng)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->profiledate)->format('M d Y') }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group me-1 mt-2">
                                                                <span class="dropdown-toggle  dropstart dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i data-feather="more-vertical"></i>
                                                                </span>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.edit', ['customer' => $data->rno]) }}">Edit
                                                                        Profile</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.uplod-photo', ['rno' => $data->rno]) }}">Upload
                                                                        Photo</a>
                                                                    <a class="dropdown-item" href="#">Update
                                                                        Finance</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                        {{ $results->withQueryString()->links() }}
                                    </div>

                                    @include('components.biodata_modal')
                                    @include('components.interaction_modal')
                                    @include('components.meeting_modal')

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
        var selected_rno = "";
        var selected_refname = "";
        $(document).on("click", ".biodata_modal", function () {
            let rno = $(this).data("rno"); // auto-parsed JSON
            const options = {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'GET',
            }

            const url = `{{ route('search-data') }}?searchinfield=rno&searchvalue=${encodeURIComponent(rno)}`

            fetch(url, options)
                .then(res => res.json())
                .then(data => {
                    const item = data.data[0];

                    let religion_name = ""
                    switch (item.rl) {
                        case 1:
                            religion_name = "Hindu"
                            break;
                        case 2:
                            religion_name = "Sikh"
                            break;
                        case 3:
                            religion_name = "Jain"
                            break;
                        case 4:
                            religion_name = "Christian"
                            break;
                        case 5:
                            religion_name = "Muslim"
                            break;
                    }



                    let complexion = "";
                    switch (item.bio.complexion) {
                        case 1:
                            complexion = "Very Fair";
                            break;
                        case 2:
                            complexion = "Fair";
                            break;
                        case 3:
                            complexion = "Wheatish";
                            break;
                        case 4:
                            complexion = "Brown";
                            break;
                        case 5:
                            complexion = "Dark";
                            break;
                    }


                    const birthDate = new Date(item.bio.dob);
                    const today = new Date();
                    let years = today.getFullYear() - birthDate.getFullYear();


                    let eyecolor = ""
                    switch (item.personal.eyecolor) {
                        case 1:
                            eyecolor = "Amber"
                            break;
                        case 2:
                            eyecolor = "Blue"
                            break;
                        case 3:
                            eyecolor = "Brown"
                            break;
                        case 4:
                            eyecolor = "Black"
                            break;
                        case 5:
                            eyecolor = "Gray"
                            break;
                        case 6:
                            eyecolor = "Green"
                            break;
                        case 7:
                            eyecolor = "Hazel"
                            break;
                        case 8:
                            eyecolor = "Red & Violet"
                            break;
                        case 9:
                            eyecolor = "Spectrum"
                            break;
                    }

                    let haircolor = "";
                    switch (item.personal.haircolor) {
                        case 1:
                            haircolor = "Black"
                            break;
                        case 2:
                            haircolor = "Brown"
                            break;
                        case 3:
                            haircolor = "Grey"
                            break;
                        case 4:
                            haircolor = "Blond"
                            break;
                        case 5:
                            haircolor = "Bald"
                            break;
                    }

                    let ast = ""
                    switch (item.bio.astrostatus) {
                        case 1:
                            ast = "Manglik";
                            break;
                        case 2:
                            ast = "Slightly Manglik";
                            break;
                        case 3:
                            ast = "Non Manglik";
                            break;
                        case 4:
                            ast = "Don't Believe";
                            break;
                        case 5:
                            ast = "Don't Know";
                            break;
                    }


                    let dh = ""
                    switch (item.bio.drinkinghabit) {
                        case 1:
                            dh = "Non Consumer";
                            break;
                        case 2:
                            dh = "Drink Occasionally";
                            break;
                        case 3:
                            dh = "Regular Drinker";
                            break;
                        case 4:
                            dh = "Don't Know";
                            break;
                    }

                    let smoking = ""
                    switch (item.bio.smokinghabit) {
                        case 1:
                            smoking = "Non Smoker"
                            break;
                        case 2:
                            smoking = "Smoker"
                            break;
                        case 3:
                            smoking = "Don't Know"
                            break;
                    }

                    let eating = ""
                    switch (item.bio.eatinghabit) {
                        case 1:
                            eating = "Vegetarian"
                            break;
                        case 2:
                            eating = "Eggetarian"
                            break;
                        case 3:
                            eating = "Non Vegetarian"
                            break;
                        case 4:
                            eating = "Don't Know"
                            break;
                        case 5:
                            eating = "Occasionally Non Vegetarian"
                            break;
                    }

                    $("#Modal_biodata #btn_pdf").attr("href", `/pdfview/fullbiodata/${item.rno}`);

                    // $("#Modal_biodata #rno").text(item.rno);
                    $("#Modal_biodata #gender").text(item.g);
                    $("#Modal_biodata #refname").text(item.refname);
                    $("#Modal_biodata #dob").text(item.bio.dob);



                    $("#Modal_biodata #age").text(parseInt(years));
                    $("#Modal_biodata #tob").text(item.bio.tob);
                    $("#Modal_biodata #pob").text(item.bio.pob);



                    $("#Modal_biodata #height").text(item.hghtft);
                    $("#Modal_biodata #weight").text(item.wt);
                    $("#Modal_biodata #religion").text(religion_name);

                    $("#Modal_biodata #caste").text(item.cst);
                    $("#Modal_biodata #subcaste").text(item.bio.subcaste);
                    $("#Modal_biodata #gotra").text(item.bio.gotra);


                    $("#Modal_biodata #complexion").text(complexion);
                    $("#Modal_biodata #eyecolor").text(eyecolor);
                    $("#Modal_biodata #haircolor").text(haircolor);


                    $("#Modal_biodata #bg").text(item.bio.bg);
                    $("#Modal_biodata #astrostatus").text(ast);
                    $("#Modal_biodata #dh").text(dh);

                    $("#Modal_biodata #smoking").text(smoking);
                    $("#Modal_biodata #eating").text(eating);
                    $("#Modal_biodata #spec").text(item.bio.spects);



                    $("#Modal_biodata #dd").text(item.bio.dd);
                    $("#Modal_biodata #hobbies").text(item.personal.hobbies);
                    $("#Modal_biodata #characteristics").text(item.personal.characteristics);


                    let education = "";
                    switch (item.ed) {
                        case "1":
                            education = "Matriculate"
                            break;
                        case "2":
                            education = "Under Graduate"
                            break;
                        case "3":
                            education = "Graduate"
                            break;
                        case "6":
                            education = "Double Graduate"
                            break;
                        case "4":
                            education = "Post Graduate"
                            break;
                        case "5":
                            education = "Doctorate"
                            break;
                    }

                    html = `<tr><td><strong>Education:</strong></td><td colspan="5">${education}</td></tr>`
                    item.education.forEach(ed => {
                        html += `
                                <tr>
                                    <td><strong>Name of Course:</strong></td>
                                    <td><label class="educourse">${ed.educourse}</label></td>
                                    <td><strong>Institution:</strong></td>
                                    <td><label class="eduinst">${ed.eduinst}</label></td>
                                    <td><strong>Year:</strong></td>
                                    <td><label class="eduyear">${ed.eduyear}</label></td>
                                    </tr>`;
                    });
                    $("#Modal_biodata #education_container").html(html);
                    $("#Modal_biodata #occupation").text(item?.occupation?.name);
                    $("#Modal_biodata #income").text(item?.income?.income);
                    $("#Modal_biodata #salary").text(item?.personal?.salary);

                    $("#Modal_biodata #tbody_organistion").children('tr.company_row').remove();
                    let companyhtml = "";

                    item.organisation.forEach(org => {
                        companyhtml += `<tr class="company_row">
                                            <td><strong>Company Name:</strong></td>
                                            <td>${org.orgname}</td>
                                            <td><strong>Designation:</strong></td>
                                            <td>${org.orgdept}</td>
                                            <td><strong>Working Year:</strong></td>
                                            <td>${org.orgyear}</td>
                                        </tr>`;
                    });
                    $("#Modal_biodata #tbody_organistion").append(companyhtml)

                    let rs_value = ""
                    switch (item.rs) {
                        case "1":
                            rs_value = "Indian Citizen"
                            break;
                        case "2":
                            rs_value = "Temp. Residing Abroad"
                            break;
                        case "3":
                            rs_value = "Non Resident Indian"
                            break;

                    }
                    let ms = ""
                    switch (item.ms) {
                        case "1":
                            ms = "Never Married"
                            break;
                        case "2":
                            ms = "Divorced"
                            break;
                        case "3":
                            ms = "Widow"
                            break;
                        case "4":
                            ms = "Separated"
                            break;
                    }

                    $("#Modal_biodata #rs").text(rs_value);
                    $("#Modal_biodata #rcountry").text(item.personal.rcountry);
                    $("#Modal_biodata #visa").text(item.personal.visa);
                    $("#Modal_biodata #nationality").text(item.personal.nationality);
                    $("#Modal_biodata #rcity").text(item.personal.rcity);
                    $("#Modal_biodata #ms").text(ms);
                    $("#Modal_biodata #child").text(item.ch);
                    $("#Modal_biodata #marriageinfo").text(item.personal.marriageinfo);
                    $("#Modal_biodata #childdetails").text(item.personal.childdetails);


                    let bshtml = "";
                    item.profilebs.forEach(bs => {
                        bshtml += `<tr>
                                        <td><strong>Name of Brother / Sister:</strong></td>
                                        <td>${bs.bsname}</td>
                                        <td><strong>B/S:</strong></td>
                                        <td>${bs.bs}</td>
                                        <td><strong>Age:</strong></td>
                                        <td>${bs.bsage}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ms-St:</strong></td>
                                        <td>${bs.bsmarriage}</td>
                                        <td><strong>Personal Details:</strong></td>
                                        <td colspan="3">${bs.bsdetails}</td>
                                    </tr>`;
                    })

                    $("#Modal_biodata #family_detail").append(bshtml)

                    $("#Modal_biodata #typeoffamily").text(item.personal.typeoffamily);
                    $("#Modal_biodata #familystatus").text(item.personal.familystatus);
                    $("#Modal_biodata #fathersname").text(item.personal.fathersname);
                    $("#Modal_biodata #fatherdetails").text(item.personal.fatherdetails);
                    $("#Modal_biodata #mothersname").text(item.personal.mothersname);
                    $("#Modal_biodata #motherdetails").text(item.personal.motherdetails);
                    $("#Modal_biodata #familyhistory").text(item.personal.familyhistory);
                    $("#Modal_biodata #personaldetails").text(item.personal.personaldetails);
                    $("#Modal_biodata #familyincome").text(item.personal.familyincome);
                    $("#Modal_biodata #familynative").text(item.personal.familynative);
                    $("#Modal_biodata #budget").text(item.personal.budget);

                    $("#Modal_biodata #contactperson").text(item.personal.contactperson);
                    $("#Modal_biodata #contactaddress").text(item.personal.contactaddress);

                    $("#Modal_biodata #arealocation").text(item.personal.arealocation);
                    $("#Modal_biodata #contactcity").text(item.personal.contactcity);
                    $("#Modal_biodata #contactpincode").text(item.personal.contactpincode);

                    $("#Modal_biodata #contactstate").text(item.personal.contactstate);
                    $("#Modal_biodata #contactcountry").text(item.personal.contactcountry);
                    $("#Modal_biodata #contactphone").text(item.personal.contactphone);


                    $("#Modal_biodata #contactemail").text(item.personal.contactemail);
                    $("#Modal_biodata #contactrelation").text(item.personal.contactrelation);
                    $("#Modal_biodata #contactzone").text(item.personal.zone.zone_name);






                })


            // // Example: Fill modal fields

            // // You can access full object here
            // console.log(item.refname);
        });
    </script>

    <script>
        $(function () {
            $('.chkrno').on('change', function () {
                rno = $(this).val()
                refname = $(this).data('refname');
                console.log("rno", rno);
                selected_rno = rno;
                selected_refname = refname;
            });

            $(".inner-menu-item").click(function () {
                if (selected_rno == "") return false;
                URL = $(this).data('key') + selected_rno
                console.log("url", URL);
                window.open(URL, "_blank").focus();
            });
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let currentTime = `${hours}:${minutes}`;
            let intModalModalEl = document.getElementById('IntractionPageModal');
            let meetModalModalEl = document.getElementById('MeetingPageModal');

            $("#inter_tob").timepicker({
                uiLibrary: 'bootstrap5',
                value: currentTime
            });

            $('#modl_inter').click(function () {
                if (selected_rno) {
                    let interactionmodal = bootstrap.Modal.getInstance(intModalModalEl) ||
                        new bootstrap.Modal(intModalModalEl);;
                    interactionmodal.show()
                } else {
                    toastr.error("please check candidate first")
                    return;
                }
                $("#IntractionPageModal #inter_rno").val(rno);
                $("#IntractionPageModal #inter_refname").text(selected_refname)
                $("#IntractionPageModal #inter_refno").text(rno)
            });

            $('#modl_meet').click(function () {
                if (selected_rno) {
                    let meetingmodal = bootstrap.Modal.getInstance(meetModalModalEl) ||
                        new bootstrap.Modal(meetModalModalEl);
                    meetingmodal.show()
                } else {
                    toastr.error("please check candidate first")
                    return;
                }
                $("#MeetingPageModal #meet_rno").val(rno);
                $("#MeetingPageModal #meet_refname").text(selected_refname)
                $("#MeetingPageModal #meet_refno").text(rno)
            });

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
                //     document.getElementById('result').innerHTML = "Success!";
                //     console.log(data);
                // } else {
                //     console.log("Error:", data);
                // }
            });
        });
    </script>
@endsection