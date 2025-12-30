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
                                    <h4 class="mb-sm-0 font-size-18">Update Match Prefrence</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Find Match</a></li>
                                            <li class="breadcrumb-item active">Update Match Prefrence</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <form id="frmFindMatch" method="GET" action="{{ route('panel.search-match') }}">
                                {{-- @csrf --}}
                                <div class="row">
                                    <div class="mb-3 col-2">
                                        <label for="selrno" class="form-label">Reference No</label>
                                        <select id="selrno" name="selrno" class="form-select"></select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="agefrom" class="form-label">Age From</label>
                                        <select id="agefrom" name="agefrom" class="form-select">
                                            @foreach (range(18, 70) as $item)
                                                <option value="{{ $item }}" {{ $matchPrefrences->agefrom == $item ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="ageupto" class="form-label">Age Up To</label>
                                        <select id="ageupto" name="ageupto" class="form-select">
                                            @foreach (range(18, 70) as $item)
                                                <option value="{{ $item }}" {{ $matchPrefrences->ageupto == $item ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="childpref" class="form-label">Child Pref.</label>
                                        <select name="childpref" id="childpref" class="form-select">
                                            <option value="1" {{ $matchPrefrences->childpref == 1 ? 'selected' : '' }}>
                                                With
                                                Child</option>
                                            <option value="0" {{ $matchPrefrences->childpref == 0 ? 'selected' : '' }}>
                                                Without
                                                Child</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="hghtfrom" class="form-label">Height From</label>
                                        <select name="hghtfrom" id="hghtfrom" class="form-select">
                                            {{ \App\Traits\CommonTrait::loadheightdata($matchPrefrences->hghtfrom) }}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="hghtto" class="form-label">Height Up To</label>
                                        <select name="hghtto" id="hghtto" class="form-select">
                                            {{ \App\Traits\CommonTrait::loadheightdata($matchPrefrences->hghtto) }}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="incomepref" class="form-label">Min. Income Pref.</label>
                                        <select name="incomepref" id="incomepref" class="form-select">
                                            @foreach ($incomes as $item)
                                                <option value="{{ $item->inc_code }}" {{ $item->inc_code == $matchPrefrences->incomepref ? 'selected' : '' }}>
                                                    {{ $item->income }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="religion" class="form-label">Religion</label>
                                        <select multiple name="religion[]" id="religion" class="form-select select2-notag">
                                            <option>Select</option>
                                            <option value="1" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 1) }}>
                                                Hindu
                                            </option>
                                            <option value="2" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 2) }}>
                                                Sikh
                                            </option>
                                            <option value="3" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 3) }}>
                                                Jain
                                            </option>
                                            <option value="4" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 4) }}>
                                                Christian</option>
                                            <option value="5" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 5) }}>
                                                Muslim</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="mb-3 col-2">
                                        <label for="caste" class="form-label">Caste</label>
                                        <select name="caste[]" id="caste" multiple class="form-select select2-notag"
                                            data-value="{{ $matchPrefrences->caste }}">
                                        </select>
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label for="education" class="form-label">Min. Education</label>
                                        <select name="education" id="education" class="form-select">
                                            <option value="1" {{ $matchPrefrences->education == 1 ? 'selected' : '' }}>
                                                Matriculate</option>
                                            <option value="2" {{ $matchPrefrences->education == 2 ? 'selected' : '' }}>
                                                Under
                                                Graduate</option>
                                            <option value="3" {{ $matchPrefrences->education == 3 ? 'selected' : '' }}>
                                                Graduate</option>
                                            <option value="6" {{ $matchPrefrences->education == 6 ? 'selected' : '' }}>
                                                Double
                                                Graduate</option>
                                            <option value="4" {{ $matchPrefrences->education == 4 ? 'selected' : '' }}>
                                                Post
                                                Graduate</option>
                                            <option value="5" {{ $matchPrefrences->education == 5 ? 'selected' : '' }}>
                                                Doctorate</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="edupref" class="form-label">Education Pref.</label>
                                        <select id="edupref" name="edupref[]" multiple class="form-select select2-notag">
                                            @foreach ($eduprefs as $item)
                                                <option value="{{ $item->sno }}" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->edupref, $item->sno) }}>{{ $item->education }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label for="occupref" class="form-label">Occupation Pref.</label>
                                        <select id="occupref" name="occupref[]" multiple class="form-select select2-notag">
                                            @foreach ($occupations as $item)
                                                <option value="{{ $item->occ_code }}" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->occupref, $item->occ_code) }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="astropref" class="form-label">Astro Status</label>
                                        <select id="astropref" name="astropref[]" multiple
                                            class="form-select select2-notag">
                                            <option value="1" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 1) }}>
                                                Manglik</option>
                                            <option value="2" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 2) }}>
                                                Slightly Manglik</option>
                                            <option value="3" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 3) }}>
                                                Non
                                                Manglik</option>
                                            <option value="4" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 4) }}>
                                                Don't Believe</option>
                                            <option value="5" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 5) }}>
                                                Don't Know</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="eatingpref" class="form-label">Eating Pref.</label>
                                        <select id="eatingpref" name="eatingpref[]" multiple
                                            class="form-select select2-notag">
                                            <option value="1" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 1) }}>
                                                Vegetarian</option>
                                            <option value="2" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 2) }}>
                                                Eggetarian</option>
                                            <option value="3" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 3) }}>Non
                                                Vegetarian</option>
                                            <option value="4" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 4) }}>
                                                Don't Know</option>
                                            <option value="5" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 5) }}>
                                                Occasionally Non Vegetarian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="mb-3 col-2">
                                        <label for="mr" class="form-label">Mail Reminder</label>
                                        <select id="mr" name="mr[]" multiple class="form-select select2-notag">
                                            <option value="1" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 1) }}>Monday
                                            </option>
                                            <option value="2" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 2) }}>Tuesday
                                            </option>
                                            <option value="3" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 3) }}>Wednesday</option>
                                            <option value="4" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 4) }}>Thursday</option>
                                            <option value="5" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 5) }}>Friday</option>
                                            <option value="6" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 6) }}>Saturday</option>
                                            <option value="7" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 7) }}>Sunday</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="rspref" class="form-label">Residential Pref.</label>
                                        <select id="rspref" name="rspref[]" multiple class="form-select select2-notag">
                                            <option value="1" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->rspref, 1) }}>
                                                Indian
                                                Citizen</option>
                                            <option value="2" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->rspref, 2) }}>
                                                Temp.
                                                Residing Abroad</option>
                                            <option value="3" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->rspref, 3) }}>Non
                                                Resident Indian</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="mspref" class="form-label">Marital Pref.</label>
                                        <select id="mspref" name="mspref[]" multiple class="form-select select2-notag">
                                            <option value="1" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 1) }}>
                                                Never
                                                Married</option>
                                            <option value="2" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 2) }}>
                                                Divorced</option>
                                            <option value="3" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 3) }}>
                                                Widow
                                            </option>
                                            <option value="4" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 4) }}>
                                                Separated</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="zonepref" class="form-label">Zone</label>
                                        <label class="form-label">Select</label>
                                        <select id="zonepref" name="zonepref[]" multiple class="form-select select2-notag">
                                            @foreach ($zones as $item)
                                                <option value="{{ $item->zone_code }}" {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->zonepref, $item->zone_code) }}>{{ $item->zone_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" name="gender" id="gender">
                                <input type="hidden" name="rno" id="rno" value="{{ $rno }}">
                                <div class="col-md-12 col-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Search
                                        Match</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>
            <div class="modal-section">
                @include('components.biodata_modal')

            </div>

            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Search Match Results</h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>



                            <div class="col-md-8 col-12">
                                <span class="d-none">
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
                                </span>
                            </div>
                            <div class="col-md-2 col-12">
                                <span class="d-none">
                                    <form class="app-search  d-lg-block pt-0 pb-0">
                                        <div class="position-relative">
                                            <input type="search" class="form-control bg-black opacity-50"
                                                placeholder="Search...">
                                            <button class="btn btn-primary" type="button"><i
                                                    class="bx bx-search-alt align-middle"></i></button>
                                        </div>
                                    </form>
                                </span>
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record - <span
                                            id="totalRecord">0</span></button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>

                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="findMatchTable" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">RNO</th>
                                                    <th data-priority="2" width="">Gender</th>
                                                    <th data-priority="3" width="">Name</th>
                                                    <th data-priority="4" width="">Born</th>
                                                    <th data-priority="5" width="">Age</th>
                                                    <th data-priority="6" width="">Ms</th>
                                                    <th data-priority="7" width="">Caste</th>
                                                    <th data-priority="8" width="">Hght</th>
                                                    <th data-priority="9" width="">Ast</th>
                                                    <th data-priority="10" width="">Ed</th>
                                                    <th data-priority="11" width="">CB</th>
                                                    <th data-priority="12" width="">Family Income</th>
                                                    <th data-priority="13" width="">Location</th>
                                                    <th data-priority="14" width="">Occupation</th>
                                                    <th data-priority="15" width="">Rs</th>
                                                    <th data-priority="16" width="">TC</th>
                                                    <th data-priority="17" width="">TL</th>
                                                    <th data-priority="18" width="">RM</th>
                                                    <th data-priority="19" width="">L_Call</th>
                                                    <th data-priority="20" width="">L_Mail</th>
                                                    <th data-priority="21" width="">L_Mtng</th>
                                                    <th data-priority="22" width="">R_Date</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                <tr>
                                                    <td colspan="22" class="text-center">No matches found</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-12 mt-3" id="pagination-links">
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

    <script>
        function setcastes(religionCodes) {
            // If no selection, set empty
            if (!religionCodes) religionCodes = [];
            // Build query string for array
            let query = religionCodes.map(code => 'religion[]=' + encodeURIComponent(code)).join('&');
            let url = "/dashboard/fetch-castes"; // just the base route
            if (query) {
                url += '?' + query;
            }

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    const select = document.getElementById('caste');
                    select.innerHTML = '';
                    const selectedIds = $("#caste").data('value').split(' ').map(Number);

                    data.data.forEach(element => {
                        const option = document.createElement('option');
                        option.value = element.id;
                        option.textContent = element.name;
                        if (selectedIds.includes(Number(element.id))) {
                            option.selected = true;
                        }
                        select.appendChild(option);
                    });
                })
                .catch(err => console.error(err));
        }

        $(function () {
            $("#religion").change(function () {
                let religionCodes = $(this).val();
                setcastes(religionCodes);
            });

            let rno = "{{ $rno }}";
            let picklistUrl = "{{ route('customer.picklistbiodata') }}";
            if (rno > 0) {
                picklistUrl = picklistUrl + '?rno=' + rno;
            }

            $("#selrno").select2({
                placeholder: 'Search rno or name.',
                minimumInputLength: 4,
                ajax: {
                    url: picklistUrl,
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
            })
                .on('select2:select', function (e) {
                    let selectedData = e.params.data;
                    $('input[name="rno"]').val(selectedData.id);
                    $('input[name="gender"]').val(selectedData.gender);
                });

            if (rno > 0) {
                $.ajax({
                    type: 'GET',
                    url: picklistUrl
                }).then(function (data) {
                    if (data.results && data.results.length > 0) {
                        var item = data.results[0];
                        // create the option and append to Select2
                        var option = new Option(item.text, item.id, true, true);
                        $("#selrno").append(option).trigger('change');

                        // manually trigger the `select2:select` event
                        $("#selrno").trigger({
                            type: 'select2:select',
                            params: {
                                data: item
                            }
                        });

                        $("#selrno").prop("disabled", true);
                        $('input[name="gender"]').val(item.gender);
                    }
                });

                let religionCodes = $("#religion").val();
                setcastes(religionCodes);
            }

            $("#frmFindMatch").validate({
                rules: {
                    selrno: {
                        required: true
                    },
                    agefrom: {
                        required: true
                    },
                    ageupto: {
                        required: true
                        // greaterThan: "agefrom"
                    },
                    // childpref: {
                    //     required: true
                    // },
                    // hghtfrom: {
                    //     required: true
                    // },
                    // hghtto: {
                    //     required: true
                    // },
                    // incomepref: {
                    //     required: true
                    // },
                    // religion: {
                    //     required: true
                    // },
                    // caste: {
                    //     required: true
                    // },
                    // zonepref: {
                    //     required: true
                    // },
                    // eatingpref: {
                    //     required: true
                    // },
                    // astropref: {
                    //     required: true
                    // },
                    // rspref: {
                    //     required: true
                    // },
                    // mr: {
                    //     required: true
                    // }
                },
                messages: {
                    "selrno": {
                        required: "Please select a reference no."
                    },
                    "agefrom": {
                        required: "Please enter age from."
                    },
                    "ageupto": {
                        required: "Please enter age upto."
                    },
                    "childpref": {
                        required: "Please select child preference."
                    },
                    "hghtfrom": {
                        required: "Please enter height from."
                    },
                    "hghtto": {
                        required: "Please enter height upto."
                    },
                    "incomepref": {
                        required: "Please select income preference."
                    },
                    "religion": {
                        required: "Please select religion."
                    },
                    "caste": {
                        required: "Please select caste."
                    },
                    "zonepref": {
                        required: "Please select zone preference."
                    },
                    "eatingpref": {
                        required: "Please select eating preference."
                    },
                    "astropref": {
                        required: "Please select astro preference."
                    },
                    "rspref": {
                        required: "Please select relationship preference."
                    }
                },
                submitHandler: function (form) {
                    // Reset page to 1 on new search
                    fetchMatchResults(form.action, new FormData(form));
                }
            });

            function fetchMatchResults(url, formData) {
                const urlObj = new URL(url);

                // Append form data as query parameters
                for (const [key, value] of formData.entries()) {
                    urlObj.searchParams.append(key, value);
                }

                const options = {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    method: 'GET',
                }
                const tbody = document.querySelector('#findMatchTable tbody');
                tbody.innerHTML = 'loading....';

                fetch(urlObj.toString(), options)
                    .then(response => response.json())
                    .then(data => {
                        console.log("data", data);
                        if (data.status == 'success') {
                            $("#totalRecord").text(data.data.total);
                            renderTable(data.data.data);
                            renderPagination(data.data, formData);
                        } else {
                            toastr.error(data.message || 'Something went wrong');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('An error occurred');
                    });
            }

            function renderTable(items) {
                const tbody = document.querySelector('#findMatchTable tbody');
                tbody.innerHTML = '';

                if (!items || items.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="22" class="text-center">No matches found</td></tr>';
                    return;
                }

                items.forEach(item => {
                    const tr = document.createElement('tr');

                    // Helper to safely get nested properties
                    const getVal = (obj, path, defaultVal = '-') => {
                        return path.split('.').reduce((acc, part) => acc && acc[part], obj) || defaultVal;
                    };

                    // Formatting helpers
                    const formatDate = (dateStr) => {
                        if (!dateStr) return '-';
                        return new Date(dateStr).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
                    }

                    // Mapping based on typical field names. 
                    // Adjust these based on actual API response structure if needed.
                    // Assumed structure based on MatchService:
                    // item is ViewProfile instance with potential relations loaded

                    tr.innerHTML = `
                                                            <td><a href="#" class="biodata_modal" data-bs-toggle="modal" data-bs-target="#Modal_biodata" data-rno=${item.rno}>${item.rno}</a></td>
                                                            <td>${item.g == 'M' ? 'Male' : (item.g == 'F' ? 'Female' : item.g)}</td>
                                                            <td>${item.refname || '-'}</td>
                                                            <td>${formatDate(item.bio ? item.bio.dob : item.dob)}</td> 
                                                            <td>${item.y || '-'}</td>
                                                            <td>${getVal(item, 'ms')}</td> <!-- Marital Status -->
                                                            <td>${getVal(item, 'bio.caste') || getVal(item, 'cst') || '-'}</td>
                                                            <td>${getVal(item, 'hg') || '-'}</td>
                                                            <td>${getVal(item, 'ast') || '-'}</td>
                                                            <td>${getVal(item, 'ed') || '-'}</td>
                                                            <td>-</td> <!-- CB (Created By?) -->
                                                            <td>${getVal(item, 'income.income') || getVal(item, 'fi') || '-'}</td>
                                                            <td>${getVal(item, 'personal.city') || getVal(item, 'personal.zone.zone_name') || '-'}</td>
                                                            <td>${getVal(item, 'occupation.name') || getVal(item, 'oc') || '-'}</td>
                                                            <td>${getVal(item, 'rs') || '-'}</td>
                                                            <td>${getVal(item, 'tc') || '-'}</td>
                                                            <td>${getVal(item, 'rm') || '-'}</td> <!-- TL mapped to rm -->
                                                            <td>-</td> <!-- RM -->
                                                            <td>${formatDate(item.last_call)}</td>
                                                            <td>${formatDate(item.last_mail)}</td>
                                                            <td>${formatDate(item.last_mtng)}</td>
                                                            <td>${formatDate(item.created_at)}</td>
                                                        `;
                    tbody.appendChild(tr);
                });
            }

            function renderPagination(paginator, originalFormData) {
                const container = document.getElementById('pagination-links');
                container.innerHTML = '';

                if (!paginator.links || paginator.links.length <= 3) return; // Hide if single page (prev, 1, next)

                const nav = document.createElement('nav');
                const ul = document.createElement('ul');
                ul.className = 'pagination';

                paginator.links.forEach((link, index) => {
                    // Laravel paginator links: { url: '...', label: '...', active: true/false }
                    const li = document.createElement('li');
                    li.className = `page-item ${link.active ? 'active' : ''} ${!link.url ? 'disabled' : ''}`;

                    const a = document.createElement('a');
                    a.className = 'page-link';
                    a.innerHTML = link.label;
                    a.href = 'javascript:void(0);';

                    if (link.url) {
                        a.onclick = function () {
                            // Extract page number or just use the full url if we can handle it
                            // Since we need to POST filters, we can't just GET the link.url.
                            // We need to parse the page number from the URL
                            try {
                                const urlObj = new URL(link.url);
                                const page = urlObj.searchParams.get('page');

                                // Re-run the fetch with the new page
                                // We need to construct the URL with page param for the endpoint to pick it up?
                                // Or append to formData? 
                                // Laravel's paginate() looks at ?page= query param by default.
                                const actionUrl = new URL(document.getElementById('frmFindMatch').action);
                                actionUrl.searchParams.set('page', page);

                                fetchMatchResults(actionUrl.toString(), originalFormData);
                            } catch (e) {
                                console.error("Invalid URL in pagination", link.url);
                            }
                        };
                    }

                    li.appendChild(a);
                    ul.appendChild(li);
                });

                nav.appendChild(ul);
                container.appendChild(nav);
            }

        });

    </script>
@endsection