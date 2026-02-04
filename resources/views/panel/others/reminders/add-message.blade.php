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
									<h4 class="mb-sm-0 font-size-18">Add Reminder</h4>
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);">Other</a></li>
											<li class="breadcrumb-item active">Add Reminder</li>
										</ol>
									</div>
								</div>
							</div>

							<hr>

							<div class="col-md-12 col-12">
								<form id="frmStoreMessage" action="{{ route('store-message') }}" method="POST">
									@csrf
									<div class="row">
										<div class="col-6 mt-2">
											<label for="dated" class="form-label">Reminder Dated:</label>
											<input class="form-control" type="text" id="dated" name="dated"
												autocomplete="off">
										</div>
										<div class="col-6 mt-2">
											<label for="time" class="form-label">Reminder Time:</label>
											<input class="form-control contact-group" type="text" id="time" name="time"
												autocomplete="off">
										</div>
										<div class="col-12 mt-2">
											<label for="assignto" class="form-label"> Reminder Matter :</label>
											<textarea id="message" class="form-control" rows="6" spellcheck="false"
												name="message"></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<input type="hidden" name="msgto" value="{{ Auth::user()->username }}" />
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

			$("#frmStoreMessage").validate({
				ignore: [],
				errorClass: 'is-invalid',
				validClass: 'is-valid',
				errorPlacement: function (error, element) {
					if (element.hasClass('select2-hidden-accessible')) {
						error.insertAfter(element.next('.select2')); // place after Select2
					}
					else if (element.closest('.gj-datepicker, .gj-timepicker').length) {
						error.insertAfter(element.closest('.input-group'));
					}
					else {
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
					dated: {
						required: true
					},
					time: {
						required: true
					},
					message: {
						required: true
					}
				},
				messages: {
					dated: {
						required: "Please select date"
					},
					time: {
						required: "Please select time"
					},
					message: {
						required: "Please enter message"
					}
				},
				submitHandler: function (form) {
					$.ajax({
						url: form.action,
						type: form.method,
						data: new FormData(form),
						processData: false,
						contentType: false,
						success: function (response) {
							if (response.status == "success") {
								Swal.fire({
									icon: 'success',
									title: 'Success',
									text: response.message,
								}).then((result) => {
									$("#frmStoreMessage").trigger("reset");
									window.location.href = "{{ route('show-reminders') }}";
								});
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

			$("#frmStoreMessage #dated").datepicker({
				uiLibrary: 'bootstrap5',
				format: 'yyyy-mm-dd',
				minDate: new Date(new Date().setDate(new Date().getDate() - 1)),
				change: function () {
					$('#frmStoreMessage #dated').valid(); // 🔥 force validation on change
				}
			});

			$("#frmStoreMessage #time").timepicker({
				uiLibrary: 'bootstrap5',
				modal: true,
				footer: true,
				change: function () {
					$('#frmStoreMessage #time').valid(); // 🔥 force validation on change
				}
			});
			$("#frmStoreMessage #time").on('focus', function () {
				$(this).closest('.gj-timepicker').find('button').click();
			});



		});
	</script>

@endsection