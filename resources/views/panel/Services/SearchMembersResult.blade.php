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
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Ref No.</th>
                                                    <th data-priority="2" width="">Gender.</th>
                                                    <th data-priority="3" width="">Name</th>
                                                    <th data-priority="4" width="">Born</th>
                                                    <th data-priority="5" width="">Age</th>
                                                    <th data-priority="6" width="">Ms</th>
                                                    <th data-priority="7" width="">Caste</th>
                                                    <th data-priority="8" width="">Height</th>
                                                    <th data-priority="9" width="">Ast</th>
                                                    <th data-priority="10" width="">Ed</th>
                                                    <th data-priority="11" width="">CB</th>
                                                    <th data-priority="12" width="">Family Income</th>
                                                    <th data-priority="13" width="">Location</th>
                                                    <th data-priority="14" width="">Occupation</th>
                                                    <th data-priority="15" width="">Rs</th>
                                                    <th data-priority="16" width="">TC</th>
                                                    <th data-priority="17" width="">RM</th>
                                                    <th data-priority="18" width="">L_CALL</th>
                                                    <th data-priority="19" width="">L_Mail</th>
                                                    <th data-priority="20" width="">L_Mtng</th>
                                                    <th data-priority="21" width="">R_Date</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($results as $data)
                                                    <tr>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $data->rno }}">{{ $data->rno }}</a></td>
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
                                                        <td>{{ '--' }}</td>
                                                        <td>{{ $data?->income?->income }}</td>
                                                        <td>{{ $data->personal->arealocation }}</td>
                                                        <td>{{ $data->occupation?->name }}</td>
                                                        <td>{{ rsValue($data->rs) }}</td>
                                                        <td>{{ $data->tc }}</td>
                                                        <td>{{ $data->rm }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_call)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mail)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mtng)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->profiledate)->format('M d Y') }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>

                                        @include('components.biodata_modal')

                                    <!-- Modal -->
                                    {{-- <div class="modal fade" id="SerialNumber" tabindex="-1" role="dialog"
                                        aria-labelledby="SerialNumberTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content biodata-popup-h">
                                                <div class="modal-header">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h5 class="modal-title font-size-16" id="SerialNumberTitle">
                                                                BIO
                                                                Data</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row d-sm-none1">
                                                        <div class="col-12">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                <a href="#personal-details">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary">Personal</button>
                                                                </a>
                                                                <a href="#education">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary">Edu</button>
                                                                </a>
                                                                <a href="#occupation">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary">Occu</button>
                                                                </a>
                                                                <a href="#other-details">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary">Other</button>
                                                                </a>
                                                                <a href="#family-details">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary">Family</button>
                                                                </a>
                                                                <a href="#person-details">
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary">Contact</button>
                                                                </a>
                                                                <button type="button" class="btn btn-outline-primary">PDF
                                                                    <i data-feather="download"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--                                                            <h5 class="modal-title font-size-16" id="SerialNumberTitle">BIO Data</h5>-->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-rep-plugin">
                                                        <div class="table-responsive mb-0"
                                                            data-pattern="priority-columns">
                                                            <table id="tech-companies-1"
                                                                class="table table-bordered bio_data">
                                                                <thead class="table-primary">
                                                                    <tr>
                                                                        <th colspan="6" class="font-size-18"
                                                                            id="personal-details">Personal Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="12%"><strong>Gender:</strong></td>
                                                                        <td width="21%">...</td>
                                                                        <td width="12%"><strong>Name:</strong></td>
                                                                        <td width="21%">...</td>
                                                                        <td width="12%"><strong>DOB:</strong></td>
                                                                        <td width="21%">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Age:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Time of Birth:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Birth Place:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Height (Cms):</strong></td>
                                                                        <td>... (Fit) ...</td>
                                                                        <td><strong>Weight:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Religion:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Caste & Subcaste:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Other Caste:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Gotra:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Complexion:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Color of Eye:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Color of Hair:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Blood Group:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Astro Status:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Drinking:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Smoking:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Eating:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Spectacles:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Disease / Disability:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Hobbies:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Characteristics:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                </tbody>

                                                                <thead class="table-primary">
                                                                    <tr>
                                                                        <th colspan="6" id="education"
                                                                            class="font-size-18">Education</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Education:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Name of Course:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Institution:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                        <td><strong>Year:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                </tbody>

                                                                <thead class="table-primary">
                                                                    <tr>
                                                                        <th colspan="6" id="occupation"
                                                                            class="font-size-18">Occupation</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Occupation:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Income (P.A.):</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Salary (P.A.):</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Company Name:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Designation:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Working Year:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                </tbody>

                                                                <thead class="table-primary">
                                                                    <tr>
                                                                        <th colspan="6" id="other-details"
                                                                            class="font-size-18">Other Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Residential:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Residing Country:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Visa:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Nationality:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Residing City:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Marital:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>No. of Children:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Marriage Info:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Child Info:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                </tbody>

                                                                <thead class="table-primary">
                                                                    <tr>
                                                                        <th colspan="6" id="family-details"
                                                                            class="font-size-18">Family Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Name of Brother / Sister:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>B/S:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Age:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Ms-St:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Personal Details:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Family Type:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Family Status:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Father's Name:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Father's Details:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Mother's Name:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Mother's Details:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Family History:</strong></td>
                                                                        <td colspan="5">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Extra Info (Personal):</strong></td>
                                                                        <td colspan="5">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Family Income (P.A):</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Family Native:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Budget:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                </tbody>

                                                                <thead class="table-primary">
                                                                    <tr>
                                                                        <th colspan="6" class="font-size-18"
                                                                            id="person-details">Person Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Contact Person:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Address:</strong></td>
                                                                        <td colspan="3">...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Location:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>City:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Pin Code:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>State:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Country:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Phone No:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Email ID:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Relation:</strong></td>
                                                                        <td>...</td>
                                                                        <td><strong>Zone:</strong></td>
                                                                        <td>...</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <!--<div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>-->
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- end modal -->

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
