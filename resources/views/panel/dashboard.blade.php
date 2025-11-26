@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">
        <div class="row pt-4 mb-4">
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
                    </div><!-- end card body -->
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
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
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
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
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
        </div><!-- end row-->

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

                                <div class="row align-items-top">

                                    <div class="mb-3 col-12">
                                        <h5 class="font-size-14 mb-2">Select Field:</h5>
                                        <select class="form-select">
                                            <option>Reference No</option>
                                            <option>Name</option>
                                            <option>Date of Birth</option>
                                            <option>Birth Year</option>
                                            <option>Caste</option>
                                            <option>Occupation</option>
                                            <option>Family Income</option>
                                            <option>Mobile</option>
                                            <option>Residing City</option>
                                            <option>Zone</option>
                                            <option>Location</option>
                                            <option>Contact City</option>
                                            <option>Contact State</option>
                                            <option>Email ID</option>
                                            <option>Tele-councelor</option>
                                            <option>Team Leader</option>
                                            <option>Relationship Manager</option>
                                            <option>Father's Name</option>
                                            <option>Father's Occupation</option>
                                            <option>Mother's Name</option>
                                            <option>Mother's Occupation</option>
                                            <option>Education Details</option>
                                            <option>Occupation Details</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <h5 class="font-size-14 mb-2">Search Criteria:</h5>
                                        <input class="form-control" type="search" value=""
                                            id="example-search-input" placeholder="">
                                    </div>

                                    <div class="mb-6 col-12">
                                        <h5 class="font-size-14 mb-2">Data Type:</h5>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="formCheck1"
                                                        checked>
                                                    <label class="form-check-label" for="formCheck1">
                                                        Paid
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="formCheck2"
                                                        checked>
                                                    <label class="form-check-label" for="formCheck2">
                                                        Active
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="formCheck2"
                                                        checked>
                                                    <label class="form-check-label" for="formCheck2">
                                                        Non Paid
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="formCheck1">
                                                    <label class="form-check-label" for="formCheck1">
                                                        Fixed
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="formCheck2">
                                                    <label class="form-check-label" for="formCheck2">
                                                        NA
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-6 pt-4 col-12">
                                        <a href="search-result.php"><button type="button"
                                                class="btn btn-success w-lg waves-effect waves-light">Search</button></a>
                                    </div>

                                </div>
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
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th data-priority="1" width="35%">Ref No.</th>
                                                    <th data-priority="2" width="65%">Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>110234</td>
                                                    <td>Sunny</td>
                                                </tr>
                                                <tr>
                                                    <td>110238</td>
                                                    <td>Priya</td>
                                                </tr>
                                                <tr>
                                                    <td>110267</td>
                                                    <td>Rahul</td>
                                                </tr>
                                                <tr>
                                                    <td>110299</td>
                                                    <td>Yuvraj</td>
                                                </tr>
                                                <tr>
                                                    <td>110789</td>
                                                    <td>Vicky</td>
                                                </tr>
                                                <tr>
                                                    <td>110290</td>
                                                    <td>Dhawal</td>
                                                </tr>
                                            </tbody>
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
                        </div>
                    </div> <!-- end col -->

                </div>
            </div>



            <div class="col-xl-3">

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
                                                                    <img src="/assets/images/small/img-1.jpg"
                                                                        alt="" class="rounded img-thumbnail">
                                                                </a>
                                                            </li>

                                                            <li class="list-inline-item message-img-list">
                                                                <a class="d-inline-block m-1" href="">
                                                                    <img src="/assets/images/small/img-2.jpg"
                                                                        alt="" class="rounded img-thumbnail">
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
            </div>


        </div>
        <!-- end row-->
    </div> <!-- container-fluid -->
@endsection
