@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <div class="row">
            <div id="feedback_section" class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add Feedback & Sent Mail</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item active">Sent Mail</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <h5 class="">Add Feedback</h5>
                            <form id="frmSaveFeedback" action="{{ route('save-feedback') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <label for="example-text-input" class="form-label">Reference No:</label>
                                            <input class="form-control bg-secondary-subtle" type="text" value="{{ $rno }}"
                                                id="" disabled>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <label for="example-text-input" class="form-label">Name: </label>
                                            <input class="form-control bg-secondary-subtle" type="text"
                                                value="{{ fetchCustomerByrno($rno)->refname }}" id="" disabled>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <label for="example-text-input" class="form-label"> Proposal </label>
                                            <select name="proposal" class="form-select select2-notag" required>
                                                <option value="">Select</option>
                                                @foreach ($sendMailProposals as $proposal)
                                                    <option value="{{ $proposal->proposal }}">
                                                        {{ $proposal->proposal . '-' . $proposal->receiver->refname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <label for="example-text-input" class="form-label"> Feedback Status </label>
                                            <select name="fstatus" class="form-select" required>
                                                <option value="0">No</option>
                                                <option value="1" selected="selected">Yes</option>
                                                <option value="2">Can't Decide Now</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <label for="example-text-input" class="form-label"> Feedback Details </label>
                                            <select id="feedback" name="feedback" class="form-select select2-notag"
                                                required>
                                                <option value="">Select</option>
                                                @foreach ($feedbackOptions as $item)
                                                    <option value="{{ $item->feedback }}">{{ $item->feedback }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <input type="hidden" name="rno" value="{{ $rno }}">

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Send
                                        Feedback</button>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>


            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <h5 class="">Sent Mail List</h5>
                        <div class="row">

                            <div class="col-md-8 col-12">
                                {{-- <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bxs-eraser label-icon"></i> Remove</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</button>
                                </div> --}}
                            </div>
                            <div class="col-md-2 col-12">
                                {{-- <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form> --}}
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $sendMails->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">EmpID</th>
                                                    <th data-priority="2" width="">Date</th>
                                                    <th data-priority="3" width="">Time</th>
                                                    <th data-priority="4" width="">Mail To</th>
                                                    <th data-priority="5" width="">Name</th>
                                                    <th data-priority="6" width="">Proposal</th>
                                                    <th data-priority="7" width="">Prop Name</th>
                                                    <th data-priority="8" width="">Photos</th>
                                                    <th data-priority="9" width="">W/C</th>
                                                    <th data-priority="10" width="">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($sendMails as $row)
                                                    <tr>
                                                        <td>{{ $row->empid }}</td>
                                                        <td>{{ $row->dated }}</td>
                                                        <td>{{ $row->time }}</td>
                                                        <td>{{ $row->rno }}</td>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $row->rno }}">
                                                                {{ $row->sender?->refname ?? '' }}</a>
                                                        </td>
                                                        <td>{{ $row->proposal }}</td>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $row->proposal }}">
                                                                {{  $row->receiver?->refname ?? '' }}</a>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $row->photos) as $key => $photo)
                                                                @php
                                                                    $extension = pathinfo($photo, PATHINFO_EXTENSION);
                                                                    // If no extension, suffix .jpg to the photo filename
                                                                    $photoWithExtension = $extension ? $photo : $photo . '.jpg';
                                                                @endphp

                                                                @if (Storage::disk('public')->exists('uploads/customer/' . $photoWithExtension))
                                                                    <a href="{{ url('/uploads/customer/' . $photoWithExtension) }}"
                                                                        class="image-popup"
                                                                        data-lightbox="{{ 'gallery_' . $row->rno . '_' . $row->proposal }}">
                                                                        {{-- <img src="/uploads/customer/{{ $photo }}" width="100%" />
                                                                        --}}
                                                                        {{ 'Photo ' . ++$key }}
                                                                    </a>

                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $row->wc == 1 ? 'C' : '--' }}</td>
                                                        <td>{{ $row->addl_st }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $sendMails->links() }}
                                    </div>
                                </div>
                                @include('components.biodata_modal')
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
    <!-- lightbox2 -->
    <link href="/assets/plugins/lightbox2/css/lightbox.css" rel="stylesheet">
    <script src="/assets/plugins/lightbox2/js/lightbox.js"></script>

    <script>
        $(function () {
            $('#frmSaveFeedback').validate({
                ignore: ':hidden:not(.select2-hidden-accessible)',
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                errorPlacement: function (error, element) {
                    if (element.hasClass('select2-hidden-accessible')) {
                        error.insertAfter(element.next('.select2')); // place after Select2
                    } else {
                        error.insertAfter(element);
                    }
                },

                highlight: function (element) {
                    $(element).next('.select2').find('.select2-selection')
                        .addClass('is-invalid');
                },

                unhighlight: function (element) {
                    $(element).next('.select2').find('.select2-selection')
                        .removeClass('is-invalid');
                },
                rules: {
                    'proposal': {
                        required: true
                    },
                    'fstatus': {
                        required: true
                    },
                    'feedback': {
                        required: true
                    }
                },
                messages: {
                    'proposal': {
                        required: 'Proposal is required'
                    },
                    'fstatus': {
                        required: 'Status is required'
                    },
                    'feedback': {
                        required: 'Feedback is required'
                    }
                },
                submitHandler: function (form) {
                    // form.submit();
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                }).then((result) => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: xhr.responseJSON.message,
                            });
                        }
                    });

                }
            });
        });
    </script>


@endsection