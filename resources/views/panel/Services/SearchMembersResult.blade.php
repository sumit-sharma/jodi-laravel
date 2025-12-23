@extends('layouts.home')
@section('main-content')
    <div class="container-fluid">
        <style>
            .form-check-input {
                width: 1em !important;
                height: 1em !important;
                border: 1px solid #420d1c !important;
            }

            td {
                vertical-align: middle;
                text-align: center;
            }
        </style>
        <div class="row">
            @include('components.inner-menu')
        </div>
        <div class="row">
            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Search Member Result</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                                            <li class="breadcrumb-item active">Form Transfer</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>


                            <div class="col-md-8">
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
                            <div class="col-md-2">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input type="search" class="form-control bg-black opacity-50"
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Total Record -
                                        {{ $results->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            {{-- @dump($results) --}}
                            @php
                                function msValue($msInt)
                                {
                                    $ms = '';
                                    switch ($msInt) {
                                        case '1':
                                            $ms = 'Never Married';
                                            break;
                                        case '2':
                                            $ms = 'Divorced';
                                            break;
                                        case '3':
                                            $ms = 'Widow';
                                            break;
                                        case '4':
                                            $ms = 'Separated';
                                            break;
                                    }
                                    return $ms;
                                }

                                function rsValue($rs)
                                {
                                    $rs_value = '';
                                    switch ($rs) {
                                        case '1':
                                            $rs_value = 'Indian Citizen';
                                            break;
                                        case '2':
                                            $rs_value = 'Temp. Residing Abroad';
                                            break;
                                        case '3':
                                            $rs_value = 'Non Resident Indian';
                                            break;
                                    }
                                    return $rs_value;
                                }

                            @endphp

                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="{!! $results->count() > 2 ? 'table-responsive' : '' !!} mb-0"
                                        data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ref No.</th>
                                                    <th>Gender</th>
                                                    <th>Name</th>
                                                    <th>Born</th>
                                                    <th>Age</th>
                                                    <th>Ms</th>
                                                    <th>Caste</th>
                                                    <th>Height</th>
                                                    <th>Ast</th>
                                                    <th>Ed</th>
                                                    <th>CB</th>
                                                    <th>Family Income</th>
                                                    <th>Location</th>
                                                    <th>Occupation</th>
                                                    <th>Rs</th>
                                                    <th>TC</th>
                                                    <th>RM</th>
                                                    <th>L_CALL</th>
                                                    <th>L_Mail</th>
                                                    <th>L_Mtng</th>
                                                    <th>R_Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($results as $data)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input chkrno" type="radio"
                                                                    name="formRadios" data-refname="{{ $data->refname }}"
                                                                    value="{{ $data->rno }}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="biodata_modal" data-bs-toggle="modal"
                                                                data-bs-target="#Modal_biodata"
                                                                data-rno="{{ $data->rno }}">{{ $data->rno }}</a>
                                                        </td>
                                                        <td>{{ $data->g }}</td>
                                                        <td>{{ $data->refname }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->dob)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->dob)->age }}</td>
                                                        <td>{{ msValue($data->ms) }}</td>
                                                        <td>{{ $data->cst }}</td>
                                                        <td>{{ $data->hg }}</td>
                                                        <td>{{ $data->bio->astrostatus->label() }}</td>
                                                        <td>{{ $data->bio->education->label() }}</td>
                                                        <td>{{ $data->personal->budget }}</td>
                                                        <td>{{ $data?->income?->income }}</td>
                                                        <td>{{ $data->personal->arealocation }}</td>
                                                        <td>{{ $data->occupation?->name }}</td>
                                                        <td>{{ rsValue($data->rs) }}</td>
                                                        <td>{{ $data->tc }}</td>
                                                        <td>{{ $data->rm }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_call)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mail)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mtng)->format('M d Y') }}
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->profiledate)->format('M d Y') }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group me-1 mt-2">
                                                                <span class="dropdown-toggle  dropstart dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i data-feather="more-vertical"></i>
                                                                </span>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.edit', ['customer' => $data->rno]) }}">Edit
                                                                        Profile</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.uplod-photo', ['rno' => $data->rno]) }}">Upload
                                                                        Photo</a>
                                                                    <a class="dropdown-item" href="#">Update
                                                                        Finance</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                        {{ $results->withQueryString()->links() }}
                                    </div>

                                    @include('components.biodata_modal')

                                </div>
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
@section('footer-script')


    <script>
        var selected_rno = "";
        var selected_refname = "";

        $(function () {
            $('.chkrno').on('change', function () {
                rno = $(this).val()
                refname = $(this).data('refname');
                selected_rno = rno;
                selected_refname = refname;
            });
        });
    </script>
@endsection