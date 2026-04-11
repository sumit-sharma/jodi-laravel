@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">


        <div class="row">

            <?php // include 'includes/inner-menu.php';
                                                                ?>

            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Photo Upload</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                            <li class="breadcrumb-item active">Photo Upload</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form method="POST" action="{{ route('customer.upload') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <div id="my-dropzone" class="dropzone"></div>
                                    <div id="previewContainer" class="mt-3 d-flex gap-2 flex-wrap"></div>

                                </div>
                            </form>



                            <!-- end col -->
                            <div class="clearfix"></div>



                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="card-title">View All Photos(<label
                                                        id="fileCount">{{ $snaps->count() }}</label>)</h5>
                                            </div>
                                            <div class="col-6" align="right">
                                                {{-- <div class="btn-group me-1">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Delete Photos</a>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($snaps as $item)

                                                <div class="col-lg-4 col-sm-12 pic-div">
                                                    <div class="mt-4">

                                                        <a href="{{ url('/uploads/customer/' . $item->photo) }}"
                                                            class="image-popup" data-lightbox="gallery">
                                                            <img src="{{ url('uploads/customer/' . $item->photo) }}"
                                                                class="img-fluid" width="200" alt="profile pictures">
                                                        </a>
                                                        @if(in_array(auth()->user()->username, config('constants.DELETE_SNAPS_USERS')))
                                                            <p align="center" class="mt-2">
                                                                <a href="javascript:;" data-photo="{{ $item->photo }}"
                                                                    title="delete image" class="btn_delpic text-danger"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                        data-feather="delete"></i></a>
                                                            </p>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="clearfix"></div>

                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>

            </div>
            <!-- end row-->






        </div>

        <!-- CROP MODAL -->
        <div class="modal fade" id="cropModal">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <img id="cropImage">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cropSave" class="btn btn-success">Crop & Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
@endsection
    @section('footer-script')
        <!-- Dropzone  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

        <!-- cropper js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">


        <!-- lightbox2 -->
        <link href="/assets/plugins/lightbox2/css/lightbox.css" rel="stylesheet">
        <script src="/assets/plugins/lightbox2/js/lightbox.js"></script>


        <script>
            let rno = "{{ $rno }}";
            let fileCount = parseInt("{{ $snaps->count() }}")
            Dropzone.autoDiscover = false;
            let cropper;
            let uploadedFiles = []; // store filenames
            let croppedCount = 0;

            // Initialize Dropzone
            const dz = new Dropzone("#my-dropzone", {
                url: "{{ route('customer.upload') }}",
                autoProcessQueue: false,
                maxFiles: 1,
                clickable: true,
                // addRemoveLinks: true,
                acceptedFiles: "image/*",
                dictDefaultMessage: "Select image (1 at a time) — Max 6 images",

                init: function () {
                    this.on("addedfile", function (file) {

                        // Skip cropper for cropped file
                        if (file.isCropped) {
                            return;
                        }
                        // Limit total images
                        if (fileCount >= 6) {
                            this.removeFile(file);
                            alert("Maximum 6 images allowed.");
                            return;
                        }

                        // Open Cropper Modal
                        openCropper(file, this);
                        document.getElementById('fileCount').innerText = fileCount;

                    });
                    // this.on("removedfile", function(file) {
                    //     handleFileDelete(file);
                    //     fileCount--;
                    //     document.getElementById('fileCount').innerText = fileCount;

                    // });

                }
            });

            // Function to open cropper modal
            function openCropper(file, dropzoneInstance) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $("#cropImage").attr("src", e.target.result);
                    $("#cropModal").modal("show");

                    // Destroy previous cropper if exists
                    if (cropper) cropper.destroy();

                    cropper = new Cropper(document.getElementById("cropImage"), {
                        aspectRatio: 1,
                        viewMode: 1,
                        // zoomable: false,
                        minContainerHeight: 800,
                        minContainerWidth: 800



                    });

                    // Attach click handler safely
                    $("#cropSave").off("click").on("click", function () {
                        saveCroppedImage(file, dropzoneInstance);
                        // toastr.success("image has been saved", )
                        Swal.fire({
                            text: "image has been saved",
                            icon: "success",
                            timer: 2000
                        }).then(() => {
                            location.reload();
                        });
                    });
                };
                reader.readAsDataURL(file);
            }

            // Function to save cropped image
            function saveCroppedImage(file, dropzoneInstance) {
                if (!cropper) return;
                const canvas = cropper.getCroppedCanvas({
                    width: 600,
                    height: 600
                });
                canvas.toBlob(function (blob) {
                    // Optional: upload to server instantly via AJAX
                    let formData = new FormData();
                    formData.append("_token", "{{ csrf_token() }}");
                    formData.append("file", blob);
                    formData.append("rno", rno);

                    fetch("{{ route('customer.upload') }}", {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.json())
                        .then(res => {
                            console.log(res);
                            if (res.status == "success") {
                                console.log("photo", res.data.photo);
                                uploadedFiles.push(res.data.photo);
                                // document.getElementById("uploadedImages").value = JSON.stringify(uploadedFiles);

                                const croppedFile = new File([blob], res.data.photo, {
                                    type: "image/jpeg",
                                    lastModified: Date.now()
                                });

                                croppedFile.photo = res.data.photo;
                                croppedFile.isCropped = true; // <-- IMPORTANT

                                // // Remove original Dropzone file
                                // dropzoneInstance.removeFile(file);

                                // // Add cropped file to Dropzone (replace preview)
                                // dropzoneInstance.addFile(croppedFile);

                                // dropzoneInstance.createThumbnail(
                                //     croppedFile,
                                //     dropzoneInstance.options.thumbnailWidth,
                                //     dropzoneInstance.options.thumbnailHeight,
                                //     dropzoneInstance.options.thumbnailMethod,
                                //     false,
                                //     function(thumbnail) {
                                //         let img = croppedFile.previewElement.querySelector("img");
                                //         img.src = thumbnail;
                                //     }
                                // );
                                croppedCount++;
                                fileCount++;
                            }
                        });
                    // Close modal
                    $("#cropModal").modal("hide");
                    cropper.destroy();
                    cropper = null;

                }, "image/jpeg", 0.9);
            }


            // function handleFileDelete(file) {
            //     let photoName = file.name ?? file.photo ?? null;
            //     if (!photoName) return;
            //     console.log("Deleting file:", photoName);
            //     deletepic(photoName, rno)
            // }
        </script>
        <script>
            $(function () {
                lightbox.option({
                    'alwaysShowNavOnTouchDevices': true,
                    'wrapAround': true
                })
                $(".btn_delpic").click(function () {
                    $this = $(this);
                    let photo = $this.data('photo');
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Delete this file",
                        icon: "question",
                        confirmButtonText: "OK",
                        showCancelButton: true,
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            // await deletepic(photo, rno)
                            fetch("{{ route('customer.photo-delete') }}", {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    photo: photo,
                                    rno: rno
                                })
                            })
                                .then(res => res.json())
                                .then(res => {
                                    console.log(res);

                                    // Remove from array
                                    uploadedFiles = uploadedFiles.filter(f => f !== photoName);
                                    croppedCount--;
                                }).then((data) => {
                                    $this.closest('.pic-div').remove();
                                    location.reload(); // Reloads the page

                                })

                        }
                    });

                });
            });
        </script>
    @endsection