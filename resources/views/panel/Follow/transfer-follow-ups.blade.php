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
                                              <h4 class="mb-sm-0 font-size-18">Transfer All Followup</h4>
                                              <div class="page-title-right">
                                                  <ol class="breadcrumb m-0">
                                                      <li class="breadcrumb-item"><a href="javascript: void(0);">Follow</a></li>
                                                      <li class="breadcrumb-item active">Transfer All Followup</li>
                                                  </ol>
                                              </div>
                                           </div>
                                          </div>
										
										<hr>
										
										<div class="col-md-12 col-12">
											<div class="row">
												<form method="post" action="{{ route('panel.transfer-all-followups') }}">
													@csrf
											<div class="col-md-3 col-12 mt-2">	
												<label for="example-text-input" class="form-label">Followup From</label>
                                                <select class="form-select" required name="followupfrom">
                                                    <option value="">Select</option>
													@foreach ( $followups as $follow )													
                                                    <option value="{{ $follow->username }}">{{ $follow->username.'-'.$follow->name }}</option>
													@endforeach
                                                    
                                                </select>
											</div>
											<div class="col-md-3 col-12 mt-2">	
												<label for="example-text-input" class="form-label">	Followup to </label>
                                                <select class="form-select" required name="followupto">
                                                    <option value="">Select</option>
                                                    @foreach ( $followto as $follow )													
                                                    <option value="{{ $follow->username }}">{{ $follow->username.'-'.$follow->name }}</option>
													@endforeach
                                                    
                                                </select>
											</div>
											<div class="clearfix"></div>
												
											
											<div class="col-md-12 col-12 mt-4">
												<button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Move</button>
											</div>
                                            </form>
                                        	</div>
										</div>
										
									</div>
                                </div><!-- end card -->
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->

@endsection