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
                                    <h4 class="mb-sm-0 font-size-18">Intraction</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">Intraction</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Reference No.</label>
                                        <input class="form-control" type="text" value="" id="">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Name </label>
                                        <input class="form-control" type="text" value="" id="">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Met With </label>
                                        <input class="form-control" type="text" value="" id="">
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Member</label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter member"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Current Profession </label>
                                        <textarea name="" class="form-control" form="" rows="4"
                                            placeholder="Enter current profession details" spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Family Outlook </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter family outlook"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Properties</label>
                                        <select class="form-select">
                                            <option>Select</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">&nbsp; </label>
                                        <select class="form-select">
                                            <option>Select</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">&nbsp; </label>
                                        <select class="form-select">
                                            <option>Select</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-12 mt-3">
                                        <label for="" class="form-label">Properties Details </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Residence </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Business </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Income </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Rented Income </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Turnover </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Vehicle </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mt-3">
                                        <label for="" class="form-label">Any Roka Earlier </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="" class="form-label">Remarks </label>
                                        <textarea name="" class="form-control" form="" rows="4" placeholder="Enter details"
                                            spellcheck="false"></textarea>
                                    </div>
                                    <div class="clearfix"></div>


                                    <div class="col-12 mt-4">
                                        <button type="button"
                                            class="btn btn-primary w-lg waves-effect waves-light">Add/Upadte More
                                            Info</button>
                                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Edit
                                            More Info</button>
                                    </div>

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
