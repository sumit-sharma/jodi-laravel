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
                                <h4 class="mb-sm-0 font-size-18">Fresh Calls</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                        <li class="breadcrumb-item active">Fresh Calls</li>
                                    </ol>
                                </div>
                            </div>
                            </div>
                        
                        <hr>
							<form id="frmFreshCall" action="{{ route('save-fresh-call') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        
                                    <div class="col-6 mt-2">	
                                        <label for="call_by" class="form-label">Call By</label>
                                        <input class="form-control"  type="text" value="{{ auth()->user()->username.'-'.auth()->user()->name }}"   disabled>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-6 mt-2">	
                                        <label for="callsource" class="form-label">Source of Calls</label>
                                        <input class="form-control" name="callsource" type="text" id="callsource" required>
                                    </div>
                                    <div class="col-6 mt-2">	
                                        <label for="noofcalls" class="form-label">	No of Calls Done </label>
                                        <input class="form-control" name="noofcalls" type="text" id="noofcalls" required>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-6 mt-2">	
                                        <label for="callsconnected" class="form-label">No of Calls Connected</label>
                                        <input class="form-control" name="callsconnected" type="text" id="callsconnected" required>
                                    </div>
                                    <div class="col-6 mt-2">	
                                        <label for="followupcalls" class="form-label">	No of followupcalls </label>
                                        <input class="form-control" name="followupcalls" type="text" id="followupcalls" required>
                                    </div>
                                    <div class="clearfix"></div>
                                        
                                    <input type="hidden" name="empid" value="{{ auth()->user()->username }}" />
                                    <div class="col-md-12 col-12 mt-4">
                                        <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Save Calls</button>
                                    </div>
                                    
                                    </div>
                                </div>
                            </form>			
                            
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
                        <!-- end row-->


</div> <!-- container-fluid -->
@endsection

@section('footer-script')
<script>
    $(document).ready(function() {
        $('#frmFreshCall').validate({
            rules: {
                callsource: {
                    required: true
                },
                noofcalls: {
                    required: true,
                    digits: true
                },
                callsconnected: {
                    required: true,
                    digits: true
                },
                followupcalls: {
                    required: true,
                    digits: true
                }
            },
            messages: {
                callsource: {
                    required: "Please enter source of calls"
                },
                noofcalls: {
                    required: "Please enter no of calls done"
                },
                callsconnected: {
                    required: "Please enter no of calls connected"
                },
                followupcalls: {
                    required: "Please enter no of followup calls"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status == "success") {
                            $("#frmFreshCall").trigger("reset");
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
</script>
@endsection