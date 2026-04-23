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
                                    <h4 class="mb-sm-0 font-size-18">View Finance</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Finance</a></li>
                                            <li class="breadcrumb-item active">View Finance</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>



                            {{-- <div class="col-md-8 col-12">
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
                            </div> --}}
                            <div class="clearfix"></div>

                            <div class="col-md-3 col-3 mb-3">
                                <label for="" class="form-label">Enter Password</label>
                                <input class="form-control" type="password" value="" id="paypwd"
                                    placeholder="enter password">
                            </div>
                            <div class="col-md-3 col-3" style="margin-top:27px;">
                                <button type="button" id="showAmt" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-smile font-size-16 align-middle me-2"></i> Login
                                </button>
                            </div>
                            <p id="errorMsg" class="text-danger"></p>
                            <div class="clearfix"></div>



                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Package</th>
                                                    <th data-priority="2" width="">Service</th>
                                                    <th data-priority="3" width="">TC</th>
                                                    <th data-priority="4" width="">TL</th>
                                                    <th data-priority="5" width="">RM</th>
                                                    <th data-priority="6" width="">Duration</th>
                                                    <th data-priority="7" width="">Other Details</th>
                                                    {{-- <th data-priority="8" width="">Amount</th>
                                                    <th data-priority="9" width="">Date</th>
                                                    <th data-priority="10" width="">Details</th> --}}
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @if ($profile)
                                                    <tr>
                                                        <td>{{ getPackage($profile->package) }}</td>
                                                        <td>{{ $profile->service }}</td>
                                                        <td>{{ $profile->tc }}</td>
                                                        <td>{{ $profile->tl }}</td>
                                                        <td>{{ $profile->rm }}</td>
                                                        <td>{{ $profile->duration }}</td>
                                                        <td>{{ $profile->otherdetails }}</td>
                                                        {{-- <td>{{ $item->amount }}</td>
                                                        <td>{{ $item->date }}</td>
                                                        <td>{{ $item->details }}</td> --}}
                                                    </tr>
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div id="amt_det" class="col-md-12 col-12 mt-4 d-none">
                                <h5>Amount Details</h5>
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-2" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Ser. No</th>
                                                    <th data-priority="2" width="">Amount</th>
                                                    <th data-priority="3" width="">Date</th>
                                                    <th data-priority="4" width="">Details</th>
                                                </tr>
                                            </thead>
                                            <tbody class="pdng_d"></tbody>
                                        </table>
                                    </div>

                                </div>
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
        $(function () {
            $("#showAmt").click(function () {
                var password = $("#paypwd").val();
                if (password == "") {
                    alert("Please enter password");
                    return;
                }
                $.ajax({
                    url: "{{ route('finance.get-payment-list') }}",
                    type: "POST",
                    data: {
                        password: password,
                        _token: "{{ csrf_token() }}",
                        rno: "{{ $rno }}",
                    },
                    success: function (response) {
                        if (response.status == "error") {
                            $("#errorMsg").html(response.message);
                        } else {
                            let html = '';
                            let key = 1;
                            Object.entries(response.data.payments).forEach(([ind, value]) => {
                                html += `<tr><td>${key++}</td><td>${value.amount}</td><td>${convertDate(value.dated)}</td><td>${value.details}</td></tr>`;
                            });
                            $("#tech-companies-2 tbody").html(html);
                        }
                    }
                });
            });

        });
    </script>
@endsection