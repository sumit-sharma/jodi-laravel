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
                                    <h4 class="mb-sm-0 font-size-18">{{ $headings }}</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                                            <li class="breadcrumb-item active">{{ $headings }}</li>
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
                                        {{ $TableData->total() }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-12 col-12">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th data-priority="1" width="">Refrence ID</th>
                                                    <th data-priority="2" width="">Gender</th>
                                                    <th data-priority="3" width="">Name</th>
                                                    <th data-priority="4" width="">Born</th>
                                                    <th data-priority="5" width="">Age</th>
                                                    <th data-priority="6" width="">Ms</th>
                                                    <th data-priority="7" width="">Caste</th>
                                                    <th data-priority="8" width="">Hght</th>
                                                    <th data-priority="9" width="">Ast</th>
                                                    <th data-priority="10" width="">Ed</th>
                                                    <th data-priority="11" width="">CB</th>
                                                    <th data-priority="12" width="">Family Income</th>
                                                    <th data-priority="13" width="">Location</th>
                                                    <th data-priority="14" width="">Occupation</th>
                                                    <th data-priority="15" width="">Rs</th>
                                                    <th data-priority="16" width="">TC</th>
                                                    <th data-priority="17" width="">TL</th>
                                                    <th data-priority="18" width="">RM</th>
                                                    <th data-priority="19" width="">L_Call</th>
                                                    <th data-priority="20" width="">L_Mail</th>
                                                    <th data-priority="21" width="">L_Mtng</th>
                                                    <th data-priority="22" width="">R_Date</th>
                                                </tr>
                                            </thead>

                                            <tbody class="pdng_d">
                                                @foreach ($TableData as $data)
                                                    <tr>
                                                        <td>{{ $data->rno }}</td>
                                                        <td>{{ $data->g }}</td>
                                                        <td>{{ $data->refname }}
                                                            {!! $data->vc == 1 ? '<i class="bi bi-vimeo"></i>' : '' !!}
                                                            {!! $data->oc == 1 ? '<i class="text-danger"><strong>O</strong></i>' : '' !!}
                                                        </td>
                                                        <td>{{ convertCommonDate($data->bio->dob) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->bio->dob)->age }}</td>
                                                        <td>{{ ms_label($data->ms) }}</td>
                                                        <td>{{ $data->cst }}</td>
                                                        <td>{{ $data->hg }}</td>
                                                        <td>{{ $data->bio->astrostatus->label() }}</td>
                                                        <td>{{ $data->bio->education->label() }}</td>
                                                        <td>{{ $data->personal->budget }}</td>
                                                        <td>{{ $data?->income?->income }}</td>
                                                        <td>{{ $data->personal->arealocation }}</td>
                                                        <td>{{ $data->occupation?->name }}</td>
                                                        <td>{{ rs_label($data->rs) }}</td>
                                                        <td>{{ $data->tc }}</td>
                                                        <td>{{ $data->mc }}</td>
                                                        <td>{{ $data->rm }}</td>
                                                        <td>{{ convertCommonDate($data->last_call) }}</td>
                                                        <td>{{ convertCommonDate($data->last_mail) }}</td>
                                                        <td>{{ convertCommonDate($data->last_mtng) }}</td>
                                                        <td>{{ convertCommonDate($data->bio->profiledate) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    {{ $TableData->withQueryString()->links() }}

                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-xl-12">

                            </div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>



        </div>
        <!-- end row-->

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
                            <label class="form-label">Gender:</label>
                            <select class="form-select" name="g">
                                <option value="">Select</option>
                                <option value="M" {{ request()->get('g') == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ request()->get('g') == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Occupation:</label>
                            <select name="oc" class="form-select">
                                <option value="">Select</option>
                                @foreach ($occupations as $occupation)
                                    <option value="{{ $occupation->occ_code }}" {{ request()->get('oc') == $occupation->occ_code ? 'selected' : '' }}>{{ $occupation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">TC:</label>
                            <input name="tc" class="form-control" type="text" value="{{ request()->get('tc') }}">
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">TL:</label>
                            <input name="mc" class="form-control" type="text" value="{{ request()->get('mc') }}">
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


    </div> <!-- container-fluid -->
@endsection