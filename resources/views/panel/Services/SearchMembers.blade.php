@extends('layouts.home')

@section('main-content')
    <style>
        .table thead {
            position: sticky;
            top: 0;
            background: #f8f9fa;
            /* match table header */
            z-index: 1;
        }
    </style>
    <div class="container-fluid">



        <div class="row">


            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Search Members</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                        <li class="breadcrumb-item active">Search Members</li>
                                        <div class="page-title-right">
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-5">
                                <form id="frmSearchMember" method="POST" action="{{ route('search-data') }}">
                                    @csrf
                                    <div class="row mb-6">
                                        <div class="col-12 mb-3">
                                            <h5 class="font-size-14 mb-2">Select Field:</h5>
                                            <select name="searchinfield" class="form-select">
                                                <option value="rno">Ref No.</option>
                                                <option value="refname">Name</option>
                                                <option value="dob">Date of Birth</option>
                                                <option value="birthyear">Birth Year</option>
                                                <option value="caste">Caste</option>
                                                <option value="occupation">Occupation</option>
                                                <option value="familyincome">Family Income</option>
                                                <option value="contactphone">Mobile</option>
                                                <option value="rcity">Residing City</option>
                                                <option value="zone">Zone</option>
                                                <option value="arealocation">Location</option>
                                                <option value="contactcity">Contact City</option>
                                                <option value="contactstate">Contact State</option>
                                                <option value="contactemail">Email ID</option>
                                                <option value="tc">Tele-councelor</option>
                                                <option value="mc">Team Leader</option>
                                                <option value="rm">Relationship Manager</option>
                                                <option value="fathersname">Father's Name</option>
                                                <option value="fatherdetails">Father's Occupation</option>
                                                <option value="mothersname">Mother's Name</option>
                                                <option value="motherdetails">Mother's Occupation</option>
                                                <option value="edu">Education Details</option>
                                                <option value="occu">Occupation Details</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-12 mb-3">
                                            <h5 class="font-size-14 mb-2">Search Criteria:</h5>
                                            <input name="searchvalue" class="form-control" type="search" value=""
                                                id="searchvalue" placeholder="" required>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-12 mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="font-size-14 mb-2">Data Type:</h5>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="check-paid"
                                                            name="dtype[]" value="P">
                                                        <label class="form-check-label" for="check-paid">
                                                            Paid
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="chk-NP"
                                                            name="dtype[]" value="N">
                                                        <label class="form-check-label" for="chk-NP">
                                                            Non Paid
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="chkNA"
                                                            name="dtype[]" value="A">
                                                        <label class="form-check-label" for="chkNA">
                                                            NA
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <h5 class="font-size-14 mb-2">Data Status:</h5>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="checkbox" id="dts_fix"
                                                            value="F" name="chkstatus[]">
                                                        <label class="form-check-label" for="dts_fix">
                                                            Fixed
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="chkStatNA"
                                                            value="A" name="chkstatus[]">
                                                        <label class="form-check-label" for="chkStatNA">
                                                            NA
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-12 mb-3">
                                            <button type="submit"
                                                class="btn btn-success w-lg waves-effect waves-light">Search</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>



                            </div>

                            <div class="col-7">
                                <!-- card -->
                                <div class="card">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-center mb-4">
                                            <h5 class="card-title-desc">Results</h5>
                                        </div>

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns"
                                                style="height: 200px; overflow-y: auto;">
                                                <table id="table_search" class="table table-bordered">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th data-priority="1" width="35%">Ref No.</th>
                                                            <th data-priority="2" width="65%">Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="d-flex flex-wrap align-items-center mb-3">
                                <h5 class="card-title-desc2">Recent Activities</h5>
                            </div>
                            <div class="">
                                <div>
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th data-priority="1">Date</th>
                                                        <th data-priority="2">Time</th>
                                                        <th data-priority="3">Criteria</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10/8/25</td>
                                                        <td>12:12PM</td>
                                                        <td>Dhawal</td>
                                                    </tr>
                                                    <tr>
                                                        <td>9/8/25</td>
                                                        <td>12:22PM</td>
                                                        <td>1988</td>
                                                    </tr>
                                                    <tr>
                                                        <td>8/8/25</td>
                                                        <td>12:23PM</td>
                                                        <td>110786</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div><!-- end card -->
            </div><!-- end col -->
        </div>

    </div>
    <!-- end row-->


    @include('components.biodata_modal')



    </div> <!-- container-fluid -->
@endsection

@section('footer-script')
    <script>
        const form = document.getElementById("frmSearchMember");


        // fetch data from Laravel
        function fetchData() {
            const formData = new FormData(form);
            let searchInput = document.getElementById("searchvalue");
            if (searchInput.value.trim() == "") {
                return false;
            }

            const options = {
                headers: {
                    'Accept': 'application/json'
                },
                method: 'POST',
                body: formData
            };


            fetch(`{{ route('search-data') }}`, options)
                .then(res => res.json())
                .then(data => {
                    document.getElementById("table_search").querySelector("tbody").innerHTML = data.data
                        .map(item =>`<tr><td width="35%"><a href="#" data-bs-toggle="modal" data-bs-target="#Modal_biodata" class="biodata_modal" data-rno=${item.rno} >${item.rno}</a></td><td width="65%">${item.refname}</td></tr>`)
                        .join("");
                });
        }

        // debounced version (for text inputs)
        const debouncedFetch = debounce(fetchData, 300);

        // input handles keyboard typing
        form.addEventListener("input", (e) => {
            if (e.target.type === "text" || e.target.type === "search") {
                debouncedFetch();
            }
        });

        // change handles checkbox/select instantly
        form.addEventListener("change", fetchData);
    </script>
    <script>
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



                    console.log(item);
                    $("#Modal_biodata #rno").text(item.rno);
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
                        html +=  `
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
                    $("#Modal_biodata #occupation").text(item.occupation.name);
                    $("#Modal_biodata #income").text(item.income.income);
                    $("#Modal_biodata #salary").text(item.personal.salary);

                    let companyhtml = "";
                    item.organisation.forEach(org => {
                        companyhtml += `<tr>
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

@endsection
