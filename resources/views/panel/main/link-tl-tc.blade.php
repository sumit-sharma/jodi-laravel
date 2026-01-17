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
                            <form id="frmAddCaste" action="{{ route('panel.link-tl-tc') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Select TL</label>
                                            <select class="form-control" name="tl" id="tl" required>
                                                <option value="">--Select--</option>
                                                @foreach($tltcData as $tltc)
                                                    <option value="{{ $tltc->username }}">{{ $tltc->details?$tltc->details->loginname:'' }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">All Linked TC</label>
                                            <select class="form-control" name="linked" id="linked">
                                                @foreach($linkedData as $link)
                                                    <option value="">
                                                        {{ $link->tl . '-' . $link->loginname . '::' . $link->tc . '-' . $link->loginname1 }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="caste" class="form-label">Add New TC</label>
                                                <select class="form-control" name="tc">
                                                    <option value="">--Select--</option>
                                                    @foreach($tcData as $tc)
                                                        <option value="{{ $tc->username }}">{{ $tc->details?$tc->details->loginname:'' }}</option>
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
            $("#religion").change(function () {
                let religionCode = $(this).val();
                let url = "{{ route('get-caste', ['religion' => ':religion']) }}"; // placeholder :id
                url = url.replace(':religion', religionCode);

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        const select = document.getElementById('caste-list');
                        select.innerHTML = '';
                        console.log(data.data);
                        data.data.forEach(element => {
                            const option = document.createElement('option');
                            option.value = element.id;
                            option.textContent = element.name;
                            select.appendChild(option);
                        });
                    })
                    .catch(err => console.error(err));
            });


            $("#frmAddCaste").validate({
                rules: {
                    religion: {
                        required: true
                    },
                    caste: {
                        required: true,
                        remote: {
                            url: "{{ route('panel.check-exist') }}",
                            type: "POST",
                            data: {
                                table: 'castes',
                                whereArray: {
                                    religion_code: function () {
                                        return $("#religion").val();
                                    },
                                    name: function () {
                                        return $("#caste").val();
                                    }
                                }
                            }
                        }
                    },
                },
                messages: {
                    caste: {
                        required: "Caste is required.",
                        remote: "Caste already exists."
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            })
        });
    </script>
@endsection