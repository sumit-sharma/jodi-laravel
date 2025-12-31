@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">
        <style>
            .table thead {
                position: sticky;
                top: 0;
                background: #f8f9fa;
                /* match table header */
                z-index: 1;
            }
        </style>
        {{-- <div class="row pt-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body bg-primary-subtle">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h4 class="mb-3 mt-1">
                                    Agenda <br /> Notifications
                                </h4>
                                <div class="text-nowrap">
                                    <span class="text-muted font-size-13">Meetings, calls <br>& tasks all in
                                        one place.</span>
                                </div>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <button type="button" class="btn header-item noti-icon position-relative"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="bell" class="font-size-24 text-danger"></i>
                                    <span class="badge bg-danger rounded-pill">5</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notifications </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="small text-reset text-decoration-underline">
                                                    Unread (5)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">James Lemire</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">It will seem like simplified
                                                            English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your order is placed</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your item is shipped</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-6.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Salena Layfield</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend
                                                            of mine occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2 border-top d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View
                                                More..</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body bg-warning-subtle">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h4 class="mb-3 mt-1">
                                    Broadcast <br /> Notifications
                                </h4>
                                <div class="text-nowrap">
                                    <span class="text-muted font-size-13">Announcements <br> & news from
                                        management.</span>
                                </div>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <button type="button" class="btn header-item noti-icon position-relative"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="bell" class="font-size-24 text-danger"></i>
                                    <span class="badge bg-danger rounded-pill">5</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notifications </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="small text-reset text-decoration-underline">
                                                    Unread (5)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">James Lemire</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">It will seem like simplified
                                                            English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your order is placed</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your item is shipped</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-6.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Salena Layfield</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend
                                                            of mine occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2 border-top d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View
                                                More..</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body bg-danger-subtle">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h4 class="mb-3 mt-1">
                                    Chat <br /> Notifications
                                </h4>
                                <div class="text-nowrap">
                                    <span class="text-muted font-size-13">Check & reply <br> to pending
                                        chats quickly.</span>
                                </div>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <button type="button" class="btn header-item noti-icon position-relative"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="bell" class="font-size-24 text-danger"></i>
                                    <span class="badge bg-danger rounded-pill">5</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notifications </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="small text-reset text-decoration-underline">
                                                    Unread (5)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">James Lemire</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">It will seem like simplified
                                                            English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your order is placed</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your item is shipped</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-6.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Salena Layfield</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend
                                                            of mine occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2 border-top d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View
                                                More..</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->



            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body bg-success-subtle">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h4 class="mb-3 mt-1">
                                    Upcoming <br /> Holidays
                                </h4>
                                <div class="text-nowrap">
                                    <span class="text-muted font-size-13">See upcoming <br> breaks & plan
                                        ahead.</span>
                                </div>
                            </div>

                            <div class="flex-shrink-0 text-end dash-widget">
                                <button type="button" class="btn header-item noti-icon position-relative"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i data-feather="bell" class="font-size-24 text-danger"></i>
                                    <span class="badge bg-danger rounded-pill">5</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notifications </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="small text-reset text-decoration-underline">
                                                    Unread (5)</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-3.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">James Lemire</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">It will seem like simplified
                                                            English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your order is placed</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Your item is shipped</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">If several languages coalesce the
                                                            grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3
                                                                min ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="#!" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <img src="/assets/images/users/avatar-6.jpg"
                                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Salena Layfield</h6>
                                                    <div class="font-size-13 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend
                                                            of mine occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1
                                                                hours ago</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2 border-top d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View
                                                More..</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row--> --}}

        <div class="row">

            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-6">
                        <!-- card -->
                        <div class="card">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <h5 class="card-title-desc">Search Records</h5>
                                </div>
                                <form id="frmSearchMember" method="GET" action="{{ route('search-data') }}">
                                    <div class="row align-items-top">

                                        <div class="mb-3 col-12">
                                            <h5 class="font-size-14 mb-2">Select Field:</h5>
                                            <select id="searchinfield" name="searchinfield" class="form-select">
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
                                        <div class="mb-3 col-12">
                                            <h5 class="font-size-14 mb-2">Search Criteria:</h5>
                                            <input name="searchvalue" class="form-control" type="search" value=""
                                                id="searchvalue" required>
                                        </div>

                                        <div class="mb-6 col-12">

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

                                        <div class="mb-6 pt-4 col-12">
                                            <button type="submit"
                                                class="btn btn-success w-lg waves-effect waves-light">Search</button></a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row-->

                    <div class="col-xl-6">
                        <!-- card -->
                        <div class="card">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <h5 class="card-title-desc">Results</h5>
                                </div>

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns"
                                        style="height: 310px; overflow-y: auto;">
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
                    <!-- end row-->

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mb-4	">
                                    <h5 class="card-title-desc2">Recent Activities</h5>
                                </div>

                                <div class="card">
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
                                                                <td>{!! "<span class='text-uppercase'>{$item->inputs['searchinfield']}</span> : {$item->inputs['searchvalue']}" !!}
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
                        </div>
                    </div> <!-- end col -->

                </div>
            </div>



            {{-- <div class="col-xl-3">

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Chat</h4>
                        <div class="flex-shrink-0">
                            <select class="form-select form-select-sm mb-0 my-n1">
                                <option value="Today" selected="">Today</option>
                                <option value="Yesterday">Yesterday</option>
                                <option value="Week">Last Week</option>
                                <option value="Month">Last Month</option>
                            </select>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body px-0">
                        <div class="px-3 chat-conversation" data-simplebar style="max-height: 350px;">
                            <ul class="list-unstyled mb-0">
                                <li class="chat-day-title">
                                    <span class="title">Today</span>
                                </li>
                                <li>
                                    <div class="conversation-list">
                                        <div class="d-flex">
                                            <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:00
                                                                AM</span></div>
                                                        <p class="mb-0">Good Morning</p>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <li class="right">
                                    <div class="conversation-list">
                                        <div class="d-flex">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:02
                                                                AM</span></div>
                                                        <p class="mb-0">Good morning</p>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="/assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                        </div>

                                    </div>

                                </li>

                                <li>
                                    <div class="conversation-list">
                                        <div class="d-flex">
                                            <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:04
                                                                AM</span></div>
                                                        <p class="mb-0">
                                                            Hi there, How are you?
                                                        </p>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:04
                                                                AM</span></div>
                                                        <p class="mb-0">
                                                            Waiting for your reply.As I heve to go back
                                                            soon. i have to travel long distance.
                                                        </p>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>

                                <li class="right">
                                    <div class="conversation-list">
                                        <div class="d-flex">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:08
                                                                AM</span></div>
                                                        <p class="mb-0">
                                                            Hi, I am coming there in few minutes. Please
                                                            wait!! I am in taxi right now.
                                                        </p>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="/assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="conversation-list">
                                        <div class="d-flex">
                                            <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:06
                                                                AM</span></div>
                                                        <p class="mb-0">
                                                            Thank You very much, I am waiting here at
                                                            StarBuck cafe.
                                                        </p>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>


                                <li>
                                    <div class="conversation-list">
                                        <div class="d-flex">
                                            <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm"
                                                alt="">
                                            <div class="flex-1">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <div class="conversation-name"><span class="time">10:09
                                                                AM</span></div>
                                                        <p class="mb-0">
                                                            img-1.jpg & img-2.jpg images for a New Projects
                                                        </p>

                                                        <ul class="list-inline message-img mt-3  mb-0">
                                                            <li class="list-inline-item message-img-list">
                                                                <a class="d-inline-block m-1" href="">
                                                                    <img src="/assets/images/small/img-1.jpg" alt=""
                                                                        class="rounded img-thumbnail">
                                                                </a>
                                                            </li>

                                                            <li class="list-inline-item message-img-list">
                                                                <a class="d-inline-block m-1" href="">
                                                                    <img src="/assets/images/small/img-2.jpg" alt=""
                                                                        class="rounded img-thumbnail">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="dropdown align-self-start">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Copy</a>
                                                            <a class="dropdown-item" href="#">Save</a>
                                                            <a class="dropdown-item" href="#">Forward</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="px-3">
                            <div class="row">
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" class="form-control border bg-light-subtle"
                                            placeholder="Enter Message...">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit"
                                        class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                            class="d-none d-sm-inline-block me-2">Send</span> <i
                                            class="mdi mdi-send float-end"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- end col -->
            </div> --}}


        </div>
        <!-- end row-->
        @include('components.biodata_modal')

    </div> <!-- container-fluid -->
