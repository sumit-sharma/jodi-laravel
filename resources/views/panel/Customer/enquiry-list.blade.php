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
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">
                                        @if (isset($rno))
                                        {{ fetchCustomerByrno($rno)?->refname . ': ' . $rno }}
                                        @else
                                        Show All Enquiry
                                        @endif
                                    </h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Enquiry List</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>



                            <div class="col-md-8">
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
                            <div class="col-md-2">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $enquiries->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>




                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered table-sm align-middle"
                                            style="table-layout: fixed; width: 100%;">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1">SI No.</th>
                                                    <th data-priority="2">Ref No.</th>
                                                    <th data-priority="3">Ref Name</th>
                                                    <th data-priority="4">Dated</th>
                                                    <th data-priority="5">Time</th>
                                                    <th data-priority="6">EmpId</th>
                                                    <th data-priority="7">Enq. Purpose</th>
                                                    <th data-priority="8">Remarks</th>
                                                    <th data-priority="9">Further Action</th>
                                                    <th data-priority="10">SL</th>
                                                    <th data-priority="11">Up By</th>
                                                    <th data-priority="12">Update Date</th>
                                                    <th data-priority="13">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @forelse ($enquiries as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->rno }}</td>
                                                        <td>{{ fetchCustomerByrno($item->rno)?->refname }}</td>
                                                        <td>{{ convertCommonDate($item->dated) }}</td>
                                                        <td>{{ convertCommonDate($item->time, 'h:i A') }}</td>
                                                        <td>{{ $item->empid }}</td>
                                                        <td>{{ $item->enqpur }}</td>
                                                        <td>{{ $item->remarks }}</td>

                                                        <td>
                                                            @if ($item->status == 0)
                                                            <a  href="javascript:;" data-rno="{{ $item->rno }}" data-refname="{{ fetchCustomerByrno($item->rno)?->refname }}" data-enquiry_id="{{ $item->id }}" class="btnUpdateEnquiry">Update</a>
                                                            @else
                                                            {{ $item->furtheraction }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->slfor }}</td>
                                                        <td>{{ $item->updatedby }}</td>
                                                        <td>{{ $item->updatedatetime }}</td>
                                                        <td>{{ $item->status == 0 ? 'Pending' : 'Done' }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">No Enquiries Found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>

                                        </table>
                                        {{ $enquiries->links() }}
                                    </div>


                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
        <!-- end row-->
        @include('components.update-enquiry-modal')

    </div> <!-- container-fluid -->
@endsection

@section('footer-script')
<script>
    $(function(){
        $(".btnUpdateEnquiry").click(function(){
            var enquiry_id = $(this).data('enquiry_id');
            $("#updateEnquiryModal #updateEnquiryModal_enquiry_id").data('enquiry_id', enquiry_id);
            $("#updateEnquiryModal #updateEnquiryModal_rno").val($(this).data('rno'));
            $("#updateEnquiryModal #updateEnquiryModal_refname").val($(this).data('refname'));
            $("#updateEnquiryModal").modal('show');
        })

        $("#frmUpdateEnquiry").validate({
            rules: {
                further_action: {
                    required: true,
                },
            },
            messages: {
                further_action: {
                    required: "Please enter further action",
                },
            },
            submitHandler: function(form) {
                var enquiry_id = $("#updateEnquiryModal #updateEnquiryModal_enquiry_id").data('enquiry_id');
                var url = "{{ route('update-enquiry', ['id' => ':id']) }}";
                url = url.replace(':id', enquiry_id);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            location.reload();
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
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                });
            }
        });
    });
</script>
@endsection