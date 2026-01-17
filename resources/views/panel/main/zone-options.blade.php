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
									<h4 class="mb-sm-0 font-size-18">Zone Options</h4>
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
											<li class="breadcrumb-item active">Zone Options</li>
										</ol>
									</div>
								</div>
							</div>

							<hr>

							<div class="col-12">
								<div class="row">
									<div class="col-lg-6">
										<label for="zoneList" class="form-label">Zone List</label>
										<select id="zoneList" class="form-select select2-notag">
											<option value="">Select</option>
											@foreach ($zones as $zone)
												@if (!empty(trim($zone->zone_name)))
													<option value="{{ $zone->zone_code }}">{{ $zone->zone_name }}</option>
												@endif
											@endforeach
										</select>
									</div>
									<div class="clearfix"></div>
									<form id="frmZone" action="{{ route('panel.store-zone') }}" method="POST">
										@csrf
										<div class="col-6 mt-3">
											<div class="mb-3">
												<label for="zone_name" class="form-label">Add New Zone</label>
												<input type="text" id="zone_name" name="zone_name" class="form-control">
											</div>
										</div>
										<div class="clearfix"></div>

										<div class="col-6 mt-3">
											<button type="submit"
												class="btn btn-primary w-lg waves-effect waves-light">Submit</button>
										</div>
									</form>
								</div>
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
			$('#frmZone').validate({
				rules: {
					zone_name: {
						required: true,
						remote: {
							url: "{{ route('panel.check-exist') }}",
							type: "POST",
							data: {
								table: 'zones',
								whereArray: {
									zone_name: function () {
										return $("#zone_name").val();
									}
								}
							}
						}
					}
				},
				messages: {
					zone_name: {
						required: 'Please enter zone name',
						remote: function () {
							return `${$("#zone_name").val()} already exists`;
						}
					}
				},
				submitHandler: function (form) {
					form.submit();
				}
			});
		});
	</script>

@endsection