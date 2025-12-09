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
                            <form id="frmupdatepref" method="POST"
                                action="{{ route('save-match-prefrences', ['rno' => $rno]) }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Reference No</label>
                                        <label class="form-control">{{ $rno . '-' . $bio->refname }}</label>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="example-text-input" class="form-label">Age From</label>
                                        <select name="agefrom" class="form-select">
                                            @foreach (range(18, 70) as $item)
                                                <option value="{{ $item }}"
                                                    {{ $matchPrefrences->agefrom == $item ? 'selected' : '' }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="example-text-input" class="form-label">Age Up To</label>
                                        <select name="ageupto" class="form-select">
                                            @foreach (range(18, 70) as $item)
                                                <option value="{{ $item }}"
                                                    {{ $matchPrefrences->ageupto == $item ? 'selected' : '' }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Child Pref.</label>
                                        <select name="childpref" id="childpref" class="form-select">
                                            <option value="1" {{ $matchPrefrences->childpref == 1 ? 'selected' : '' }}>
                                                With Child</option>
                                            <option value="0" {{ $matchPrefrences->childpref == 0 ? 'selected' : '' }}>
                                                Without Child</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="example-text-input" class="form-label">Height From</label>
                                        <select name="hghtfrom" class="form-select">
                                            {{ \App\Traits\CommonTrait::loadheightdata($matchPrefrences->hghtfrom) }}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-1">
                                        <label for="example-text-input" class="form-label">Height Up To</label>
                                        <select name="hghtto" class="form-select">
                                            {{ \App\Traits\CommonTrait::loadheightdata($matchPrefrences->hghtto) }}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Min. Income Pref.</label>
                                        <select name="incomepref" id="incomepref" class="form-select">
                                            @foreach ($incomes as $item)
                                                <option value="{{ $item->inc_code }}"
                                                    {{ $item->inc_code == $matchPrefrences->incomepref ? 'selected' : '' }}>
                                                    {{ $item->income }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Religion</label>
                                        <select multiple name="religion[]" id="religion" class="form-select select2">
                                            <option>Select</option>
                                            <option value="1"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 1) }}>
                                                Hindu</option>
                                            <option value="2"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 2) }}>
                                                Sikh</option>
                                            <option value="3"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 3) }}>
                                                Jain</option>
                                            <option value="4"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 4) }}>
                                                Christian</option>
                                            <option value="5"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->religion, 5) }}>
                                                Muslim</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Caste</label>
                                        <select name="caste[]" id="caste" multiple class="form-select select2"
                                            data-value="{{ $matchPrefrences->caste }}">
                                        </select>
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Min. Education</label>
                                        <select name="education" id="education" class="form-select">
                                            <option value="1" {{ $matchPrefrences->education == 1 ? 'selected' : '' }}>
                                                Matriculate</option>
                                            <option value="2" {{ $matchPrefrences->education == 2 ? 'selected' : '' }}>
                                                Under Graduate</option>
                                            <option value="3" {{ $matchPrefrences->education == 3 ? 'selected' : '' }}>
                                                Graduate</option>
                                            <option value="6" {{ $matchPrefrences->education == 6 ? 'selected' : '' }}>
                                                Double Graduate</option>
                                            <option value="4" {{ $matchPrefrences->education == 4 ? 'selected' : '' }}>
                                                Post Graduate</option>
                                            <option value="5" {{ $matchPrefrences->education == 5 ? 'selected' : '' }}>
                                                Doctorate</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Education Pref.</label>
                                        <select name="edupref[]" multiple class="form-select select2">
                                            @foreach ($eduprefs as $item)
                                                <option value="{{ $item->sno }}"
                                                    {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->edupref, $item->sno) }}>
                                                    {{ $item->education }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Occupation Pref.</label>
                                        <select name="occupref[]" multiple class="form-select select2">
                                            @foreach ($occupations as $item)
                                                <option value="{{ $item->occ_code }}"
                                                    {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->occupref, $item->occ_code) }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Astro Status</label>
                                        <select name="astropref[]" multiple class="form-select select2">
                                            <option value="1"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 1) }}>
                                                Manglik</option>
                                            <option value="2"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 2) }}>
                                                Slightly Manglik</option>
                                            <option value="3"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 3) }}>
                                                Non Manglik</option>
                                            <option value="4"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 4) }}>
                                                Don't Believe</option>
                                            <option value="5"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->astropref, 5) }}>
                                                Don't Know</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Eating Pref.</label>
                                        <select name="eatingpref[]" multiple class="form-select select2">
                                            <option value="1"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 1) }}>
                                                Vegetarian</option>
                                            <option value="2"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 2) }}>
                                                Eggetarian</option>
                                            <option value="3"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 3) }}>
                                                Non Vegetarian</option>
                                            <option value="4"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 4) }}>
                                                Don't Know</option>
                                            <option value="5"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->eatingpref, 5) }}>
                                                Occasionally Non Vegetarian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Mail Reminder</label>
                                        <select name="mr[]" multiple class="form-select select2">
                                            <option value="1"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 1) }}>Monday
                                            </option>
                                            <option value="2"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 2) }}>Tuesday
                                            </option>
                                            <option value="3"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 3) }}>
                                                Wednesday</option>
                                            <option value="4"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 4) }}>
                                                Thursday</option>
                                            <option value="5"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 5) }}>Friday
                                            </option>
                                            <option value="6"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 6) }}>
                                                Saturday</option>
                                            <option value="7"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mr, 7) }}>Sunday
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Residential Pref.</label>
                                        <select name="rspref[]" multiple class="form-select select2">
                                            <option value="1"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->rspref, 1) }}>
                                                Indian Citizen</option>
                                            <option value="2"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->rspref, 2) }}>
                                                Temp. Residing Abroad</option>
                                            <option value="3"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->rspref, 3) }}>Non
                                                Resident Indian</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Marital Pref.</label>
                                        <select name="mspref[]" multiple class="form-select select2">
                                            <option value="1"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 1) }}>
                                                Never Married</option>
                                            <option value="2"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 2) }}>
                                                Divorced</option>
                                            <option value="3"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 3) }}>
                                                Widow</option>
                                            <option value="4"
                                                {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->mspref, 4) }}>
                                                Separated</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="example-text-input" class="form-label">Zone</label>
                                        <label class="form-label">Select</label>
                                        <select name="zonepref[]" multiple class="form-select select2">
                                            @foreach ($zones as $item)
                                                <option value="{{ $item->zone_code }}"
                                                    {{ \App\Traits\CommonTrait::chkSelected($matchPrefrences->zonepref, $item->zone_code) }}>
                                                    {{ $item->zone_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-md-12 col-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Update
                                        Match</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>


            {{-- <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Find Match Results</h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>

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

                            <hr>

                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Refrence ID</th>
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
                                                    <td><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#SerialNumber">11023488</a></td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                    <td>...</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="SerialNumber" tabindex="-1" role="dialog"
                                        aria-labelledby="SerialNumberTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content biodata-popup-h">
                                                <div class="modal-header">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h5 class="modal-title font-size-16" id="SerialNumberTitle">
                                                                BIO Data</h5>
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
                                    </div>
                                    <!-- end modal -->

                                </div>
                            </div>
                            <div class="clearfix"></div>


                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div> --}}



        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection
@section('footer-script')

    <script>
        function setcastes(religionCodes) {
            console.log("religionCodes", religionCodes);
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
                    console.log(selectedIds);

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

        $(function() {
            $('.select2').select2({
                tags: true,
                placeholder: "Select or type to add",
                allowClear: true,
            });

            $("#religion").change(function() {
                let religionCodes = $(this).val();
                setcastes(religionCodes);
            });


            let religionCodes = $("#religion").val();
            setcastes(religionCodes);
        })
    </script>
@endsection
