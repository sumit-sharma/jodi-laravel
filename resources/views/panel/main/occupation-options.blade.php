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
								<h4 class="mb-sm-0 font-size-18">Occupation Options</h4>
								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
										<li class="breadcrumb-item active">Occupation Options</li>
									</ol>
								</div>
							</div>
						</div>

						<hr>

						<div class="col-12">
							<div class="row">
								<div class="col-lg-6">
									<label class="form-label">Occupation List</label>
									<select class="form-select select2-notag">
										<option>Select</option>
										@foreach ($occupations as $occupation)
										<option value="{{ $occupation->occ_code }}">{{ $occupation->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="clearfix"></div>
								<form id="occupationForm" action="{{ route('panel.store-occupation') }}" method="POST">
									@csrf
									<div class="col-6 mt-3">
										<div class="mb-3">
											<label for="occuption" class="form-label">Add New
												Occupation</label>
											<input type="text" class="form-control" id="occuption" name="occupation"
												placeholder="Enter Occupation Name">
										</div>
									</div>
									<div class="clearfix"></div>

									<div class="col-12 mt-3">
										<button type="submit	"
											class="btn btn-primary w-lg waves-effect waves-light">Submit</button>
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
		$(document).ready(function() {
			$('#occupationForm').validate({
				rules: {
					occuption: {
						required: true,
						remote: {
							url: "{{ route('panel.check-exist') }}",
							type: "POST",
							data: {
								table: 'occupations',
								whereArray: {
									name: function() {
										return $("#occuption").val();
									}
								}
							}

						}
					}
				},
				messages: {
					occuption: {
						required: 'Please enter occupation name',
						remote: function() {
							return `${$("#occuption").val()} already exists`;
						}
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});
	</script>

	@endsection