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
                                    <h4 class="mb-sm-0 font-size-18">My Personal Information</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">Update My Info</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-12">
                                <form method="post" action="{{ route('panel.update-my-info') }}">
                                 @csrf
                                <div class="row">
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label">My ID. & Name</label>
                                        <input class="form-control" type="text" value="{{ auth()->user()->username .'-'.auth()->user()->name}}" id="example-text-input"
                                            disabled>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label"> Original Name </label>
                                        <input class="form-control" type="text" name="loginname" required value="{{ $detail->loginname }}" id="example-text-input">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label"> Date of Birth</label>
                                        <input class="form-control" type="date" name="dob" required value="{{ $detail->dob }}" id="example-date-input">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label"> Joining Date </label>
                                        <input class="form-control" type="date" name="joiningdate" required value="{{ $detail->joiningdate }}" id="example-date-input">
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label"> Anniversary</label>
                                        <input class="form-control" type="date" name="anniversary" required value="{{ $detail->anniversary }}" id="example-date-input">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label"> Father's Name </label>
                                        <input class="form-control" type="text" name="father_name" required value="{{ $detail->father_name }}" id="example-text-input">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input" class="form-label"> Mobile No.</label>
                                        <input class="form-control" type="tel" name="mobile" required value="{{ auth()->user()->mobile }}" id="example-text-input">
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="example-text-input"  required class="form-label"> Type of Mobile No. </label>
                                        <select class="form-select" name="mobile_type">
                                            <option value="">Select</option>
                                            <option value="Personal" @if($detail->mobile_type=='Personal'){{ 'selected' }}@endif>Personal</option>
                                            <option value="Office" @if($detail->mobile_type=='Office'){{'selected'}}@endif>Office</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mt-3">
                                        <div class="mb-3">
                                            <label for="basicpill-address-input" class="form-label">Current Contact
                                                Address</label>
                                            <textarea id="basicpill-address-input" name="curr_address" required class="form-control" rows="6"
                                                spellcheck="false"
                                                aria-label="To enrich screen reader interactions, please activate Accessibility in Grammarly extension settings">{{ $detail->curr_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="mb-3">
                                            <label for="basicpill-address-input" class="form-label">Permanent Contact
                                                Address</label>
                                            <textarea id="basicpill-address-input" name="per_address" required class="form-control" rows="6"
                                                spellcheck="false"
                                                aria-label="To enrich screen reader interactions, please activate Accessibility in Grammarly extension settings">{{$detail->per_address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-12 mt-4">
                                        <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Update
                                            My Info</button>
                                    </div>

                                </div>
                                </form>
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