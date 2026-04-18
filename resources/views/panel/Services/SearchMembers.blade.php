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
                                <form id="frmSearchMember" method="GET" action="{{ route('search-data') }}">
                                    <div class="row mb-6">
                                        <div class="col-12 mb-3">
                                            <h5 class="font-size-14 mb-2">Select Field:</h5>
                                            <select name="searchinfield" class="form-select">
                                                <option value="rno">Ref No.</option>
                                                <option value="refname">Name</option>
                                                <option value="dob">Date of Birth</option>
                                                <option value="birthyear">Birth Year</option>
                                                <option value="cst">Caste</option>
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
                                                <option value="tl">Team Leader</option>
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
                                                        <th data-priority="4">Search By</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($searchLogs as $item)
                                                        <tr>
                                                            <td>{{ \App\Traits\CommonTrait::convertCommonDate($item->created_at) }}
                                                            </td>
                                                            <td>{{ \App\Traits\CommonTrait::convertCommonDate($item->created_at, 'h:m A') }}
                                                            </td>
                                                            <td>{{ $item->inputs['searchinfield'] . ' : ' . $item->inputs['searchvalue'] }}
                                                            </td>
                                                            <td>{{ $item->employee?->name }}</td>
                                                        </tr>
                                                    @endforeach
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

            // Convert FormData to URLSearchParams for GET query string
            const params = new URLSearchParams();
            for (const [key, value] of formData.entries()) {
                params.append(key, value);
            }

            const options = {
                headers: {
                    'Accept': 'application/json'
                },
                method: 'GET'
            };


            fetch(`{{ route('search-data') }}?${params.toString()}`, options)
                .then(res => res.json())
                .then(data => {
                    document.getElementById("table_search").querySelector("tbody").innerHTML = data.data
                        .map(item => `<tr><td width="35%"><a href="#" data-bs-toggle="modal" data-bs-target="#Modal_biodata" class="biodata_modal" data-rno=${item.rno} >${item.rno}</a></td><td width="65%">${item.refname}</td></tr>`)
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


@endsection