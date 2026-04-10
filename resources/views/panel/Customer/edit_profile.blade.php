@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">
        <style>
            .select2 {
                width: 100% !important
            }
        </style>
        <div class="row">





            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-size-22">User Information</h2>
                    </div><!-- end card header -->


                    <div class="card-header bg-secondary">
                        <form>
                            <div class="row mb-1 pt-2">
                                <div class="col-12 col-md-2 mb-2">
                                    <!--<label for="" class="form-label">First Name</label>-->
                                    <input class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="col-12 col-md-2 mb-2">
                                    <input class="form-control" type="date" placeholder="Enter DOB name">
                                </div>
                                <div class="col-12 col-md-2 mb-2">
                                    <input class="form-control" type="text" placeholder="Enter email">
                                </div>
                                <div class="col-12 col-md-2 mb-2">
                                    <input class="form-control" type="number" placeholder="Enter phone no">
                                </div>
                                <div class="col-12 col-md-4 mb-2">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Search Duplicate
                                        Data</button>
                                </div>
                        </form>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <form id="frmUpdateCustomerData" method="POST"
                        action="{{ route('customer.update', ['customer' => $customer->rno]) }}">
                        @method('PUT')

                        @csrf
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-user"></i></span>
                                    <span class="d-none d-sm-block">My Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#ducation" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-book-reader"></i></span>
                                    <span class="d-none d-sm-block">Education</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#occupation" role="tab">
                                    <span class="d-block d-sm-none"><i class=" fas fa-building"></i></span>
                                    <span class="d-none d-sm-block">Occupation</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#other-details" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-search-plus"></i></span>
                                    <span class="d-none d-sm-block">Other Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#family-details" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-people-arrows"></i></span>
                                    <span class="d-none d-sm-block">Family Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#person-details" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-user-tie"></i></span>
                                    <span class="d-none d-sm-block">Person Details</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Gender:</label>
                                            <select name="gender" class="form-select">
                                                <option disabled>Select</option>
                                                <option value="M" {{ $customer->bio->gender == 'M' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="F" {{ $customer->bio->gender == 'F' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">Name:</label>
                                            @if($can_edit_critical_profile)
                                                <input class="form-control" type="text" name="refname"
                                                    value="{{ $customer->bio->refname }}" placeholder="Enter full name"
                                                    required>
                                            @else
                                                <label class="form-control" disabled>
                                                    {{ $customer->bio->refname }}
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">DOB:</label>
                                            @if($can_edit_critical_profile)
                                                <input class="form-control datepicker" type="text" id="dob" name="dob" {{--
                                                    placeholder="" --}} {{-- max="{{ now()->subYears(18)->format('Y-m-d') }}"
                                                    --}}
                                                    value="{{ Carbon\Carbon::parse($customer->bio->dob)->format('Y-m-d') }}"
                                                    required>
                                            @else
                                                <label class="form-control">
                                                    {{ Carbon\Carbon::parse($customer->bio->dob)->format('Y-m-d') }}
                                                </label>
                                            @endif

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">Age:</label>
                                            @if($can_edit_critical_profile)
                                                <input class="form-control" type="text" id="age" name="age"
                                                    value="{{ $customer->bio->age }}" placeholder="Enter age" readonly>
                                            @else
                                                <label class="form-control">
                                                    {{ $customer->bio->age }}
                                                </label>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Time of Birth:</label>
                                            @if($can_edit_critical_profile)
                                                <input class="form-control" type="text" id="tob" name="tob"
                                                    value="{{ $customer->bio->tob }}" placeholder="Enter birth time" readonly>
                                            @else
                                                <label class="form-control">
                                                    {{ $customer->bio->tob }}
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">Birth Place:</label>
                                            <input class="form-control" type="text" name="pob"
                                                value="{{ $customer->bio->pob }}" placeholder="Enter birth place">
                                        </div>
                                        <div class="col-md-2 col-6 mb-2">
                                            <label class="form-label">Height (Cms):</label>
                                            @if($can_edit_critical_profile)
                                                <select id="height_cm" name="hght" class="form-select">
                                                    <option disabled>Select</option>
                                                    @foreach (range(122, 214) as $item)
                                                        <option value="{{ $item }}" {{ $item == $customer->hg ? 'selected' : '' }}>
                                                            {{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <label class="form-control">
                                                    {{ $customer->hg }}
                                                </label>
                                            @endif
                                        </div>
                                        <div class="col-md-1 col-6 mb-2">
                                            <label class="form-label">Height (Fit):</label>
                                            {{-- <input type="text" id="btnHeightFt" value="4 ft 0 in"
                                                class="btn btn-sm btn-light waves-effect"> --}}
                                            <input type="hidden" id="hghtft" name="hghtft" value="{{ $customer->hghtft }}">
                                            <button id="btnHeightFt" type="button"
                                                class="btn btn-light waves-effect">{{ $customer->hghtft }}</button>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Weight:</label>
                                            <select name="wtkg" class="form-select">
                                                <option value=""></option>
                                                @foreach (range(30, 199) as $item)
                                                    <option value="{{ $item }}" {{ $item == $customer->bio->wtkg ? 'selected' : '' }}> {{ $item . ' kg' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2 row-cols-5"">
                                                                                                                                                <div class="
                                        col mb-2">
                                        <label class="form-label">Religion:</label>
                                        <select id="religion" name="religion" class="form-select">
                                            <option value="1" {{ $customer->bio->religion->value == 1 ? 'selected' : '' }}>
                                                Hindu
                                            </option>
                                            <option value="2" {{ $customer->bio->religion->value == 2 ? 'selected' : '' }}>
                                                Sikh
                                            </option>
                                            <option value="3" {{ $customer->bio->religion->value == 3 ? 'selected' : '' }}>
                                                Jain
                                            </option>
                                            <option value="4" {{ $customer->bio->religion->value == 4 ? 'selected' : '' }}>
                                                Christian
                                            </option>
                                            <option value="5" {{ $customer->bio->religion->value == 5 ? 'selected' : '' }}>
                                                Muslim
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col mb-2">
                                        <label class="form-label">Caste:</label>
                                        <select id="caste" name="caste" class="form-select select2-newentry">
                                            @foreach ($castes as $caste)
                                                <option value="{{ $caste->id }}" {{ $customer->bio->caste == $caste->id ? 'selected' : '' }}>{{ $caste->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mb-2">
                                        <label for="" class="form-label">Sub-caste:</label>
                                        <select id="subcaste" name="subcaste" class="form-select select2-distinct"
                                            data-table="profile_bio" data-column="subcaste"
                                            data-value="{{ $customer->bio->subcaste }}">
                                            <option value=""></option>
                                        </select>

                                    </div>
                                    <div class="col mb-2">
                                        <label for="" class="form-label">Gotra:</label>
                                        <select id="gotra" name="gotra" class="form-select select2-distinct"
                                            data-table="profile_bio" data-column="gotra"
                                            data-value="{{ $customer->bio->gotra }}">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="col mb-2">
                                        <label class="form-label">Complexion:</label>
                                        <select name="complexion" class="form-select">
                                            <option value="1" {{ $customer->bio->complexion->value == 1 ? 'selected' : '' }}>
                                                Very Fair</option>
                                            <option value="2" {{ $customer->bio->complexion->value == 2 ? 'selected' : '' }}>
                                                Fair</option>
                                            <option value="3" {{ $customer->bio->complexion->value == 3 ? 'selected' : '' }}>
                                                Wheatish</option>
                                            <option value="4" {{ $customer->bio->complexion->value == 4 ? 'selected' : '' }}>
                                                Brown</option>
                                            <option value="5" {{ $customer->bio->complexion->value == 5 ? 'selected' : '' }}>
                                                Dark</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Color of Eye:</label>
                                        <select name="eyecolor" id="eyecolor" class="form-select">
                                            <option value="1" {{ $customer->personal->eyecolor->value == 1 ? 'selected' : '' }}>Amber</option>
                                            <option value="2" {{ $customer->personal->eyecolor->value == 2 ? 'selected' : '' }}>Blue</option>
                                            <option value="3" {{ $customer->personal->eyecolor->value == 3 ? 'selected' : '' }}>Brown</option>
                                            <option value="4" {{ $customer->personal->eyecolor->value == 4 ? 'selected' : '' }}>Black</option>
                                            <option value="5" {{ $customer->personal->eyecolor->value == 5 ? 'selected' : '' }}>Gray</option>
                                            <option value="6" {{ $customer->personal->eyecolor->value == 6 ? 'selected' : '' }}>Green</option>
                                            <option value="7" {{ $customer->personal->eyecolor->value == 7 ? 'selected' : '' }}>Hazel</option>
                                            <option value="8" {{ $customer->personal->eyecolor->value == 8 ? 'selected' : '' }}>Red & Violet</option>
                                            <option value="9" {{ $customer->personal->eyecolor->value == 9 ? 'selected' : '' }}>Spectrum</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Color of Hair:</label>
                                        <select name="haircolor" id="haircolor" class="form-select">
                                            <option value="1" {{ $customer->personal->haircolor->value == 1 ? 'selected' : '' }}>Black</option>
                                            <option value="2" {{ $customer->personal->haircolor->value == 2 ? 'selected' : '' }}>Brown</option>
                                            <option value="3" {{ $customer->personal->haircolor->value == 3 ? 'selected' : '' }}>Grey</option>
                                            <option value="4" {{ $customer->personal->haircolor->value == 4 ? 'selected' : '' }}>Blond</option>
                                            <option value="5" {{ $customer->personal->haircolor->value == 5 ? 'selected' : '' }}>Bald</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Blood Group:</label>
                                        <select name="bg" id="bg" class="form-select">
                                            <option disabled>Select</option>
                                            <option {{ $customer->bio->bg == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option {{ $customer->bio->bg == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option {{ $customer->bio->bg == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option {{ $customer->bio->bg == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option {{ $customer->bio->bg == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option {{ $customer->bio->bg == 'AB-' ? 'selected' : '' }}>AB-</option>
                                            <option {{ $customer->bio->bg == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option {{ $customer->bio->bg == 'O-' ? 'selected' : '' }}>O-</option>
                                            <option {{ $customer->bio->bg == "Don't Know" ? 'selected' : '' }}>Don't Know
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Astro Status:</label>
                                        <select name="astrostatus" id="astrostatus" class="form-select">
                                            <option value="1" {{ $customer->bio->astrostatus->value == 1 ? 'selected' : '' }}>
                                                Manglik</option>
                                            <option value="2" {{ $customer->bio->astrostatus->value == 2 ? 'selected' : '' }}>
                                                Slightly Manglik</option>
                                            <option value="3" {{ $customer->bio->astrostatus->value == 3 ? 'selected' : '' }}>
                                                Non Manglik</option>
                                            <option value="4" {{ $customer->bio->astrostatus->value == 4 ? 'selected' : '' }}>
                                                Don't Believe</option>
                                            <option value="5" {{ $customer->bio->astrostatus->value == 5 ? 'selected' : '' }}>
                                                Don't Know</option>

                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Drinking:</label>
                                        <select name="drinkinghabit" id="drinkinghabit" class="form-select">
                                            <option value="1" {{ $customer->bio->drinkinghabit->value == 1 ? 'selected' : '' }}>Non Consumer</option>
                                            <option value="2" {{ $customer->bio->drinkinghabit->value == 2 ? 'selected' : '' }}>Drink Occasionally</option>
                                            <option value="3" {{ $customer->bio->drinkinghabit->value == 3 ? 'selected' : '' }}>Regular Drinker</option>
                                            <option value="4" {{ $customer->bio->drinkinghabit->value == 4 ? 'selected' : '' }}>Don't Know</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Smoking:</label>
                                        <select name="smokinghabit" id="smokinghabit" class="form-select">
                                            <option value="1" {{ $customer->bio->smokinghabit->value == 1 ? 'selected' : '' }}>Non Smoker</option>
                                            <option value="2" {{ $customer->bio->smokinghabit->value == 2 ? 'selected' : '' }}>Smoker</option>
                                            <option value="3" {{ $customer->bio->smokinghabit->value == 3 ? 'selected' : '' }}>Don't Know</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Eating:</label>
                                        <select name="eatinghabit" id="eatinghabit" class="form-select">
                                            <option value="1" {{ $customer->bio->eatinghabit->value == 1 ? 'selected' : '' }}>
                                                Vegetarian</option>
                                            <option value="2" {{ $customer->bio->eatinghabit->value == 2 ? 'selected' : '' }}>
                                                Eggetarian</option>
                                            <option value="3" {{ $customer->bio->eatinghabit->value == 3 ? 'selected' : '' }}>
                                                Non Vegetarian</option>
                                            <option value="4" {{ $customer->bio->eatinghabit->value == 4 ? 'selected' : '' }}>
                                                Don't Know</option>
                                            <option value="5" {{ $customer->bio->eatinghabit->value == 5 ? 'selected' : '' }}>
                                                Occasionally Non Vegetarian</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Spectacles:</label>
                                        <input type="text" id="spects" name="spects" class="form-control"
                                            value="{{ $customer->bio->spects }}">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 mb-2">
                                        <label for="" class="form-label">Disease / Disability:</label>
                                        <textarea name="dd" id="dd" class="form-control" rows="4"
                                            placeholder="Enter disease/disability">{{ $customer->bio->dd }}</textarea>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="" class="form-label">Hobbies:</label>
                                        <select name="hobbies" id="hobbies" class="form-select select2-distinct"
                                            data-table="profile_personal" data-column="hobbies"
                                            data-value="{{ $customer->personal->hobbies }}">
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="" class="form-label">Characteristics:</label>
                                        <select name="characteristics" id="characteristics"
                                            class="form-select select2-distinct" data-table="profile_personal"
                                            data-column="characteristics"
                                            data-value="{{ $customer->personal->characteristics }}">
                                            {{-- @foreach ($characteristics as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="ducation" role="tabpanel">
                            <div class="edusection">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label">Education:</label>
                                        <select name="education" class="form-select">
                                            <option value="1" {{ $customer->bio->education->value == 1 ? 'selected' : '' }}>
                                                Matriculate</option>
                                            <option value="2" {{ $customer->bio->education->value == 2 ? 'selected' : '' }}>
                                                Under Graduate</option>
                                            <option value="3" {{ $customer->bio->education->value == 3 ? 'selected' : '' }}>
                                                Graduate</option>
                                            <option value="6" {{ $customer->bio->education->value == 6 ? 'selected' : '' }}>
                                                Double Graduate</option>
                                            <option value="4" {{ $customer->bio->education->value == 4 ? 'selected' : '' }}>
                                                Post Graduate</option>
                                            <option value="5" {{ $customer->bio->education->value == 5 ? 'selected' : '' }}>
                                                Doctorate</option>
                                        </select>
                                    </div>

                                </div>
                                @forelse ($customer->education as $item)
                                    <div class="row bg-secondary-subtle mb-1 pt-2">
                                        <div class="col-lg-11 col-11">
                                            <div class="row">
                                                <div class="col-lg-4 col-12">
                                                    <label for="" class="form-label">Name of Course:</label>
                                                    <input class="form-control" type="text" name="educourse[]"
                                                        value="{{ $item->educourse }}" required
                                                        placeholder="Enter name of course">
                                                </div>
                                                <div class="col-lg-4 col-12 mb-2 pt-2">
                                                    <label for="" class="form-label">Institution:</label>
                                                    <input class="form-control" type="text" name="eduinst[]"
                                                        value="{{ $item->eduinst }}" required
                                                        placeholder="Enter Institution name">
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <label for="" class="form-label">Year:</label>
                                                    <input class="form-control" type="text" name="eduyear[]"
                                                        value="{{ $item->eduyear }}" required placeholder="Enter passing year">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-6 pb-3">
                                            <label class="form-label">&nbsp;</label> <br>
                                            <button type="button" class="btn btn-dark waves-effect waves-light btnAddeducation">
                                                <span class="font-size-14">+</span>
                                            </button>
                                            @if (!$loop->first)
                                                <button type="button"
                                                    class="btn btn-danger waves-effect waves-light btnRemoveEducation">
                                                    <span class="font-size-14">-</span>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                @empty


                                    <div class="row bg-secondary-subtle mb-1 pt-2">
                                        <div class="col-lg-11 col-11">
                                            <div class="row">
                                                <div class="col-lg-4 col-12">
                                                    <label for="" class="form-label">Name of Course:</label>
                                                    <input class="form-control" type="text" name="educourse[]"
                                                        placeholder="Enter name of course">
                                                </div>
                                                <div class="col-lg-4 col-12 mb-2 pt-2">
                                                    <label for="" class="form-label">Institution:</label>
                                                    <input class="form-control" type="text" name="eduinst[]"
                                                        placeholder="Enter Institution name">
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <label for="" class="form-label">Year:</label>
                                                    <input class="form-control" type="text" name="eduyear[]"
                                                        placeholder="Enter passing year">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-6 pb-3">
                                            <label class="form-label">&nbsp;</label> <br>
                                            <button type="button" class="btn btn-dark waves-effect waves-light btnAddeducation">
                                                <span class="font-size-14">+</span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforelse




                            </div>
                        </div>
                        <div class="tab-pane" id="occupation" role="tabpanel">
                            <div class="section_occupation">
                                <div class="row">
                                    <div class="col-lg-2 col-12 mb-2">
                                        <label class="form-label">Occupation:</label>
                                        <select name="occupation" id="occupation" class="form-select">
                                            @foreach ($occupations as $item)
                                                <option value="{{ $item->occ_code }}" {{ $customer->bio->occupation == $item->occ_code ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-12 mb-2">
                                        <label class="form-label">Income (P.A.):</label>
                                        <select name="income" id="income" class="form-select">
                                            @foreach ($incomes as $item)
                                                <option value="{{ $item->inc_code }}" {{ $customer->bio->income == $item->inc_code ? 'selected' : '' }}>{{ $item->income }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-12 mb-2">
                                        <label for="" class="form-label">Salary (P.A.):</label>
                                        <input class="form-control" type="text" name="salary"
                                            value="{{ $customer->personal->salary }}" placeholder="Enter salary">
                                    </div>
                                </div>


                                @forelse ($customer->organisation as $item)
                                    <div class="row bg-secondary-subtle mb-3 pt-3">
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label for="" class="form-label">Company Name:</label>
                                            <input class="form-control" type="text" name="orgname[]"
                                                value="{{ $item->orgname }}" placeholder="Enter company name">
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Designation:</label>
                                            <input class="form-control" type="text" name="orgdept[]"
                                                value="{{ $item->orgdept }}" placeholder="Enter job designation">
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Working Year:</label>
                                            <input class="form-control" type="text" name="orgyear[]"
                                                value="{{ $item->orgyear }}" placeholder="Enter working year">
                                        </div>
                                        <div class="col-lg-2 mb-2">
                                            <label class="form-label">&nbsp;</label> <br>
                                            <button type="button"
                                                class="btn btn-dark waves-effect waves-light btnAddExperience">
                                                <span class="font-size-14">+</span>
                                            </button>
                                            @if (!$loop->first)
                                                <button type="button"
                                                    class="btn btn-danger waves-effect waves-light btnRemoveExperience">
                                                    <span class="font-size-14">-</span>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @empty

                                    <div class="row bg-secondary-subtle mb-3 pt-3">
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label for="" class="form-label">Company Name:</label>
                                            <input class="form-control" type="text" name="orgname[]"
                                                placeholder="Enter company name">
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Designation:</label>
                                            <input class="form-control" type="text" name="orgdept[]"
                                                placeholder="Enter job designation">
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Working Year:</label>
                                            <input class="form-control" type="text" name="orgyear[]"
                                                placeholder="Enter working year">
                                        </div>
                                        <div class="col-lg-2 mb-2">
                                            <label class="form-label">&nbsp;</label> <br>
                                            <button type="button"
                                                class="btn btn-dark waves-effect waves-light btnAddExperience">
                                                <span class="font-size-14">+</span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforelse




                            </div>
                        </div>
                        <div class="tab-pane" id="other-details" role="tabpanel">
                            <div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Residential:</label>
                                        <select name="rs" id="rs" class="form-select">
                                            <option value="1" {{ $customer->rs == 1 ? 'selected' : '' }}>Indian Citizen
                                            </option>
                                            <option value="2" {{ $customer->rs == 2 ? 'selected' : '' }}>Temp. Residing Abroad
                                            </option>
                                            <option value="3" {{ $customer->rs == 3 ? 'selected' : '' }}>Non Resident Indian
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Residing Country:</label>
                                        <select name="rcountry" id="rcountry" class="form-select select2-notag">
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->country }}" {{ $item->country == $customer->personal->rcountry ? 'selected' : '' }}>
                                                    {{ $item->country }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Visa:</label>
                                        <select name="visa" id="visa" class="form-select">
                                            <option value="Citizen" {{ $customer->personal->visa == "Citizen" ? 'selected' : '' }}>Citizen</option>
                                            <option value="Permanent Resident" {{ $customer->personal->visa == "Permanent Resident" ? 'selected' : '' }}>Permanent Resident</option>
                                            <option value="H1B Visa" {{ $customer->personal->visa == "H1B Visa" ? 'selected' : '' }}>H1B Visa</option>
                                            <option value="Green Card" {{ $customer->personal->visa == "Green Card" ? 'selected' : '' }}>Green Card</option>
                                            <option value="Work Permit" {{ $customer->personal->visa == "Work Permit" ? 'selected' : '' }}>Work Permit</option>
                                            <option value="Student Visa" {{ $customer->personal->visa == "Student Visa" ? 'selected' : '' }}>Student Visa</option>
                                            <option value="EU BLUE CARD WORK PERMIT" {{ $customer->personal->visa == "EU BLUE CARD WORK PERMIT" ? 'selected' : '' }}>EU BLUE CARD WORK PERMIT</option>
                                            <option value="TN-1 Visa" {{ $customer->personal->visa == "TN-1 Visa" ? 'selected' : '' }}>TN-1 Visa</option>
                                            <option value="F1 Visa" {{ $customer->personal->visa == "F1 Visa" ? 'selected' : '' }}>F1 Visa</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Nationality:</label>
                                        <select name="nationality" class="form-select  select2-notag">
                                            @foreach ($nationalities as $item)
                                                <option value="{{ $item->nationality }}" {{ $customer->personal->nationality == $item->nationality ? 'selected' : '' }}>
                                                    {{ $item->nationality }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-4 col-12 mb-2">
                                        <label for="" class="form-label">Residing City:</label>
                                        <select name="rcity" class="form-select select2-distinct"
                                            data-table="profile_personal" data-column="rcity"
                                            data-value="{{ $customer->personal->rcity }}">
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-2">
                                        <label class="form-label">Marital:</label>
                                        <select name="ms" id="ms" class="form-select">
                                            <option value="1" {{ $customer->ms == 1 ? 'selected' : '' }}>Never Married
                                            </option>
                                            <option value="2" {{ $customer->ms == 2 ? 'selected' : '' }}>Divorced</option>
                                            <option value="3" {{ $customer->ms == 3 ? 'selected' : '' }}>Widow</option>
                                            <option value="4" {{ $customer->ms == 4 ? 'selected' : '' }}>Separated</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-2">
                                        <label class="form-label">No. of Children:</label>
                                        <select name="child" id="child" class="form-select">
                                            <option value="0" {{ $customer->ch == 0 ? 'selected' : '' }}>0</option>
                                            <option value="1" {{ $customer->ch == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ $customer->ch == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ $customer->ch == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ $customer->ch == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ $customer->ch == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 col-12 mb-2">
                                        <label for="" class="form-label">Marriage Info:</label>
                                        <textarea name="marriageinfo" id="marriageinfo" class="form-control" rows="4"
                                            placeholder="Enter info">{{ $customer->personal->marriageinfo }}</textarea>
                                    </div>
                                    <div class="col-lg-6 col-12 mb-2">
                                        <label for="" class="form-label">Child Info:</label>
                                        <textarea name="childdetails" id="childdetails" class="form-control" rows="4"
                                            placeholder="Enter info">{{ $customer->personal->childdetails }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="family-details" role="tabpanel">
                            <div class="section_family">
                                @forelse ($customer->profilebs as $item)

                                    <div class="sibling-span row bg-secondary-subtle mb-3 pt-3 pb-3">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Name of Brother / Sister:</label>
                                            <input name="bsname[]" class="form-control" type="text" placeholder="Enter name"
                                                value="{{ $item->bsname }}">
                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label class="form-label">B/S:</label>
                                            <select name="bs[]" class="form-select">
                                                <option disabled>Select</option>
                                                <option value="Younger Brother" {{ $item->bs == "Younger Brother" ? 'selected' : '' }}>Younger Brother</option>
                                                <option {{ $item->bs == "Younger Brother" ? 'selected' : '' }}>Younger Sister
                                                </option>
                                                <option {{ $item->bs == "Younger Brother" ? 'selected' : '' }}>Elder Brother
                                                </option>
                                                <option>Elder Sister</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-6 mb-2">
                                            <label for="" class="form-label">Age:</label>
                                            <input name="bsage[]" class="form-control" type="text" value="{{ $item->bsage }}"
                                                placeholder="Enter age">
                                        </div>
                                        <div class="col-lg-2 col-6 mb-2">
                                            <label class="form-label">Ms-St:</label>
                                            <select name="bsmarriage[]" class="form-select">
                                                <option disabled>Select</option>
                                                <option {{ $item->bsmarriage == "Single" ? 'selected' : '' }}>Single</option>
                                                <option {{ $item->bsmarriage == "Married" ? 'selected' : '' }}>Married</option>
                                                <option {{ $item->bsmarriage == "Divorced" ? 'selected' : '' }}>Divorced</option>
                                                <option {{ $item->bsmarriage == "Widowed" ? 'selected' : '' }}>Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Personal Details:</label>
                                            <input name="bsdetails[]" class="form-control" type="text"
                                                value="{{ $item->bsdetails }}" placeholder="Enter personal details">
                                        </div>
                                        <div class="col-lg-1 col-12 mb-2">
                                            <label class="form-label">&nbsp;</label> <br>
                                            <button type="button" class="btn btn-dark waves-effect waves-light btnAddSibling">
                                                <span class="font-size-14">+</span>
                                            </button>
                                            @if (!$loop->first)
                                                <button type="button"
                                                    class="btn btn-danger waves-effect waves-light btnRemoveSiblingRow">
                                                    <span class="font-size-14">-</span>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @empty


                                    <div class="sibling-span row bg-secondary-subtle mb-3 pt-3 pb-3">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Name of Brother / Sister:</label>
                                            <input name="bsname[]" class="form-control" type="text" placeholder="Enter name">
                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label class="form-label">B/S:</label>
                                            <select name="bs[]" class="form-select">
                                                <option disabled>Select</option>
                                                <option>Younger Brother</option>
                                                <option>Younger Sister</option>
                                                <option>Elder Brother</option>
                                                <option>Elder Sister</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-6 mb-2">
                                            <label for="" class="form-label">Age:</label>
                                            <input name="bsage[]" class="form-control" type="text" placeholder="Enter age">
                                        </div>
                                        <div class="col-lg-2 col-6 mb-2">
                                            <label class="form-label">Ms-St:</label>
                                            <select name="bsmarriage[]" class="form-select">
                                                <option disabled>Select</option>
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Divorced</option>
                                                <option>Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Personal Details:</label>
                                            <input name="bsdetails[]" class="form-control" type="text"
                                                placeholder="Enter personal details">
                                        </div>
                                        <div class="col-lg-1 col-12 mb-2">
                                            <label class="form-label">&nbsp;</label> <br>
                                            <button type="button" class="btn btn-dark waves-effect waves-light btnAddSibling">
                                                <span class="font-size-14">+</span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforelse

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Family Type:</label>
                                        <select name="typeoffamily" id="typeoffamily" class="form-select">
                                            <option disabled>Select</option>
                                            <option value="Nuclear Family" {{ $customer->personal->typeoffamily == "Nuclear Family" ? 'selected' : '' }}>Nuclear Family</option>
                                            <option value="Joint Family" {{ $customer->personal->typeoffamily == "Joint Family" ? 'selected' : '' }}>Joint Family</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-9 col-12 mb-2">
                                        <label for="" class="form-label">Family Status:</label>
                                        <!--<input class="form-control" type="text"  placeholder="">-->
                                        <textarea name="familystatus" id="familystatus" class="form-control" rows="1"
                                            placeholder="Enter family status">{{ $customer->personal->familystatus }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Father's Name:</label>
                                        <input class="form-control" type="text" name="fathersname"
                                            value="{{ $customer->personal->fathersname }}" placeholder="Enter father name">
                                    </div>
                                    <div class="col-lg-9 col-12 mb-2">
                                        <label for="" class="form-label">Father's Details:</label>
                                        <textarea name="fatherdetails" id="fatherdetails" class="form-control" rows="1"
                                            placeholder="Enter father details">{{ $customer->personal->fatherdetails }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Mother's Name:</label>
                                        <input name="mothersname" class="form-control" type="text"
                                            value="{{ $customer->personal->mothersname }}" placeholder="Enter mothers name">
                                    </div>
                                    <div class="col-lg-9 col-12 mb-2">
                                        <label for="" class="form-label">Mother's Details:</label>
                                        <textarea name="motherdetails" id="motherdetails" class="form-control" rows="1"
                                            placeholder="Enter mothers details">{{ $customer->personal->motherdetails }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-6 col-12 mb-2">
                                        <label for="" class="form-label">Family History:</label>
                                        <textarea name="familyhistory" id="familyhistory" class="form-control" rows="4"
                                            placeholder="Enter family history">{{ $customer->personal->familyhistory }}</textarea>
                                    </div>
                                    <div class="col-lg-6 col-12 mb-2">
                                        <label for="" class="form-label">Extra Info (Personal):</label>
                                        <textarea name="personaldetails" id="personaldetails" class="form-control" rows="4"
                                            placeholder="Enter extra info">{{ $customer->personal->personaldetails }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-4 col-12 mb-2">
                                        <label class="form-label">Family Income (P.A):</label>
                                        <select name="familyincome" id="familyincome" class="form-select">
                                            @foreach ($incomes as $item)
                                                <option value="{{ $item->inc_code }}" {{ $item->inc_code == $customer->personal->familyincome ? 'selected' : '' }}>
                                                    {{ $item->income }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-2">
                                        <label for="" class="form-label">Family Native:</label>
                                        <select id="familynative" name="familynative" class="form-select select2-distinct"
                                            data-table="profile_personal" data-column="familynative"
                                            data-value="{{ $customer->personal->familynative }}">
                                        </select>

                                    </div>
                                    <div class="col-lg-4 col-12 mb-2">
                                        <label for="" class="form-label">F. Inc (M):</label>
                                        <input class="form-control" type="text" name="familyincomem"
                                            value="{{ $customer->personal->familyincomem }}" id="familyincomem">
                                    </div>

                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12 col-12 mb-2">
                                        <label for="" class="form-label">Budget:</label>
                                        <input class="form-control" type="text" name="budget"
                                            value="{{ $customer->personal->budget }}" placeholder="Enter budget">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="person-details" role="tabpanel">
                            <div class="section_person">
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Contact Person:</label>
                                        <input class="form-control" name="contactperson" type="text"
                                            value="{{ $customer->personal->contactperson }}" id="contactperson"
                                            placeholder="Enter contact person name">
                                    </div>
                                    <div class="col-lg-9 col-12 mb-2">
                                        <label for="" class="form-label">Address:</label>
                                        <textarea name="contactaddress" id="contactaddress" class="form-control" rows="1"
                                            placeholder="Enter complete address">{{ $customer->personal->contactaddress }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Location:</label>
                                        <select id="arealocation" name="arealocation" class="form-select select2-distinct"
                                            data-table="profile_personal" data-column="arealocation"
                                            data-value="{{ $customer->personal->arealocation }}">
                                        </select>

                                    </div>
                                    <div class="col-lg-2 col-12 mb-2">
                                        <label for="" class="form-label">City:</label>
                                        <select id="contactcity" name="contactcity" class="form-select  select2-distinct"
                                            data-table="profile_personal" data-column="contactcity"
                                            data-value="{{ $customer->personal->contactcity }}">
                                        </select>



                                    </div>
                                    <div class="col-lg-2 col-12 mb-2">
                                        <label for="" class="form-label">Pin Code:</label>
                                        <input class="form-control" type="text" name="contactpincode"
                                            value="{{ $customer->personal->contactpincode }}" id="contactpincode"
                                            placeholder="Enter pin code number" maxlength="6">
                                    </div>
                                    <div class="col-lg-2 col-12 mb-2">
                                        <label for="" class="form-label">State:</label>
                                        {{-- <input class="form-control" type="text" placeholder="Enter state name"> --}}
                                        <select id="contactstate" name="contactstate" class="form-select select2-distinct"
                                            data-table="profile_personal" data-column="contactstate"
                                            data-value="{{ $customer->personal->contactstate }}">
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Country:</label>
                                        <select name="contactcountry" id="contactcountry"
                                            class="form-select select2-distinct" data-table="profile_personal"
                                            data-column="contactcountry"
                                            data-value="{{ $customer->personal->contactcountry }}">
                                            {{-- @foreach ($countries as $item)
                                            <option value="{{ $item->country }}">{{ $item->country }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Phone No.:</label>
                                        @if($can_edit_critical_profile)
                                            <input class="form-control" type="text" name="contactphone"
                                                value="{{ $customer->personal->contactphone }}" id="contactphone"
                                                placeholder="Enter number">
                                        @else
                                            <label class="form-control" disabled>
                                                {{ $customer->personal->contactphone }}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Email ID:</label>
                                        @if($can_edit_critical_profile)
                                            <input class="form-control" type="text" name="contactemail"
                                                value="{{ $customer->personal->contactemail }}" id="contactemail"
                                                placeholder="Enter email">
                                        @else
                                            <label class="form-control" disabled>
                                                {{ $customer->personal->contactemail }}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label for="" class="form-label">Relation:</label>
                                        <select id="contactrelation" name="contactrelation"
                                            class="form-select select2-distinct" data-table="profile_personal"
                                            data-value="{{ $customer->personal->contactrelation }}"
                                            data-column="contactrelation">
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-12 mb-2">
                                        <label class="form-label">Zone:</label>
                                        <select id="contactzone" name="contactzone" class="form-select  select2-notag">
                                            @foreach ($zones as $item)
                                                <option value="{{ $item->zone_code }}" {{  $customer->personal->contactzone == $item->zone_code ? 'selected' : ''  }}>
                                                    {{ $item->zone_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="col-lg-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light mb-3">UPDATE ALL
                        INFORMATIONS</button>
                    &nbsp; &nbsp;
                    {{-- <button type="button" class="btn bg-success btn-lg waves-effect waves-light mb-3">EDIT
                        FORM</button> --}}
                </div>
            </div><!-- end card-body -->
            </form>


        </div><!-- end card -->


    </div>
    <div class="clearfix"></div>




    </div>
    <!-- end row-->
    </div> <!-- container-fluid -->
@endsection

@section('footer-script')

    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script>
        function cmToFeetInchesRounded(cm) {
            console.log("cm", cm);
            const inchesTotal = cm / 2.54;
            const feet = Math.floor(inchesTotal / 12);
            const inches = parseInt(inchesTotal % 12);
            return `${feet} ft ${inches} in`;
        }

        //
        const height_cm = document.getElementById('height_cm')
        const btnHeightFt = document.getElementById('btnHeightFt')
        var feetInch = "4 ft 0 in";

        height_cm.addEventListener("change", function () {
            const selectedValue = this.value;
            feetInch = cmToFeetInchesRounded(selectedValue);
            btnHeightFt.textContent = feetInch;
            document.getElementById('hghtft').value = feetInch;

        });

        document.getElementById('dob').addEventListener('change', (event) => {
            const selectedDate = event.target.value;
            console.log('Date changed to:', selectedDate);
            // You can perform other actions here, like sending the date to a server
            const birthDate = new Date(selectedDate);
            const today = new Date();
            let years = today.getFullYear() - birthDate.getFullYear();
            document.getElementById('age').value = parseInt(years);

        });
    </script>


    <script>
        $(function () {
            $("#tob").timepicker({
                uiLibrary: 'bootstrap5'
            });
            $("#religion").change(function () {
                let religionCode = $(this).val();
                let url = "{{ route('get-caste', ['religion' => ':religion']) }}"; // placeholder :id
                url = url.replace(':religion', religionCode);

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        const select = document.getElementById('caste');
                        select.innerHTML = '';
                        console.log(data.data);
                        data.data.forEach(element => {
                            const option = document.createElement('option');
                            option.value = element.id;
                            option.textContent = element.name;
                            select.appendChild(option);
                        });
                    })
                    .catch(err => console.error(err));
            });

            $('.select2-newentry').select2({
                tags: true,
                placeholder: "Select or type to add",
                allowClear: true,
            });

            $('.select2-notag').select2({
                placeholder: "Select or type to add",
                allowClear: true,
            })

            $('.select2-distinct').each(function () {
                let $el = $(this);
                let table = $el.data('table');
                let column = $el.data('column');
                let preValue = $el.data('value'); // <-- Get initial value


                $el.select2({
                    tags: true,
                    placeholder: "Select or type to add",
                    allowClear: true,
                    ajax: {
                        delay: 300,
                        url: `{{ route('fetch-distinct-data') }}`,
                        dataType: "json",
                        data: function (params) {
                            return {
                                q: params.term || "",
                                table: table,
                                column: column
                            }
                        },
                        processResults: function (data) {
                            return {
                                results: data.map(function (item) {
                                    return {
                                        id: item,
                                        text: item
                                    };
                                })
                            };
                        }

                    }
                });

                // ---- PRESELECT LOGIC ----
                if (preValue && preValue !== "") {
                    let option = new Option(preValue, preValue, true, true);
                    $el.append(option).trigger('change');
                }

            });

            $(document).on('click', '.btnAddeducation', function () {
                $(this).closest('div.edusection').append(
                    `<div class="row bg-secondary-subtle mb-1 pt-2"> <div class="col-lg-11 col-11"> <div class="row"> <div class="col-lg-4 col-12"> <label for="" class="form-label">Name of Course:</label> <input class="form-control" type="text" name="educourse[]" placeholder="Enter name of course"> </div> <div class="col-lg-4 col-12 mb-2 pt-2"> <label for="" class="form-label">Institution:</label> <input class="form-control" type="text" name="eduinst[]" placeholder="Enter Institution name"> </div> <div class="col-lg-4 col-12"> <label for="" class="form-label">Year:</label> <input class="form-control" type="text" name="eduyear[]" placeholder="Enter passing year"> </div> </div> </div> <div class="col-lg-1 col-6 pb-3"> <label class="form-label">&nbsp;</label> <br> <button type="button" class="btn btn-dark waves-effect waves-light btnAddeducation"> <span class="font-size-14">+</span> </button> <button type="button" class="btn btn-danger waves-effect waves-light btnRemoveEducation"> <span class="font-size-14">-</span> </button> </div> <div class="clearfix"></div> </div>`
                )
            });
            $(document).on('click', '.btnRemoveEducation', function () {
                $(this).closest('div.row').remove();
            });
            $(document).on('click', '.btnAddExperience', function () {
                $(this).closest('div.section_occupation').append(
                    `<div class="row bg-secondary-subtle mb-3 pt-3"> <div class="col-lg-4 col-12 mb-2"> <label for="" class="form-label">Company Name:</label> <input class="form-control" type="text" name="orgname[]" placeholder="Enter company name"> </div> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Designation:</label> <input class="form-control" type="text" name="orgdept[]" placeholder="Enter job designation"> </div> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Working Year:</label> <input class="form-control" type="text" name="orgyear[]" placeholder="Enter working year"> </div> <div class="col-lg-2 mb-2"> <label class="form-label">&nbsp;</label> <br> <button type="button" class="btn btn-dark waves-effect waves-light btnAddExperience"> <span class="font-size-14">+</span> </button> <button type="button" class="btn btn-danger waves-effect waves-light btnRemoveExperience"> <span class="font-size-14">-</span> </button> </div> <div class="clearfix"></div> </div>`
                );
            });
            $(document).on('click', '.btnRemoveExperience', function () {
                $(this).closest('div.row').remove();
            });

            $(document).on('click', '.btnAddSibling', function () {
                $(this).closest('div.row').after(
                    `<div class="sibling-span row bg-secondary-subtle mb-3 pt-3 pb-3"> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Name of Brother / Sister:</label> <input name="bsname[]" class="form-control" type="text" placeholder="Enter name"> </div> <div class="col-lg-2 col-12 mb-2"> <label class="form-label">B/S:</label> <select name="bs[]" class="form-select"> <option disabled>Select</option> <option>Younger Brother</option> <option>Younger Sister</option> <option>Elder Brother</option> <option>Elder Sister</option> </select> </div> <div class="col-lg-1 col-6 mb-2"> <label for="" class="form-label">Age:</label> <input name="bsage[]" class="form-control" type="text" placeholder="Enter age"> </div> <div class="col-lg-2 col-6 mb-2"> <label class="form-label">Ms-St:</label> <select name="bsmarriage[]" class="form-select"> <option disabled>Select</option> <option>Single</option> <option>Married</option> <option>Divorced</option> <option>Widowed</option> </select> </div> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Personal Details:</label> <input name="bsdetails[]" class="form-control" type="text" placeholder="Enter personal details"> </div> <div class="col-lg-1 col-12 mb-2"> <label class="form-label">&nbsp;</label> <br> <button type="button" class="btn btn-dark waves-effect waves-light btnAddSibling"> <span class="font-size-14">+</span> </button> <button type="button" class="btn btn-danger waves-effect waves-light btnRemoveSiblingRow"> <span class="font-size-14">-</span> </button> </div> <div class="clearfix"></div> </div>`
                );
            });
            $(document).on('click', '.btnRemoveSiblingRow', function () {
                $(this).closest('div.row').remove();
            });
            min18Year = new Date(new Date().getFullYear() - 18, new Date().getMonth(), new Date().getDate());
            // const formattedDate = min18Year.toLocaleDateString('en-US');
            const yyyy = min18Year.getFullYear();
            const mm = String(min18Year.getMonth() + 1).padStart(2, '0');
            const dd = String(min18Year.getDate()).padStart(2, '0');

            const formattedDate = `${yyyy}-${mm}-${dd}`;

            $(".datepicker").datepicker({
                uiLibrary: 'bootstrap5',
                maxDate: formattedDate,
                format: 'yyyy-mm-dd',      // ✅ DB-ready format

                change: function (e) {
                    const changeDate = e.target.value;
                    console.log("changeDate", changeDate);
                    const birthDate = new Date(changeDate);
                    const today = new Date();
                    let years = today.getFullYear() - birthDate.getFullYear();
                    document.getElementById('age').value = parseInt(years);
                }
            });

            $("#frmUpdateCustomerData").validate({
                ignore: [], // VERY IMPORTANT for hidden tab fields

                // errorClass: 'is-invalid',
                // validClass: 'is-valid',

                // highlight: function (element) {
                //     $(element).addClass('is-invalid');
                // },

                // unhighlight: function (element) {
                //     $(element).removeClass('is-invalid');
                // },

                invalidHandler: function (event, validator) {
                    if (!validator.errorList.length) return;

                    // First error element
                    const errorElement = validator.errorList[0].element;

                    // Find tab pane
                    const $tabPane = $(errorElement).closest('.tab-pane');

                    // Activate tab
                    const tabId = $tabPane.attr('id');
                    const tabTrigger = document.querySelector(
                        `a[data-bs-toggle="tab"][href="#${tabId}"]`
                    );

                    if (tabTrigger) {
                        new bootstrap.Tab(tabTrigger).show();
                    }

                    // Focus the field
                    setTimeout(() => {
                        errorElement.focus();
                    }, 300);
                }

            });
        });
    </script>
@endsection