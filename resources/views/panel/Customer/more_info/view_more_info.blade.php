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
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View More Info</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">View More Info</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Reference No.</label>
                                        <div class="label-form">{{ $rno }}</div>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Name </label>
                                        <div class="label-form">{{ $bio->refname }}</div>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Met With </label>
                                        @php
                                            $name = "--";
                                            foreach ($employees as $item) {
                                                if ($moreInfo->metwith == $item->username) {
                                                    $name = $item->username . '-' . $item->name;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <div class="label-form">{{ $name }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Member</label>
                                        <div class="label-form">{{ $moreInfo->member }}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Current Profession </label>
                                        <div class="label-form">{{ $moreInfo->profession }}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Family Outlook </label>
                                        <div class="label-form">{{ $moreInfo->family }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Properties</label>
                                        <div class="label-form">{{ $moreInfo->prop1 }}</div>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">&nbsp; </label>
                                        <div class="label-form">{{ $moreInfo->prop2 }}</div>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">&nbsp; </label>
                                        <div class="label-form">{{ $moreInfo->prop3 }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-12 mt-3">
                                        <label for="" class="form-label">Properties Details </label>
                                        <div class="label-form">{{ $moreInfo->properties }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Residence </label>
                                        <div class="label-form">{{ $moreInfo->residence }}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Business </label>
                                        <div class="label-form">{{ $moreInfo->business }}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Income </label>
                                        <div class="label-form">{{ $moreInfo->income }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Rented Income </label>
                                        <div class="label-form">{{ $moreInfo->rentedincome }}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Turnover </label>
                                        <div class="label-form">{{ $moreInfo->turnover }}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Vehicle </label>
                                        <div class="label-form">{{ $moreInfo->vehicle }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mt-3">
                                        <label for="" class="form-label">Any Roka Earlier </label>
                                        <div class="label-form">{{ $moreInfo->roka }}</div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="" class="form-label">Remarks </label>
                                        <div class="label-form">{{ $moreInfo->remarks }}</div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>


        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection