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
                                    <h4 class="mb-sm-0 font-size-18">Show References</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">
                                                    References
                                                </a></li>
                                            <li class="breadcrumb-item active">Show References</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>



                            <div class="col-md-8">
                                {{-- <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bxs-eraser label-icon"></i> Remove</button>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</button>
                                </div> --}}
                            </div>
                            <div class="col-md-2">
                                {{-- <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form> --}}
                            </div>
                            <div class="col-md-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $references->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>




                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered table-sm align-middle"
                                            style="table-layout: fixed; width: 100%;">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" style="width: 5%;">Ref No.</th>
                                                    <th data-priority="2" style="width: 5%;">Ref Name</th>
                                                    <th data-priority="3" style="width: 5%;">Cand. Name</th>
                                                    <th data-priority="4" style="width: 5%;">Searching For</th>
                                                    <th data-priority="5" style="width: 5%;">Address</th>
                                                    <th data-priority="6" style="width: 5%;">City</th>
                                                    <th data-priority="7" style="width: 3%;">Contact No.</th>
                                                    <th data-priority="8" style="width: 5%;">Email ID</th>
                                                    <th data-priority="9" style="width: 5%;">Source</th>
                                                    <th data-priority="10" style="width: 5%;">Given By</th>
                                                    <th data-priority="11" style="width: 5%;">Remarks</th>
                                                    <th data-priority="12" style="width: 5%;">Status</th>
                                                    <th data-priority="13" style="width: 6%;">Assigned To</th>
                                                    <th data-priority="14" style="width: 5%;">Dated</th>
                                                    <th data-priority="15" style="width: 4%;">By</th>
                                                    <th data-priority="16" style="width: 5%;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($references as $reference)
                                                    <tr>
                                                        <td>{{ $reference->refno }}</td>
                                                        <td>
                                                            @if ($reference->bio?->rno)
                                                                <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                    data-bs-target="#Modal_biodata"
                                                                    data-rno="{{ $reference->bio?->rno }}">{{ $reference->referencename }}</a>
                                                            @else
                                                                {{ $reference->referencename }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $reference->candidatename }}</td>
                                                        <td>{{ $reference->searchingfor }}</td>
                                                        <td>{{ $reference->address }}</td>
                                                        <td>{{ $reference->city }}</td>
                                                        <td>{{ $reference->contactno }}</td>
                                                        <td>{{ $reference->emailid }}</td>
                                                        <td>{{ $reference->source }}</td>
                                                        <td>{{ $reference->givenby }}</td>
                                                        <td>{{ $reference->remarks }}</td>
                                                        <td>{{ $reference->status }}</td>
                                                        <td>{{ $reference->assignto }}</td>
                                                        <td>{{ $reference->dated }}</td>
                                                        <td>{{ $reference->empid }}</td>
                                                        <td>
                                                            <div class="btn-group me-1 mt-2">
                                                                <span class="dropdown-toggle  dropstart dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i data-feather="more-vertical"></i>
                                                                </span>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item text-primary"
                                                                        href="{{ route('references.edit', ['reference' => $reference->refno]) }}">
                                                                        <span data-feather="edit"></span>Edit
                                                                        Reference</a>
                                                                    {{-- <a class="dropdown-item text-danger"
                                                                        href="{{ route('references.destroy', ['reference' => $reference->refno]) }}">
                                                                        <span data-feather="trash-2"></span>Delete
                                                                        Reference</a> --}}
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $references->links() }}
                                    </div>


                                </div>
                                @include('components.biodata_modal')
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection