@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">
        <style>
                .select2{width: 100% !important}
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
                    <form id="frmFreshCustomerData" method="POST" action="{{ route('customer.store') }}">
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
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">Name:</label>
                                            <input class="form-control" type="text" name="refname"
                                                placeholder="Enter full name" required>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">DOB:</label>
                                            <input class="form-control" type="date" id="dob" name="dob"
                                                placeholder="" max="{{ now()->subYears(18)->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">Age:</label>
                                            <input class="form-control" type="text" id="age" name="age"
                                                placeholder="Enter age" readonly>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Time of Birth:</label>
                                            <input class="form-control" type="text" id="tob" name="tob"
                                                placeholder="Enter birth time" readonly>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label for="" class="form-label">Birth Place:</label>
                                            <input class="form-control" type="text" name="pob"
                                                placeholder="Enter birth place">
                                        </div>
                                        <div class="col-md-2 col-6 mb-2">
                                            <label class="form-label">Height (Cms):</label>
                                            <select id="height_cm" name="hght" class="form-select">
                                                <option disabled>Select</option>
                                                @foreach (range(122, 214) as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $item == '165' ? 'selected' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1 col-6 mb-2">
                                            <label class="form-label">Height (Fit):</label>
                                            {{-- <input type="text" id="btnHeightFt" value="4 ft 0 in" class="btn btn-sm btn-light waves-effect" > --}}
                                            <input type="hidden" id="hghtft" name="hghtft">
                                            <button id="btnHeightFt" type="button" class="btn btn-light waves-effect">5
                                                ft 4
                                                in</button>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Weight:</label>
                                            <select name="wtkg" class="form-select">
                                                @foreach (range(30, 199) as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $item == 65 ? 'selected' : '' }}>
                                                        {{ $item . ' kg' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2 row-cols-5"">
                                        <div class="col mb-2">
                                            <label class="form-label">Religion:</label>
                                            <select id="religion" name="religion" class="form-select">
                                                <option value="1" selected>Hindu</option>
                                                <option value="2">Sikh</option>
                                                <option value="3">Jain</option>
                                                <option value="4">Christian</option>
                                                <option value="5">Muslim</option>
                                            </select>
                                        </div>
                                        <div class="col mb-2">
                                            <label class="form-label">Caste:</label>
                                            <select id="caste" name="caste" class="form-select select2-newentry">
                                                @foreach ($castes as $caste)
                                                    <option value="{{ $caste->id }}">{{ $caste->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col mb-2">
                                            <label for="" class="form-label">Sub-caste:</label>
                                            <select id="subcaste" name="subcaste" class="form-select select2-distinct"
                                                data-table="profile_bio" data-column="subcaste">
                                                <option value=""></option>
                                                {{-- @foreach ($subcastes as $item)
                                                    @if (strlen($item) > 3)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endif
                                                @endforeach --}}
                                            </select>

                                            {{-- <input class="form-control" type="text"
                                                placeholder=""> --}}
                                        </div>
                                        <div class="col mb-2">
                                            <label for="" class="form-label">Gotra:</label>
                                            <select id="gotra" name="gotra" class="form-select select2-distinct" data-table="profile_bio" data-column="gotra">
                                                <option value=""></option>
                                                {{-- @foreach ($gotras as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                            {{-- <input class="form-control" type="text"
                                                placeholder="Enter gotra name"> --}}
                                        </div>
                                        <div class="col mb-2">
                                            <label class="form-label">Complexion:</label>
                                            <select name="complexion" class="form-select">
                                                <option value="1">Very Fair</option>
                                                <option value="2" selected>Fair</option>
                                                <option value="3">Wheatish</option>
                                                <option value="4">Brown</option>
                                                <option value="5">Dark</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Color of Eye:</label>
                                            <select name="eyecolor" id="eyecolor" class="form-select">
                                                <option value="1">Amber</option>
                                                <option value="2">Blue</option>
                                                <option value="3">Brown</option>
                                                <option value="4" selected>Black</option>
                                                <option value="5">Gray</option>
                                                <option value="6">Green</option>
                                                <option value="7">Hazel</option>
                                                <option value="8">Red & Violet</option>
                                                <option value="9">Spectrum</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Color of Hair:</label>
                                            <select name="haircolor" id="haircolor" class="form-select">
                                                <option value="1" selected="selected">Black</option>
                                                <option value="2">Brown</option>
                                                <option value="3">Grey</option>
                                                <option value="4">Blond</option>
                                                <option value="5">Bald</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Blood Group:</label>
                                            <select name="bg" id="bg" class="form-select">
                                                <option disabled>Select</option>
                                                <option>A+</option>
                                                <option>A-</option>
                                                <option>B+</option>
                                                <option>B-</option>
                                                <option>AB+</option>
                                                <option>AB-</option>
                                                <option>O+</option>
                                                <option>O-</option>
                                                <option>Don't Know</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Astro Status:</label>
                                            <select name="astrostatus" id="astrostatus" class="form-select">
                                                <option value="1">Manglik</option>
                                                <option value="2">Slightly Manglik</option>
                                                <option value="3" selected>Non Manglik</option>
                                                <option value="4">Don't Believe</option>
                                                <option value="5">Don't Know</option>

                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Drinking:</label>
                                            <select name="drinkinghabit" id="drinkinghabit" class="form-select">
                                                <option value="1" selected>Non Consumer</option>
                                                <option value="2">Drink Occasionally</option>
                                                <option value="3">Regular Drinker</option>
                                                <option value="4">Don't Know</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Smoking:</label>
                                            <select name="smokinghabit" id="smokinghabit" class="form-select">
                                                <option value="1" selected>Non Smoker</option>
                                                <option value="2">Smoker</option>
                                                <option value="3">Don't Know</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Eating:</label>
                                            <select name="eatinghabit" id="eatinghabit" class="form-select">
                                                <option value="1">Vegetarian</option>
                                                <option value="2">Eggetarian</option>
                                                <option value="3">Non Vegetarian</option>
                                                <option value="4">Don't Know</option>
                                                <option value="5">Occasionally Non Vegetarian</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="form-label">Spectacles:</label>
                                            <input type="text" id="spects" name="spects" class="form-control"
                                                value="None">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 mb-2">
                                            <label for="" class="form-label">Disease / Disability:</label>
                                            <textarea name="dd" id="dd" class="form-control" rows="4" placeholder="Enter disease/disability"></textarea>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="" class="form-label">Hobbies:</label>
                                            {{-- <textarea  class="form-control"  rows="4" placeholder="Enter hobbies"></textarea> --}}
                                            <select name="hobbies" id="hobbies" class="form-select select2-distinct" data-table="profile_personal" data-column="hobbies">
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="" class="form-label">Characteristics:</label>
                                            {{-- <textarea  class="form-control"  rows="4" placeholder="Enter characteristics"></textarea> --}}
                                            <select name="characteristics" id="characteristics"
                                                class="form-select select2-distinct" data-table="profile_personal" data-column="characteristics">
                                                {{-- @foreach ($characteristics as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="form-label">Upload Photos:</label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 mb-2">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div id="my-dropzone" class="dropzone"></div>
                                                    {{-- <div>
                                                    <input type="file" id="myfile" name="myfile" multiple>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                        </div>
                                                        <h5>Drop files here or click to upload.</h5>
                                                    </div>
                                                </div> --}}
                                                </div>
                                            </div>
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
                                                <option value="1">Matriculate</option>
                                                <option value="2">Under Graduate</option>
                                                <option value="3" selected>Graduate</option>
                                                <option value="6">Double Graduate</option>
                                                <option value="4">Post Graduate</option>
                                                <option value="5">Doctorate</option>
                                            </select>
                                        </div>

                                    </div>
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
                                            <button type="button"
                                                class="btn btn-dark waves-effect waves-light btnAddeducation">
                                                <span class="font-size-14">+</span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>





                                </div>
                            </div>
                            <div class="tab-pane" id="occupation" role="tabpanel">
                                <div class="section_occupation">
                                    <div class="row">
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label class="form-label">Occupation:</label>
                                            <select name="occupation" id="occupation" class="form-select">
                                                @foreach ($occupations as $item)
                                                    <option value="{{ $item->occ_code }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label class="form-label">Income (P.A.):</label>
                                            <select name="income" id="income" class="form-select">
                                                @foreach ($incomes as $item)
                                                    <option value="{{ $item->inc_code }}">{{ $item->income }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label for="" class="form-label">Salary (P.A.):</label>
                                            <input class="form-control" type="text" name="salary"
                                                placeholder="Enter salary">
                                        </div>
                                    </div>

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
                                </div>
                            </div>
                            <div class="tab-pane" id="other-details" role="tabpanel">
                                <div>
                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Residential:</label>
                                            <select name="rs" id="rs" class="form-select">
                                                <option value="1" selected>Indian Citizen</option>
                                                <option value="2">Temp. Residing Abroad</option>
                                                <option value="3">Non Resident Indian</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Residing Country:</label>
                                            <select name="rcountry" id="rcountry" class="form-select select2-notag" >
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->country }}">{{ $item->country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Visa:</label>
                                            <select name="visa" id="visa" class="form-select">
                                                <option value="Citizen" selected>Citizen</option>
                                                <option value="Permanent Resident">Permanent Resident</option>
                                                <option value="H1B Visa">H1B Visa</option>
                                                <option value="Green Card">Green Card</option>
                                                <option value="Work Permit">Work Permit</option>
                                                <option value="Student Visa">Student Visa</option>
                                                <option value="EU BLUE CARD WORK PERMIT">EU BLUE CARD WORK PERMIT</option>
                                                <option value="TN-1 Visa">TN-1 Visa</option>
                                                <option value="F1 Visa">F1 Visa</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Nationality:</label>
                                            <select name="nationality" class="form-select  select2-notag">
                                                @foreach ($nationalities as $item)
                                                    <option value="{{ $item->nationality }}">{{ $item->nationality }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label for="" class="form-label">Residing City:</label>

                                            {{-- <input class="form-control" type="text"
                                                placeholder="Enter residing city"> --}}
                                            <select name="rcity" class="form-select select2-distinct" data-table="profile_personal" data-column="rcity">
                                                {{-- @foreach ($rcities as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label class="form-label">Marital:</label>
                                            <select name="ms" id="ms" class="form-select">
                                                <option value="1" selected>Never Married</option>
                                                <option value="2">Divorced</option>
                                                <option value="3">Widow</option>
                                                <option value="4">Separated</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label class="form-label">No. of Children:</label>
                                            <select name="child" id="child" class="form-select">
                                                <option value="0" selected>0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-6 col-12 mb-2">
                                            <label for="" class="form-label">Marriage Info:</label>
                                            <textarea name="marriageinfo" id="marriageinfo" class="form-control" rows="4" placeholder="Enter info"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-2">
                                            <label for="" class="form-label">Child Info:</label>
                                            <textarea name="childdetails" id="childdetails" class="form-control" rows="4" placeholder="Enter info"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="family-details" role="tabpanel">
                                <div class="section_family">
                                    <div class="sibling-span row bg-secondary-subtle mb-3 pt-3 pb-3">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Name of Brother / Sister:</label>
                                            <input name="bsname[]" class="form-control" type="text"
                                                placeholder="Enter name">
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
                                            <input name="bsage[]" class="form-control" type="text"
                                                placeholder="Enter age">
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
                                            <button type="button"
                                                class="btn btn-dark waves-effect waves-light btnAddSibling">
                                                <span class="font-size-14">+</span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Family Type:</label>
                                            <select name="typeoffamily" id="typeoffamily" class="form-select">
                                                <option disabled>Select</option>
                                                <option>Nuclear Family</option>
                                                <option>Joint Family</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-9 col-12 mb-2">
                                            <label for="" class="form-label">Family Status:</label>
                                            <!--<input class="form-control" type="text"  placeholder="">-->
                                            <textarea name="familystatus" id="familystatus" class="form-control" rows="1"
                                                placeholder="Enter family status"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Father's Name:</label>
                                            <input class="form-control" type="text" name="fathersname"
                                                placeholder="Enter father name">
                                        </div>
                                        <div class="col-lg-9 col-12 mb-2">
                                            <label for="" class="form-label">Father's Details:</label>
                                            <textarea name="fatherdetails" id="fatherdetails" class="form-control" rows="1"
                                                placeholder="Enter father details"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Mother's Name:</label>
                                            <input name="mothersname" class="form-control" type="text"
                                                placeholder="Enter mothers name">
                                        </div>
                                        <div class="col-lg-9 col-12 mb-2">
                                            <label for="" class="form-label">Mother's Details:</label>
                                            <textarea name="motherdetails" id="motherdetails" class="form-control" rows="1"
                                                placeholder="Enter mothers details"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-6 col-12 mb-2">
                                            <label for="" class="form-label">Family History:</label>
                                            <textarea name="familyhistory" id="familyhistory" class="form-control" rows="4"
                                                placeholder="Enter family history"></textarea>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-2">
                                            <label for="" class="form-label">Extra Info (Personal):</label>
                                            <textarea name="personaldetails" id="personaldetails" class="form-control" rows="4"
                                                placeholder="Enter extra info"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label class="form-label">Family Income (P.A):</label>
                                            <select name="familyincome" id="familyincome" class="form-select">
                                                {{-- @foreach ($incomes as $item)
                                                    <option value="{{ $item->inc_code }}">{{ $item->income }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label for="" class="form-label">Family Native:</label>
                                            {{-- <input class="form-control" type="text"
                                                placeholder="Enter info"> --}}
                                            <select id="familynative" name="familynative"
                                                class="form-select select2-distinct" data-table="profile_personal" data-column="familynative">
                                                {{-- @foreach ($familynatives as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>

                                        </div>
                                        <div class="col-lg-4 col-12 mb-2">
                                            <label for="" class="form-label">F. Inc (M):</label>
                                            <input class="form-control" type="text" name="familyincomem"
                                                id="familyincomem">
                                        </div>

                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-12 col-12 mb-2">
                                            <label for="" class="form-label">Budget:</label>
                                            <input class="form-control" type="text" name="budget"
                                                placeholder="Enter budget">
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
                                                id="contactperson" placeholder="Enter contact person name">
                                        </div>
                                        <div class="col-lg-9 col-12 mb-2">
                                            <label for="" class="form-label">Address:</label>
                                            <textarea name="contactaddress" id="contactaddress" class="form-control" rows="1"
                                                placeholder="Enter complete address"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Location:</label>
                                            {{-- <input class="form-control" type="text"
                                                placeholder="Enter location"> --}}
                                            <select id="arealocation" name="arealocation"
                                                class="form-select  select2-distinct" data-table="profile_personal" data-column="arealocation">
                                                {{-- @foreach ($locations as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>

                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label for="" class="form-label">City:</label>
                                            <select id="contactcity" name="contactcity"
                                                class="form-select  select2-distinct" data-table="profile_personal" data-column="contactcity">
                                                {{-- @foreach ($cities as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>



                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label for="" class="form-label">Pin Code:</label>
                                            <input class="form-control" type="text" name="contactpincode"
                                                id="contactpincode" placeholder="Enter pin code number" maxlength="6">
                                        </div>
                                        <div class="col-lg-2 col-12 mb-2">
                                            <label for="" class="form-label">State:</label>
                                            {{-- <input class="form-control" type="text"
                                                placeholder="Enter state name"> --}}
                                            <select id="contactstate" name="contactstate"
                                                class="form-select select2-distinct" data-table="profile_personal" data-column="contactstate">
                                                {{-- @foreach ($cities as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Country:</label>
                                            <select name="contactcountry" id="contactcountry" class="form-select select2-distinct" data-table="profile_personal" data-column="contactcountry">
                                                {{-- @foreach ($countries as $item)
                                                    <option value="{{ $item->country }}">{{ $item->country }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Phone No.:</label>
                                            <input class="form-control" type="text" name="contactphone"
                                                id="contactphone" placeholder="Enter number">
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Email ID:</label>
                                            <input class="form-control" type="text" name="contactemail"
                                                id="contactemail" placeholder="Enter email">
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label for="" class="form-label">Relation:</label>
                                            <select id="contactrelation" name="contactrelation"
                                                class="form-select select2-distinct" data-table="profile_personal" data-column="contactrelation">
                                                {{-- @foreach ($contactrelations as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-12 mb-2">
                                            <label class="form-label">Zone:</label>
                                            <select id="contactzone" name="contactzone"
                                                class="form-select  select2-notag">
                                                @foreach ($zones as $item)
                                                    <option value="{{ $item->zone_code }}">{{ $item->zone_name }}
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
    <!-- Dropzone  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

        height_cm.addEventListener("change", function() {
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
        Dropzone.autoDiscover = false;

        // store uploaded file paths
        let uploadedFiles = [];

        const myDropzone = new Dropzone("#my-dropzone", {
            url: "{{ route('customer.upload') }}",
            paramName: "file",
            maxFilesize: 5, // MB
            acceptedFiles: "image/*,application/pdf",
            addRemoveLinks: true,
            autoProcessQueue: false,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            init: function() {
                const dz = this;

                // when all uploads complete, submit the form
                dz.on("queuecomplete", function() {
                    console.log("All files uploaded");
                    // collect uploaded file paths and submit form
                    $("#contactForm")[0].submit();
                });

                dz.on("success", function(file, response) {
                    uploadedFiles.push(response.path);
                    console.log("Uploaded:", response.path);
                });

                dz.on("sending", function(file, xhr, formData) {
                    // attach other form data to upload
                    $('#contactForm').find('input, textarea').each(function() {
                        formData.append($(this).attr('name'), $(this).val());
                    });
                });
            }

            // success: function(file, response) {
            //     uploadedFiles.push(response.path);
            //     console.log("Uploaded:", response.path);
            // },
            // removedfile: function(file) {
            //     const name = file.upload?.filename;
            //     uploadedFiles = uploadedFiles.filter(f => f !== name);
            //     file.previewElement.remove();
            // }
        });

        // form submit handler
        // document.getElementById("contactForm").addEventListener("submit", function(e) {
        //     e.preventDefault(); // stop default submit

        //     // Wait until all Dropzone uploads finish
        //     if (myDropzone.getUploadingFiles().length > 0) {
        //         alert("Please wait — files are still uploading!");
        //         return;
        //     }

        //     // Append file paths as hidden inputs
        //     const form = this;
        //     uploadedFiles.forEach(path => {
        //         const input = document.createElement("input");
        //         input.type = "hidden";
        //         input.name = "files[]";
        //         input.value = path;
        //         form.appendChild(input);
        //     });

        //     // now safely submit
        //     form.submit();
        // });
    </script>
    <script>
        $(function() {
            $("#tob").timepicker({
                uiLibrary: 'bootstrap5'
            });
            $("#religion").change(function() {
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

            $('.select2-distinct').each(function() {
                let $el = $(this);
                let table = $el.data('table');
                let column = $el.data('column');


                $el.select2({
                    tags: true,
                    placeholder: "Select or type to add",
                    allowClear: true,
                    ajax: {
                        delay: 300,
                        url: `{{ route('fetch-distinct-data') }}`,
                        dataType: "json",
                        data: function(params) {
                            return {
                                q: params.term || "",
                                table: table,
                                column: column
                            }
                        },
                        processResults: function(data) {
                            return {
                                results: data.map(function(item) {
                                    return {
                                        id: item,
                                        text: item
                                    };
                                })
                            };
                        }

                    }
                });
            });

            $(document).on('click', '.btnAddeducation', function() {
                $(this).closest('div.edusection').append(
                    `<div class="row bg-secondary-subtle mb-1 pt-2"> <div class="col-lg-11 col-11"> <div class="row"> <div class="col-lg-4 col-12"> <label for="" class="form-label">Name of Course:</label> <input class="form-control" type="text" name="educourse[]" placeholder="Enter name of course"> </div> <div class="col-lg-4 col-12 mb-2 pt-2"> <label for="" class="form-label">Institution:</label> <input class="form-control" type="text" name="eduinst[]" placeholder="Enter Institution name"> </div> <div class="col-lg-4 col-12"> <label for="" class="form-label">Year:</label> <input class="form-control" type="text" name="eduyear[]" placeholder="Enter passing year"> </div> </div> </div> <div class="col-lg-1 col-6 pb-3"> <label class="form-label">&nbsp;</label> <br> <button type="button" class="btn btn-dark waves-effect waves-light btnAddeducation"> <span class="font-size-14">+</span> </button> <button type="button" class="btn btn-danger waves-effect waves-light btnRemoveEducation"> <span class="font-size-14">-</span> </button> </div> <div class="clearfix"></div> </div>`
                )
            });
            $(document).on('click', '.btnRemoveEducation', function() {
                $(this).closest('div.row').remove();
            });
            $(document).on('click', '.btnAddExperience', function() {
                $(this).closest('div.section_occupation').append(
                    `<div class="row bg-secondary-subtle mb-3 pt-3"> <div class="col-lg-4 col-12 mb-2"> <label for="" class="form-label">Company Name:</label> <input class="form-control" type="text" name="orgname[]" placeholder="Enter company name"> </div> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Designation:</label> <input class="form-control" type="text" name="orgdept[]" placeholder="Enter job designation"> </div> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Working Year:</label> <input class="form-control" type="text" name="orgyear[]" placeholder="Enter working year"> </div> <div class="col-lg-2 mb-2"> <label class="form-label">&nbsp;</label> <br> <button type="button" class="btn btn-dark waves-effect waves-light btnAddExperience"> <span class="font-size-14">+</span> </button> <button type="button" class="btn btn-danger waves-effect waves-light btnRemoveExperience"> <span class="font-size-14">-</span> </button> </div> <div class="clearfix"></div> </div>`
                );
            });
            $(document).on('click', '.btnRemoveExperience', function() {
                $(this).closest('div.row').remove();
            });

            $(document).on('click', '.btnAddSibling', function() {
                $(this).closest('div.row').after(
                    `<div class="sibling-span row bg-secondary-subtle mb-3 pt-3 pb-3"> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Name of Brother / Sister:</label> <input name="bsname[]" class="form-control" type="text" placeholder="Enter name"> </div> <div class="col-lg-2 col-12 mb-2"> <label class="form-label">B/S:</label> <select name="bs[]" class="form-select"> <option disabled>Select</option> <option>Younger Brother</option> <option>Younger Sister</option> <option>Elder Brother</option> <option>Elder Sister</option> </select> </div> <div class="col-lg-1 col-6 mb-2"> <label for="" class="form-label">Age:</label> <input name="bsage[]" class="form-control" type="text" placeholder="Enter age"> </div> <div class="col-lg-2 col-6 mb-2"> <label class="form-label">Ms-St:</label> <select name="bsmarriage[]" class="form-select"> <option disabled>Select</option> <option>Single</option> <option>Married</option> <option>Divorced</option> <option>Widowed</option> </select> </div> <div class="col-lg-3 col-12 mb-2"> <label for="" class="form-label">Personal Details:</label> <input name="bsdetails[]" class="form-control" type="text" placeholder="Enter personal details"> </div> <div class="col-lg-1 col-12 mb-2"> <label class="form-label">&nbsp;</label> <br> <button type="button" class="btn btn-dark waves-effect waves-light btnAddSibling"> <span class="font-size-14">+</span> </button> <button type="button" class="btn btn-danger waves-effect waves-light btnRemoveSiblingRow"> <span class="font-size-14">-</span> </button> </div> <div class="clearfix"></div> </div>`
                );
            });
            $(document).on('click', '.btnRemoveSiblingRow', function() {
                $(this).closest('div.row').remove();
            });

        });
    </script>
@endsection