@endsection

@section('footer-script')
    <!-- timepicker -->
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
    <script>
        $(document).ready(function () {

            // min18Year = new Date(new Date().getFullYear() - 18, new Date().getMonth(), new Date().getDate());
            // // const formattedDate = min18Year.toLocaleDateString('en-US');
            // const yyyy = min18Year.getFullYear();
            // const mm = String(min18Year.getMonth() + 1).padStart(2, '0');
            // const dd = String(min18Year.getDate()).padStart(2, '0');

            // const formattedDate = `${yyyy}-${mm}-${dd}`;

            // $('#searchinfield').change(function () {
            //     if ($(this).val() == "dob") {
            //         $("#searchvalue").attr('autocomplete', 'off');
            //         $("#searchvalue").datepicker({
            //             uiLibrary: 'bootstrap5',
            //             maxDate: formattedDate,
            //             format: "yyyy-mm-dd",
            //         });
            //     } else {
            //         $("#searchvalue").datepicker("destroy");
            //         if (!$("#searchvalue").hasClass("form-control")) {
            //             $("#searchvalue").addClass("form-control");
            //             // $("#searchvalue").attr('autocomplete', 'on');
            //         }
            //     }
            // });

            $('#searchinfield').change(function () {
                if ($(this).val() == "dob") {
                    $("#searchvalue").attr('placeholder', 'YYYY-MM-DD');
                    $("#searchvalue").attr('autocomplete', 'off');
                } else {
                    $("#searchvalue").attr('placeholder', 'Search');
                    $("#searchvalue").attr('autocomplete', 'on');
                }
            });


            $('#frmSearchMember').validate({
                rules: {
                    searchvalue: {
                        required: true
                    }
                },
                messages: {
                    searchvalue: {
                        required: "Please enter search Criteria"
                    }
                }
            });
        });
    </script>

@endsection