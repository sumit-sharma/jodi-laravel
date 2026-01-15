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
									<h4 class="mb-sm-0 font-size-18">{{ $action }} Advt Data</h4>
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
											<li class="breadcrumb-item active">{{ $action }} Advt Data</li>
										</ol>
									</div>
								</div>
							</div>

							<hr>

							<div class="col-md-12 col-12">
								<form id="frmSaveAdvtData" action="{{ route('save-advtdata') }}" method="POST">
									@csrf
									<div class="row">
										@if ($action == 'Edit')
										<div class="col-4 mt-2">
												<label for="example-text-input" class="form-label">Ref No</label>
												<input class="form-control" type="text" name="rno" value="{{ $advtdata->rno }}" id="rno">
											</div>
										<div class="col-4 mt-2">
												<label for="example-text-input" class="form-label">Name</label>
												<input class="form-control" type="text" name="rno" value="{{ fetchCustomerByrno($advtdata->rno)->refname }}">
											</div>
										@else
											<div class="col-8 mt-2"></div>
										@endif

										<div class="col-4 mt-2">
											<label for="example-text-input" class="form-label"> E-Date</label>
											<input class="form-control" name="edate" type="text" value="{{ now()->format('Y-m-d') }}"
												id="example-text-input" aria-label="Disabled input example" readonly>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="row">
										<div class="col-3 mt-2">
											<label for="example-text-input" class="form-label"> Match
												for</label>
											<select name="matchfor" class="form-select" required>
												<option value="">Select</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>
										<div class="col-3 mt-2">
											<label for="example-text-input" class="form-label">Age</label>
											<input class="form-control" type="text" value="" id="age" name="age" required>
										</div>

										<div class="col-3 mt-2">
											<label for="example-text-input" class="form-label"> Height (Ft &
												Inches)</label>
											<select id="hght" name="hght" class="form-select" required>
												<option value="">Select</option>

												@for ($k = 400; $k <= 700; $k++)
													@if (substr($k, -2) == 12)
														@php $k = $k + 88; @endphp
													@endif

													@php
														$f1 = substr($k, 0, 1);
														$f2 = substr($k, 1, 2);
														if ($f2 == '00') {
															$f2 = 0;
														}
														$f = $f1 . "' " . $f2;
													@endphp

													<option value="{{ $k }}">{{ $f }}</option>
												@endfor
											</select>
										</div>
										<div class="col-3 mt-2">
											<label for="example-text-input" class="form-label">&nbsp;</label>
											<input class="form-control" type="text" value="" id="hghtft"
												aria-label="Disabled input example" disabled>
										</div>
									</div>
									<div class="clearfix"></div>

									<div class="row">
										<div class="col-md-3 col-12 mt-2">
											<label for="community" class="form-label"> Community</label>
											<input class="form-control" type="text" id="community" name="community">
										</div>
										<div class="col-md-3 col-12 mt-2">
											<label for="mobile" class="form-label">Contact No.</label>
											<input class="form-control contact-group" type="text" id="mobile" name="mobile" minlength="10" maxlength="12">
										</div>
										<div class="col-md-3 col-12 mt-2">
											<label for="email" class="form-label"> Email ID</label>
											<input class="form-control contact-group" type="text" id="email" name="email">
										</div>
										<div class="col-md-3 col-12 mt-2">
											<label for="assignto" class="form-label"> Assign To</label>
											<select name="assignto" class="form-select select2-notag" required>
												<option value="">Select</option>
												@foreach ($employees as $employee)
													<option value="{{ $employee->username }}">
														{{ $employee->username . ' - ' . $employee->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="row">
										<div class="col-md-4 col-12 mt-2">
											<div class="mb-2">
												<label for="education" class="form-label">Qualification</label>
												<textarea id="education" class="form-control" rows="6" spellcheck="false"
													name="education"></textarea>
											</div>
										</div>
										<div class="col-md-4 col-12 mt-2">
											<div class="mb-2">
												<label for="profession" class="form-label">Profession</label>
												<textarea id="occupation" class="form-control" rows="6" spellcheck="false"
													name="occupation"></textarea>
											</div>
										</div>
										<div class="col-md-4 col-12 mt-2">
											<div class="mb-2">
												<label for="remarks" class="form-label">Remarks</label>
												<textarea id="remarks" class="form-control" rows="6" spellcheck="false"
													name="remarks"></textarea>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>

									<div class="col-md-12 col-12 mt-3">
										<button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Save
											Data</button>
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


	</div> <!-- container-fluid -->
@endsection

@section('footer-script')
	<script>
		$(document).ready(function () {
			$("#hght").change(function () {
				var hght = $("#hght").val();

				if (hght != '') {
					var n1 = hght.substr(0, 1);
					var n2 = hght.substr(1, 2);
					var n3 = (n1 * 12) + parseInt(n2);

					var n4 = (n3 * 2.54);
					var cms = Math.round(n4) + ' Cms';

					document.getElementById('hghtft').value = cms;

				}
			})

			$("#frmSaveAdvtData").validate({
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
					email: {
						required: function () {
							return $("#mobile").val() === "";
						}
					},
					mobile: {
						required: function () {
							return $("#email").val() === "";
						}
					}
				},	
				submitHandler: function (form) {
					$.ajax({
						url: "{{ route('save-advtdata') }}",
						type: "POST",
						data: $(form).serialize(),
                        success: function (response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#frmSaveAdvtData").trigger("reset");
								window.location.href = "{{ route('list-advtdata') }}";
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
                    })
				}
			});

		});
	</script>

@endsection