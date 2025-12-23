@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <div class="row">


            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <form action="#" id="frmUpdateClientSL" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18">Update Proposal</h4>

                                    </div>
                                </div>
                                <input type="hidden" name="rno" value="{{ $rno }}" />
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-0">
                                            <label class="form-label">Proposal </label>
                                            <select class="form-select select2-notag" name="proposal" id="sel_proposal">
                                                <option value="">Select</option>
                                                @foreach ($clientSLNotOkData as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->proposal . ' -' . $item->vp->refname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label id="sel_proposal-error" class="error" for="sel_proposal"></label>
                                        </div>
                                        <div class="col-md-3 mt-0">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="0" disabled selected>Select</option>
                                                <option value="1">OK</option>
                                                <option value="2">NI</option>
                                                <option value="3">WGB</option>
                                                <option value="4">RNG</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-0">
                                            <label class="form-label">Remark</label>
                                            <textarea name="remarks" class="form-control" rows="1"
                                                spellcheck="false"></textarea>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary w-lg waves-effect waves-light">Update</button>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>

            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Client SL List</h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $clientSLData->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Prop RNo</th>
                                                    <th data-priority="2" width="">Prop Name</th>
                                                    <th data-priority="3" width="">Dated</th>
                                                    <th data-priority="4" width="">Time</th>
                                                    <th data-priority="5" width="">SL By</th>
                                                    <th data-priority="6" width="">Status</th>
                                                    <th data-priority="7" width="">Remarks</th>
                                                    <th data-priority="8" width="">Done By</th>
                                                    <th data-priority="9" width="">Done Date</th>
                                                    {{-- <th data-priority="10" width="">Delete</th>
                                                    <th data-priority="11" width="">Update</th> --}}
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($clientSLData as $clientSL)
                                                    <tr>
                                                        <td>{{ $clientSL->proposal }}</td>
                                                        <td class="{{ $clientSL->vp->status == 'F' ? 'bg-pink' : '' }}">
                                                            {{ $clientSL->vp->refname }}
                                                        </td>
                                                        <td>{{ $clientSL->dated }}</td>
                                                        <td>{{ $clientSL->time }}</td>
                                                        <td>{{ $clientSL->slby }}</td>
                                                        <td>{{ $clientSL->status->label() }}</td>
                                                        <td>{{ $clientSL->remarks }}</td>
                                                        <td>{{ $clientSL->done_by }}</td>
                                                        <td>{{ $clientSL->done_date }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $clientSLData->links() }}
                                    </div>
                                    @include('components.biodata_modal')
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



            $("#frmUpdateClientSL").validate({
                rules: {
                    proposal: {
                        required: true
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    proposal: {
                        required: "Please select proposal"
                    },
                    status: {
                        required: "Please select status"
                    }
                },
                submitHandler: function (form) {
                    const formData = new FormData(form);
                    const id = $("#sel_proposal").val()
                    url = "{{ route('update-client-sl', ['id' => ':id']) }}"
                    url = url.replace(':id', id);
                    console.log("formData", formData);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == 'success') {
                                toastr.success(response.message);
                                location.reload();
                            }
                        },
                        error: function (response) {
                            console.log(response.responseJSON);
                            toastr.error(response.responseJSON);
                        }
                    });


                }
            });









        });
    </script>
@endsection