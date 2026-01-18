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
                                    <h4 class="mb-sm-0 font-size-18">UPDATE TIMINGS</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">UPDATE TIMINGS</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <form id="frmAddCaste" action="{{ route('panel.update-timings') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label">Employee</label>
                                            <select class="form-control" name="user_id" id="user_id" required>
                                                <option value="">--Select--</option>
                                                @foreach($detail as $emp)
                                                    <option value="{{ $emp->user_id }}">
                                                        {{ $emp->loginname }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">In Time</label>
                                            <select class="form-control" name="intime" id="intime" required>
                                                <option value="">--Select--</option>
                                                @for ($hour = 8; $hour <= 22; $hour++)
                                                    @foreach (['00', '30'] as $minute)
                                                        @php
                                                            $time = sprintf('%02d:%s', $hour, $minute);
                                                        @endphp

                                                        <option value="{{ $time }}">{{ $time }}</option>
                                                    @endforeach
                                                @endfor
                                            </select>

                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="caste" class="form-label">Out Time</label>
                                                <select class="form-control" name="outtime" required>
                                                <option value="">--Select--</option>
                                                    @for ($i = 800; $i <= 2200; $i += 30)
                                                        @php
                                                            if (substr($i, -2) > 59) {
                                                                $i += 40;
                                                            }

                                                            if ($i > 0 && $i < 10) {
                                                                $i = "000" . $i;
                                                            } elseif ($i >= 10 && $i < 100) {
                                                                $i = "00" . $i;
                                                            } elseif ($i >= 100 && $i < 1000) {
                                                                $i = "0" . $i;
                                                            }

                                                            $k1 = substr($i, 0, 2);
                                                            $k2 = substr($i, 2, 2);
                                                            $ii = $k1 . ':' . $k2;
                                                        @endphp

                                                        @if ($k1 != "00")
                                                            <option value="{{ $ii }}">{{ $ii }}</option>
                                                        @endif
                                                    @endfor

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="caste" class="form-label">Weekly Off</label>
                                                <select class="form-control" name="offday" required>
                                                    <option value="">-- Select Day --</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
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