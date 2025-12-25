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
                            <div class="col-md-12 col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Interaction List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Interaction List</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="col-md-8 col-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bxs-eraser label-icon"></i> Remove</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</button>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $interactions->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>

                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Bookmark</th>
                                                    <th data-priority="2" width="">Dated</th>
                                                    <th data-priority="3" width="">Time</th>
                                                    <th data-priority="4" width="">Type</th>
                                                    <th data-priority="5" width="">Call St.</th>
                                                    <th data-priority="6" width="">Emp ID</th>
                                                    <th data-priority="7" width="">Emp. Name</th>
                                                    <th data-priority="8" width="">Description</th>
                                                    <th data-priority="9" width="">F-Date</th>
                                                    <th data-priority="10" width="">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($interactions as $interaction)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;"
                                                                onclick="toggleBookmarkInteraction({{ $interaction->id }})"
                                                                class="text-primary">
                                                                @if ($interaction->status == 2)
                                                                    <i id="bookmark-icon-{{ $interaction->id }}"
                                                                        class="bi bi-bookmark-fill"></i>
                                                                @else
                                                                    <i id="bookmark-icon-{{ $interaction->id }}"
                                                                        class="bi bi-bookmark"></i>
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td>{{ \App\Traits\CommonTrait::convertCommonDate($interaction->dated) }}
                                                        </td>
                                                        <td>{{ \App\Traits\CommonTrait::convertCommonDate($interaction->time, 'h:i A') }}
                                                        </td>
                                                        <td>{{ $interaction->calltype->label() }}</td>
                                                        <td>{{ $interaction->callstatus == 0 ? 'No' : 'Yes' }}</td>
                                                        <td>{{ $interaction->empid }}</td>
                                                        <td>{{ $interaction->employee->name }}</td>
                                                        <td>{{ $interaction->description }}</td>
                                                        {{-- <td>{{ $interaction->futuredate }}</td> --}}
                                                        <td>{{ $interaction->futuredate == '0000-00-00' ? '--' : \App\Traits\CommonTrait::convertCommonDate($interaction->futuredate) }}
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;"
                                                                onclick="delete_interaction({{ $interaction->id }})"
                                                                class="text-danger">
                                                                <i class="bi bi-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $interactions->links() }}
                                    </div>

                                    <!-- Modal -->
                                    @include('components.biodata_modal')
                                    <!-- end modal -->

                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>

        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection

@section('footer-script')
    <script>
        const toggleBookmarkInteraction = async (interactionId) => {
            try {
                url = "{{ route('interaction.toggle-bookmark') }}";
                const response = await fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        interaction_id: interactionId
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                console.log(data);
                if (data.status == 'success') {
                    const bookmarkIcon = document.querySelector(`#bookmark-icon-${interactionId}`);
                    bookmarkIcon.classList.toggle('bi-bookmark-fill');
                    bookmarkIcon.classList.toggle('bi-bookmark');

                }

            } catch (error) {
                console.error('Error:', error);
            }
        }

        const delete_interaction = (interactionId) => {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    delInteraction(interactionId);
                }
            });
        }

        const delInteraction = async (interactionId) => {
            try {
                url = "{{ route('interaction.delete-interaction') }}";
                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        interaction_id: interactionId
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                console.log(data);
                if (data.status == 'success') {
                    $(`#bookmark-icon-${interactionId}`).closest('tr').remove();
                }

            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>
@endsection