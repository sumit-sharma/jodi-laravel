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
                                    <h4 class="mb-sm-0 font-size-18">Wrong Emails</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mail</a></li>
                                            <li class="breadcrumb-item active">Wrong Emails</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>

                            <div class="col-md-8 col-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"
                                        data-bs-toggle="offcanvas" data-bs-target="#filterModal"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;

                                    <a href="{{ request()->url() }}" type="button"
                                        class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-reset label-icon"></i> Reset</a>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <form class="app-search d-none d-lg-block pt-0 pb-0" method="GET"
                                    action="{{ request()->url() }}">
                                    <div class="position-relative">
                                        <input type="search" name="search" class="form-control bg-black opacity-50"
                                            placeholder="Search..." value="{{ request()->get('search') }}">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="bx bx-search-alt align-middle"></i></button>

                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $wrongData->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>



                        <div class="col-md-12 col-12">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-bordered">
                                        <thead class="table-primary pdng_d">
                                            <tr>
                                                <th data-priority="1" width="">Name</th>
                                                <th data-priority="2" width="">RM</th>
                                                <th data-priority="3" width="">Wrong Email Id</th>
                                            </tr>
                                        </thead>

                                        <tbody class="pdng_d">
                                            @foreach ($wrongData as $row)

                                                <tr>
                                                    <td>
                                                        <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                            data-bs-target="#Modal_biodata" data-rno="{{ $row->rno }}">
                                                            {{ $row->rno . '-' . $row->viewProfile?->refname }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $row->viewProfile?->rm }}</td>
                                                    <td>{{ $row->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                {{ $wrongData->withQueryString()->links() }}

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

    @include('components.biodata_modal')

    <!-- right offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filterModal" aria-labelledby="filterModalLabel">
        <div class="offcanvas-header">
            <h5 id="filterModalLabel">Set Filters</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form id="searchFilterForm" method="GET" action="{{ request()->url() }}">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label">Email:</label>
                        <input name="email" class="form-control" type="text" value="{{ request()->get('email') }}">
                    </div>



                    <div class="clearfix"></div>

                    <div class="col-12 mb-3">
                        <label class="form-label">RM:</label>
                        <input name="rm" class="form-control" type="text" value="{{ request()->get('rm') }}">
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Search</button>
                    </div>
                    <div class="clearfix"></div>





                </div><!--end row-->
            </form>
        </div>
    </div>



    </div>
@endsection