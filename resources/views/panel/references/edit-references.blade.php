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
									<h4 class="mb-sm-0 font-size-18">Edit References</h4>
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);">References</a></li>
											<li class="breadcrumb-item active">Edit References</li>
										</ol>
									</div>
								</div>
							</div>

							<hr>

							<div class="col-md-12">
								<form action="#" id="frmAddEditReferences" method="POST">
									@method('PUT')
									@csrf
									<div class="row">
										<div class="col-md-6 mt-3">
											<label for="ref_name" class="form-label"> Reference Name </label>
											<input class="form-control" type="text" id="ref_name" name="referencename"
												value="{{ $reference->referencename }}" required maxlength="100">
										</div>
										<div class="col-md-6 mt-3">
											<label for="candidate_name" class="form-label"> Cadidate Name </label>
											<input class="form-control" type="text" name="candidatename" id="candidate_name"
												value="{{ $reference->candidatename }}" required maxlength="100">
										</div>
										<div class="clearfix"></div>
										<div class="col-md-6 mt-3">
											<label for="searchingfor" class="form-label">Searching For</label>
											<input class="form-control" type="text" name="searchingfor" id="searchingfor"
												value="{{ $reference->searchingfor }}" required maxlength="100">
										</div>

										<div class="col-md-6 mt-3">
											<label for="contactno" class="form-label"> Contact No. </label>
											<input class="form-control" type="text" name="contactno" id="contactno"
												value="{{ $reference->contactno }}" maxlength="25">
										</div>
										<div class="col-md-6 mt-3">
											<label for="emailid" class="form-label"> Email ID </label>
											<input class="form-control" type="email" name="emailid" id="emailid"
												value="{{ $reference->emailid }}" maxlength="100">
										</div>
										<div class="col-md-6 mt-3">
											<label for="sourceofreference" class="form-label">Source of Reference</label>
											<input class="form-control" type="text" name="source" id="sourceofreference"
												value="{{ $reference->source }}" maxlength="100">
										</div>
										<div class="col-6 mt-3">
											<label for="givenby" class="form-label">Reference Given By</label>
											<input class="form-control" type="text" name="givenby" id="givenby" required
												value="{{ $reference->givenby }}" maxlength="100">
										</div>

										<div class="col-6 mt-3">
											<div class="mb-3">
												<label for="address" class="form-label">Address</label>
												<textarea id="address" name="address" class="form-control" rows="4"
													spellcheck="false" maxlength="250">{{ $reference->address }}</textarea>
											</div>
										</div>
										<div class="clearfix"></div>

										<div class="col-md-6 mt-3">
											<label for="city" class="form-label">City</label>
											<input class="form-control" type="text" name="city" id="city"
												value="{{ $reference->city }}" maxlength="100">
										</div>
										<div class="col-md-6 mt-3">
											<label for="status" class="form-label"> Status </label>
											<input class="form-control" type="text" name="status"
												value="{{ $reference->status }}" maxlength="100">
										</div>
										<div class="col-md-6 mt-3">
											<label for="assignto" class="form-label"> Assign To</label>
											<select class="form-select select2-notag" name="assignto" id="assignto">
												<option>Select</option>
												@foreach ($employees as $employee)
													<option value="{{ $employee->username }}" {{ $reference->assignto == $employee->username ? 'selected' : '' }}>
														{{ $employee->username . "-" . $employee->name }}
													</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-6 mt-3">
											<label for="remarks" class="form-label">Remarks</label>
											<input class="form-control" type="text" name="remarks" id="remarks"
												value="{{ $reference->remarks }}">
										</div>
										<div class="clearfix"></div>


										<div class="col-md-12 mt-4">
											<button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Save
												Reference</button>
										</div>

									</div>
							</div>

						</div>
					</div><!-- end card -->
					</form>
				</div><!-- end col -->
			</div>

		</div>
		<!-- end row-->


	</div> <!-- container-fluid -->
@endsection

@section('footer-script')
	<script>
		$("#frmAddEditReferences").validate({
			messages: {
				ref_name: {
					required: "Please enter reference name",
				},
				candidate_name: {
					required: "Please enter candidate name",
				},
				searchingfor: {
					required: "Please enter searching for",
				},
				contactno: {
					required: "Please enter contact no",
				},
				emailid: {
					required: "Please enter email id",
				},
				sourceofreference: {
					required: "Please enter source of reference",
				},
				givenby: {
					required: "Please enter given by",
				},
				address: {
					required: "Please enter address",
				},
				city: {
					required: "Please enter city",
				},
				assignedto: {
					required: "Please select assigned to",
				},
				remarks: {
					required: "Please enter remarks",
				},
			},
			submitHandler: function (form) {

				$.ajax({
					url: "{{ route('references.update', ['reference' => $reference->refno]) }}",
					type: "POST",
					data: new FormData(form),
					contentType: false,
					processData: false,
					success: function (response) {
						if (response.status == "success") {
							swal.fire({
								title: "Success!",
								text: response.message,
								icon: "success"
							}).then(function () {
								window.location.href = "{{ route('references.index') }}";
							});
						} else {
							swal.fire({
								title: "Error!",
								text: response.message,
								icon: "error"
							});
						}
					}
				});
			}
		})
	</script>
@endsection