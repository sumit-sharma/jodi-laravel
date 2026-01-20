@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <div class="row">


            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">

                        <!-- Page Title -->
                        <div class="row mb-3">
                            <div class="col-12 d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Send Self Profile</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Main</a></li>
                                    <li class="breadcrumb-item active">Send Self Profile</li>
                                </ol>
                            </div>
                        </div>

                        <hr>

                        <!-- Form Start -->
                        <form method="post" action="{{ route('panel.send-self-profile') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Enter RNo</label>
                                    <input class="form-control" type="text" name="rno" value="{{ old('rno') }}"
                                        required>
                                </div>
                                <!-- Department -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Pdf Type</label>
                                    <select class="form-select" name="pdftype" required>
                                        <option value="">Select</option>
                                        <option value="1" selected>Pdf-1</option>
                                        <option value="2">Pdf-2</option>
                                    </select>
                                </div>

                                <!-- User ID -->


                                <!-- Submit -->
                                <div class="col-md-12 text-left mt-3">
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">
                                        Send
                                    </button>
                                </div>

                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>



        </div>
        <!-- end row-->


    </div>
@endsection