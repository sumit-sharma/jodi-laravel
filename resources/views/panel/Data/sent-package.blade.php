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
                                    <h4 class="mb-sm-0 font-size-18">Sent Package</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item active">Sent Package</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-2 mt-2">
                                        <label for="example-text-input" class="form-label">Reference No:</label>
                                        <input class="form-control" type="text" value="">
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <label for="example-text-input" class="form-label">Email ID: </label>
                                        <input class="form-control" type="text" value="">
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <label for="example-text-input" class="form-label"> Package Type: </label>
                                        <select class="form-select">
                                            <option>Select</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <label for="example-text-input" class="form-label"> Package Amount: </label>
                                        <select class="form-select">
                                            <option>Select</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-8 mt-4">
                                        <label for="" class="form-label"> Feedback Details </label>
                                        <textarea id="" class="form-control" rows="5" spellcheck="false"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-12 mt-4">
                                <button type="button" class="btn btn-primary w-lg waves-effect waves-light">Send
                                    Package</button>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>



        </div>
        <!-- end row-->


    </div>
@endsection