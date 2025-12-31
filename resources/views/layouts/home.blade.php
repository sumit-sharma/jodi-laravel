<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Elite Marriage Bureau - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/js-logo.webp">


    <link rel="stylesheet" href="/assets/css/style2.css" type="text/css" />

    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="/assets/libs/twitter-bootstrap-wizard/prettify.css">


    <!-- plugin css -->
    <link href="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body data-topbar="dark" data-sidebar="brand">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('components.header_new')


        <!-- start main content -->
        <div class="main-content">

            <div class="page-content">


                <!-- start page title -->
                <!--<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Horizontal</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                            <li class="breadcrumb-item active">Horizontal</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>-->
                <!-- end page title -->

                @yield('main-content')


            </div>
            <!-- End Page-content -->



            @include('components.footer')


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->










    @include('components.footer-js')

    <script>
        function debounce(func, delay) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }
    </script>

    @yield('footer-script')

    <x-toast />

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(function () {
            $('.select2-tag').select2({
                tags: true,
                placeholder: "Select or type to Search",
                allowClear: true,
            });

            $('.select2-notag').select2({
                placeholder: "Select or type to Search",
                allowClear: true,
            })
        });
    </script>


    @yield('bottom-section')

    @yield('bottom-js')

</body>

</html>