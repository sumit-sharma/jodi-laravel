<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/assets/images/emb-logo.webp" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/emb-logo.webp" alt="" height="24"> <span class="logo-txt"><img
                                src="/assets/images/js-logo.webp" alt="" height="34"></span>
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/assets/images/emb-logo.webp" alt="" height="15">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/images/emb-logo.webp" alt="" height="34"> <span class="logo-txt"><img
                                src="/assets/images/js-logo.webp" alt="" height="34"></span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">



            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-success rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm"
                                        alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="/assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm"
                                        alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div> --}}


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-7.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item"><i
                                class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
                    </form>
                    <a href="{{ route("change-password") }}" class="dropdown-item"><i
                                class="mdi mdi-lock-reset font-size-16 align-middle me-1"></i>Change Password</a>
                    
                </div>

            </div>


        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <!--<li class="menu-title" data-key="t-menu">Menu</li>-->

                <li>
                    <a href="/dashboard">
                        <i data-feather="monitor"></i>
                        <!--<span class="badge rounded-pill bg-success-subtle text-success float-end">9+</span>-->
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <!--<li class="menu-title" data-key="t-apps">Apps</li>-->

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="home"></i>
                        <span data-key="t-ecommerce">Main</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route("link-tl-tc") }}" data-key="t-customers">Link TL-TC</a></li>
                        {{-- <li><a href="permission.php" key="t-products">Permission</a></li>
                        <li><a href="#" data-key="t-product-detail">Change Password</a></li>
                        <li><a href="make-user.php" data-key="t-orders">Make User</a></li>
                        <li><a href="#" data-key="t-cart">Transfer RM</a></li>
                        <li><a href="#" data-key="t-checkout">Transfer TC</a></li>
                        <li><a href="feedback-options.php" data-key="t-shops">Feedback Option</a></li> --}}
                        <li><a href="{{ route('manage-caste') }}" data-key="t-add-product">Caste Option</a></li>
                        <li><a href="{{ route('manage-occupation') }}" data-key="t-seller">Occupation Option</a></li>
                        <li><a href="{{ route('manage-zone') }}" data-key="t-sale-details">Zone Option</a></li>
                        {{-- <li><a href="#" data-key="t-shops">Enter Massage</a></li>
                        <li><a href="update-my-info.php" data-key="t-add-product">Update My Info</a></li>
                        <li><a href="#" data-key="t-seller">Updates Timmings</a></li>
                        <li><a href="#" data-key="t-sale-details">Reset Password</a></li>
                        <li><a href="#" data-key="t-sale-details">Reference Graph</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="settings"></i>
                        <span data-key="t-ecommerce">Services</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('seach-members') }}" key="t-products">Search Members</a></li>
                        {{-- <li><a href="form-transfer.php" data-key="t-product-detail">Form Transfer</a></li> --}}
                        <li><a href="{{ route('all-enquiries') }}" data-key="t-orders">Show All Enquiry</a></li>
                        <li><a href="{{ route('show-all-rm-data') }}" data-key="t-customers">Show All RM Data</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-ecommerce">Reference</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('references.create') }}" key="t-products">Add Reference</a></li>
                        <li><a href="{{ route('references.index') }}" data-key="t-product-detail">Show References</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="database"></i>
                        <span data-key="t-ecommerce">Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('customer.create') }}" key="t-products">New Entry</a></li>
                        {{-- <li><a href="add-fresh-data.php" key="t-products">Add Fresh Data</a></li> --}}
                        <li><a href="{{ route('add-advtdata') }}" data-key="t-product-detail">Add Advt Data</a></li>
                        <li><a href="{{ route('list-advtdata') }}" data-key="t-orders">Show Advt Data</a></li>
                        <li><a href="{{ route('appointment.index') }}" data-key="t-customers">Add/Edit Appointment</a>
                        </li>
                        <li><a href="{{ route('hold-member.index') }}" data-key="t-cart">Show Hold Data</a></li>
                        <li><a href="{{ route('show-all-hold-records') }}" data-key="t-checkout">Show All Hold Data</a>
                        </li>
                        <li><a href="{{ route('show-all-other-data') }}" data-key="t-shops">Show Other Data</a></li>
                        <li><a href="{{ route('show-website-data') }}" data-key="t-add-product">Show Website Data</a>
                        </li>
                        {{-- <li><a href="{{ route('show-done-list') }}" data-key="t-sale-details">Show Done List</a>
                        </li> --}}
                        <li><a href="{{ route('show-all-nadata') }}" data-key="t-sale-details">Show All NA-Data</a></li>
                        <li><a href="{{ route('show-all-non-nadata') }}" data-key="t-shops">Show All None NA-Data</a>
                        </li>
                        <li><a href="javascript:;" id="directMeeting_menu" data-bs-toggle="modal"
                                data-bs-target="#DirectMeetingPageModal" data-key="t-add-product">Direct
                                Meeting</a></li>
                        {{--
                        <li><a href="fresh-calls.php" data-key="t-seller">Fresh Call</a></li>
                        <li><a href="daily-moment.php" data-key="t-sale-details">Daily Moment</a></li> --}}
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="mail"></i>
                        <span data-key="t-ecommerce">Mail</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-products">Non Paid Mail/Download</a></li>
                        <li><a href="#" data-key="t-product-detail">Update None Paid Mail</a></li>
                        <li><a href="#" key="t-products">All Pending Mail</a></li>
                        <li><a href="#" data-key="t-product-detail">Sent Self Profile</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="user-plus"></i>
                        <span data-key="t-ecommerce">Follow</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('my-followup') }}" key="t-products">My All Follow UPS</a></li>
                        {{-- <li><a href="my-prospective.php" data-key="t-product-detail">My Prospective</a></li> --}}
                        {{-- <li><a href="transfer-followup.php" key="t-products">Transfer Followup</a></li> --}}
                        {{-- <li><a href="followup-records.php" data-key="t-product-detail">Follow Records</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="repeat"></i>
                        <span data-key="t-ecommerce">Match</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('panel.find-match') }}" key="t-products">Serach Match</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-ecommerce">Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="employee-list.php" key="t-products">Employee List</a></li>
                        <li><a href="#" data-key="t-product-detail">Appointment List</a></li>
                        <li><a href="daily-report.php" key="t-products">Daily Report</a></li>
                        <li><a href="#" data-key="t-product-detail">Finance Report</a></li>
                        <li><a href="meeting-report.php" key="t-products">Meetings Report</a></li>
                        <li><a href="edit-log-report.php" data-key="t-product-detail">Edit Log Report</a></li>
                        <li><a href="followup-auto-log.php" key="t-products">Followup Auto Report</a></li>
                        <li><a href="attendance-report.php" data-key="t-product-detail">Attendance Reports</a></li>
                        <li><a href="#" data-key="t-product-detail">My Future Calls</a></li>
                        <li><a href="no-touch-client.php" key="t-products">No Touch Clints</a></li>
                        <li><a href="no-meeting-report.php" data-key="t-product-detail">No Meetings Reports</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i data-feather="message-square"></i>
                        <span data-key="t-chat">Chat</span>
                    </a>
                </li>
                --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-ecommerce">Others</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="#" key="t-products">Sent Package</a></li> --}}
                        {{-- <li><a href="#" data-key="t-product-detail">Print Request</a></li> --}}
                        <li><a href="{{ route('fix-member.index') }}" key="t-products">Fix/Active</a></li>
                        {{-- <li><a href="#" data-key="t-product-detail">Sent Massage</a></li>
                        <li><a href="#" key="t-products">View Massage</a></li>
                        <li><a href="#" data-key="t-product-detail">Add Attendance</a></li>
                        <li><a href="#" key="t-products">Reminder</a></li>
                        <li><a href="#" data-key="t-product-detail">Wrong Email</a></li>
                        <li><a href="#" data-key="t-product-detail">Web Data</a></li>
                        <li><a href="#" key="t-products">Chat Report</a></li> --}}
                    </ul>
                </li>

            </ul>

            <!--<div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
                            <div class="card-body">
                                <img src="/assets/images/giftbox.png" alt="">
                                <div class="mt-4">
                                    <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                                    <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                                    <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                                </div>
                            </div>
                        </div>-->
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

@include('components.direct-meeting-modal')