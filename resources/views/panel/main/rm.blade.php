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
                                    <h4 class="mb-sm-0 font-size-18">TRANSFER RM</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">TRANSFER RM</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <form id="frmAddCaste" action="{{ route('panel.rm-transfer') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Transfer all Cases from</label>
                                            <select class="form-control" name="oldrm" id="oldrm" required>
                                                <option value="">--Select--</option>
                                                @foreach($rmData as $rm)
                                                    <option value="{{ $rm->username }}">
                                                        {{ $rm->details ? $rm->details->loginname : '' }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">To New RM Code</label>
                                            <select class="form-control" name="newrm" id="newrm">
                                                <option value="">--Select--</option>
                                                @foreach($newrmData as $rm)
                                                    <option value="{{ $rm->username }}">
                                                        {{ $rm->details ? $rm->details->loginname : '' }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="caste" class="form-label">Member Type</label>
                                                <select class="form-control" name="pn">
                                                    <option value="N" selected>Non Paid</option>
                                                    <option value="P">Paid</option>
                                                    <option value="N,P">Both</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="caste" class="form-label">Member Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="A" selected="selected">Active</option>
                                                    <option value="F">Fixed</option>
                                                    <option value="A,F">Both</option>
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