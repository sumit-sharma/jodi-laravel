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
                                    <h4 class="mb-sm-0 font-size-18">LINK TL-TC</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">LINK TL-TC</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <form id="frmLinkTlTC" action="{{ route('panel.link-tl-tc') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Select TL</label>
                                            <select class="form-control select2-notag" name="tl" id="tl" required>
                                                <option value="">Select</option>
                                                @foreach($tltcData as $tltc)
                                                    <option value="{{ $tltc->username }}">
                                                        {{ $tltc->username . '-' . $tltc->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">All Linked TC</label>
                                            <select name="linked" class="form-select" id="linked" disabled multiple>
                                                @foreach($linkedData as $link)
                                                    <option>
                                                        {{ $link->tl . '-' . $link->linkedTL?->name . '::' . $link->tc . '-' . $link->linkedTC?->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="caste" class="form-label">Add New TC</label>
                                                <select class="form-control select2-notag" name="tc" required>
                                                    <option value="">Select</option>
                                                    @foreach($tcData as $tc)
                                                        <option value="{{ $tc->username }}">
                                                            {{ $tc->username . '-' . $tc->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-12 mt-3">
                                            <button type="submit"
                                                class="btn btn-primary w-lg waves-effect waves-light">Save</button>
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
        <!-- end row-->


    </div>
@endsection

@section('footer-script')
    <script>
        $(document).ready(function () {

            $("#frmLinkTlTC").validate({
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
                    tl: {
                        required: true
                    },
                    tc: {
                        required: true
                    },
                },
                messages: {
                    tl: {
                        required: "TL is required"
                    },
                    tc: {
                        required: "TC is required"
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                }
            })
        });
    </script>
@endsection