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
                                            <li class="breadcrumb-item active">Search Result</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>


                            <div class="col-md-8">
                                <div class="mb-3">
                                    <button data-bs-toggle="offcanvas" data-bs-target="#filterModal" type="button"
                                        class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bx-filter-alt label-icon"></i> Filter</button>
                                    &nbsp;&nbsp;
                                    {{-- <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i
                                            class="bx bxs-eraser label-icon"></i> Remove</button>
                                    &nbsp;&nbsp; --}}
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light" onclick="resetSearch()"><i
                                            class="bx bx-reset label-icon"></i> Reset</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input id="searchFilterText" type="search" class="form-control bg-black opacity-50" value="{{ $inputdata['searchterm'] ?? '' }}"
                                            placeholder="Search..." autocomplete="off">
                                        <button id="searchFilterBtn" class="btn btn-primary" type="button"><i
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
                                                        <td><div class="form-check"><input class="form-check-input chkrno" type="radio" name="formRadios" data-vc="{{ $data->vc }}" data-refname="{{ $data->refname }}" value="{{ $data->rno }}" data-cachekey="{{ $cacheKey }}" data-oc="{{ $data->oc }}" data-ost="{{ $data->ost }}"></div></td>
                                                        <td><a href="#" class="biodata_modal" data-bs-toggle="modal" data-bs-target="#Modal_biodata" data-rno="{{ $data->rno }}">{{ $data->rno }}</a></td>
                                                        <td>{{ $data->g }}</td>
                                                        <td>{{ $data->refname }} {!! $data->vc == 1? '<i class="bi bi-vimeo"></i>' : '' !!} {!! $data->oc == 1? '<i class="text-danger"><strong>O</strong></i>' : '' !!}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data?->bio?->dob)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data?->bio?->dob)->age }}</td>
                                                        <td>{{ msValue($data->ms) }}</td>
                                                        <td>{{ $data->cst }}</td>
                                                        <td>{{ $data->hg }}</td>
                                                        <td>{{ $data?->bio?->astrostatus->label() }}</td>
                                                        <td>{{ $data?->bio?->education->label() }}</td>
                                                        <td>{{ $data->personal->budget }}</td>
                                                        <td>{{ $data?->income?->income }}</td>
                                                        <td>{{ $data->personal->arealocation }}</td>
                                                        <td>{{ $data->occupation?->name }}</td>
                                                        <td>{{ rsValue($data->rs) }}</td>
                                                        <td>{{ $data->tc }}</td>
                                                        <td>{{ $data->rm }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_call)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mail)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->last_mtng)->format('M d Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data?->bio?->profiledate)->format('M d Y') }}</td>
                                                        <td>
                                                            <div class="btn-group me-1 mt-2">
                                                                <span class="dropdown-toggle  dropstart dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i data-feather="more-vertical"></i>
                                                                </span>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.edit', ['customer' => $data->rno]) }}"
                                                                        target="_blank">Edit
                                                                        Profile</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('customer.uplod-photo', ['rno' => $data->rno]) }}"
                                                                        target="_blank">Upload
                                                                        Photo</a>
                                                                    {{-- <a class="dropdown-item" href="#"
                                                                        target="_blank">Update
                                                                        Finance</a> --}}
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



        <!-- right offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="filterModal" aria-labelledby="filterModalLabel">
            <div class="offcanvas-header">
                <h5 id="filterModalLabel">Set Filters</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form id="searchFilterForm" method="GET" action="{{ route('search-data') }}">
                    <input type="hidden" name="searchinfield" value="{{ $inputdata['searchinfield'] }}">
                    <input type="hidden" name="searchvalue" value="{{ $inputdata['searchvalue'] }}">
                    <input type="hidden" id="hiddenSearchTerm" name="searchterm" value="">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label">Gender:</label>
                            <select name="gender" class="form-select">
                                <option value="">Select</option>
                                <option value="M" {{ isset($inputdata['gender']) && $inputdata['gender'] == 'M' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ isset($inputdata['gender']) && $inputdata['gender'] == 'F' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">From Age:</label>
                            <input class="form-control" name="from_age" type="number" min="18" value="{{ $inputdata['from_age'] ?? '' }}">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">To Age:</label>
                            <input class="form-control" name="to_age" type="number" max="70" value="{{ $inputdata['to_age'] ?? '' }}">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Astro Status:</label>
                            <select name="ast" id="ast" class="form-select">
                                <option value="">Select</option>
                                <option value="1" {{ isset($inputdata['ast']) && $inputdata['ast'] == '1' ? 'selected' : '' }}>Manglik</option>
                                <option value="2" {{ isset($inputdata['ast']) && $inputdata['ast'] == '2' ? 'selected' : '' }}>Slightly Manglik</option>
                                <option value="3" {{ isset($inputdata['ast']) && $inputdata['ast'] == '3' ? 'selected' : '' }}>Non Manglik</option>
                                <option value="4" {{ isset($inputdata['ast']) && $inputdata['ast'] == '4' ? 'selected' : '' }}>Don't Believe</option>
                                <option value="5" {{ isset($inputdata['ast']) && $inputdata['ast'] == '5' ? 'selected' : '' }}>Don't Know</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Location:</label>
                            <input class="form-control" type="text" value="{{ $inputdata['arealocation'] ?? '' }}" name="arealocation">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Marital:</label>
                            <select name="ms" id="ms" class="form-select">
                                <option value="">Select</option>
                                <option value="1" {{ isset($inputdata['ms']) && $inputdata['ms'] == '1' ? 'selected' : '' }}>Never Married</option>
                                <option value="2" {{ isset($inputdata['ms']) && $inputdata['ms'] == '2' ? 'selected' : '' }}>Divorced</option>
                                <option value="3" {{ isset($inputdata['ms']) && $inputdata['ms'] == '3' ? 'selected' : '' }}>Widow</option>
                                <option value="4" {{ isset($inputdata['ms']) && $inputdata['ms'] == '4' ? 'selected' : '' }}>Separated</option>
                            </select>
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
@section('footer-script')


    <script>
        var selected_rno = "";
        var selected_refname = "";
        var selected_vc = "";
        var selected_oc = "";
        var cacheKey = "";
        var selected_ost = "";

        $(function () {
            $('.chkrno').on('change', function () {
                rno = $(this).val()
                refname = $(this).data('refname');
                vc = $(this).data('vc');
                oc = $(this).data('oc');
                selected_ost = $(this).data('ost');
                selected_rno = rno;
                selected_refname = refname;
                selected_vc = vc;
                selected_oc = oc;
                cacheKey = $(this).data('cachekey');
            });
            $('#searchFilterBtn').on('click', function () {
                let search_term =  $("#searchFilterText").val();
                if(search_term.trim() == ""){
                    return false;
                }
                $("#hiddenSearchTerm").val(search_term);
                $("#searchFilterForm").submit();
            });
            
            // Trigger search button click on Enter key press
            $('#searchFilterText').on('keypress', function (e) {
                if (e.which === 13 || e.keyCode === 13) {
                    e.preventDefault();
                    $('#searchFilterBtn').click();
                }
            });
        });
    </script>

<script>
function resetSearch() {
    const url = new URL(window.location.href);

    const searchinfield = url.searchParams.get('searchinfield');
    const searchvalue   = url.searchParams.get('searchvalue');

    // Clear all params
    url.search = '';

    // Re-add only required params
    if (searchinfield) url.searchParams.set('searchinfield', searchinfield);
    if (searchvalue)   url.searchParams.set('searchvalue', searchvalue);

    // Reload page
    window.location.href = url.toString();
}
</script>

@endsection