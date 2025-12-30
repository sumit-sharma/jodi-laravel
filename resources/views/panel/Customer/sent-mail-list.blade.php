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
                                    <h4 class="mb-sm-0 font-size-18">Sent Mail</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item active">Sent Mail</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-8 col-12">
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
                            <div class="col-md-2 col-12">
                                {{-- <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form> --}}
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $sendMails->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">EmpID</th>
                                                    <th data-priority="2" width="">Date</th>
                                                    <th data-priority="3" width="">Time</th>
                                                    <th data-priority="4" width="">Mail To</th>
                                                    <th data-priority="5" width="">Name</th>
                                                    <th data-priority="6" width="">Proposal</th>
                                                    <th data-priority="7" width="">Prop Name</th>
                                                    <th data-priority="8" width="">Photos</th>
                                                    <th data-priority="9" width="">W/C</th>
                                                    <th data-priority="10" width="">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($sendMails as $row)
                                                    <tr>
                                                        <td>{{ $row->empid }}</td>
                                                        <td>{{ $row->dated }}</td>
                                                        <td>{{ $row->time }}</td>
                                                        <td>{{ $row->rno }}</td>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $row->rno }}">
                                                                {{ $row->sender?->refname ?? '' }}</a>
                                                        </td>
                                                        <td>{{ $row->proposal }}</td>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata" data-rno="{{ $row->proposal }}">
                                                                {{  $row->receiver?->refname ?? '' }}</a>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $row->photos) as $key => $photo)
                                                                @php
                                                                    $extension = pathinfo($photo, PATHINFO_EXTENSION);
                                                                    // If no extension, suffix .jpg to the photo filename
                                                                    $photoWithExtension = $extension ? $photo : $photo . '.jpg';
                                                                @endphp
                                                                <a href="{{ url('/uploads/customer/' . $photoWithExtension) }}"
                                                                    class="image-popup"
                                                                    data-lightbox="{{ 'gallery_' . $row->rno . '_' . $row->proposal }}">
                                                                    {{-- <img src="/uploads/customer/{{ $photo }}" width="100%" />
                                                                    --}}
                                                                    {{ 'Photo ' . ++$key }}
                                                                </a>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $row->wc == 1 ? 'C' : '--' }}</td>
                                                        <td>{{ $row->addl_st }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {{ $sendMails->links() }}
                                    </div>
                                </div>
                                @include('components.biodata_modal')
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
    <!-- lightbox2 -->
    <link href="/assets/plugins/lightbox2/css/lightbox.css" rel="stylesheet">
    <script src="/assets/plugins/lightbox2/js/lightbox.js"></script>

@endsection