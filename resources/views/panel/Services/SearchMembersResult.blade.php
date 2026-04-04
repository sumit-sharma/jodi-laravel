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

            /* 1440px Desktop and Lower */
            /* @media (max-width: 1440px) { */
            #tech-companies-1 {
                font-size: 12px !important;
                width: 100% !important;
                table-layout: auto !important;
            }

            #tech-companies-1 th,
            #tech-companies-1 td {
                padding: 4px 2px !important;
                line-height: 1.1;
                white-space: normal !important;
                word-break: break-word;
            }

            th {
                /* white-space: nowrap !important; */
                word-break: keep-all !important;
                text-align: center !important;
            }

            .card-body {
                padding: 0.75rem !important;
            }

            .table-responsive {
                overflow-x: hidden !important;
            }

            /* } */
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
                                    <button type="button" class="btn btn-primary waves-effect btn-label waves-light"
                                        onclick="resetSearch()"><i class="bx bx-reset label-icon"></i> Reset</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form class="app-search d-none d-lg-block pt-0 pb-0">
                                    <div class="position-relative">
                                        <input id="searchFilterText" type="search" class="form-control bg-black opacity-50"
                                            value="{{ $inputdata['searchterm'] ?? '' }}" placeholder="Search..."
                                            autocomplete="off">
                                        <button id="searchFilterBtn" class="btn btn-primary" type="button"><i
                                                class="bx bx-search-alt align-middle"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2 text-right" style="text-align: right;">
                                <div class="mb-4">
                                    <button type="button" class="btn btn-secondary">Showing <span id="loaded-count">{{ $results->count() }}</span> of {{ $total }}</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            {{-- @dump($results) --}}
                            <div class="col-md-12">
                                <div class="table-rep-plugin">
                                    <div class="{!! $results->count() > 0 ? 'table-responsive' : '' !!} mb-0"
                                        data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered">
                                            <thead class="table-primary pdng_d">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ref No.</th>
                                                    <th>G</th>
                                                    <th>Name</th>
                                                    <th class="text-nowrap">Born</th>
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
                                                    <th>TL</th>
                                                    <th>TC</th>
                                                    <th>RM</th>
                                                    <th>L_CALL</th>
                                                    <th>L_Mail</th>
                                                    <th>L_Mtng</th>
                                                    <th>R_Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="results-container">
                                                @include('panel.Services.partials._search_results_rows', ['results' => $results, 'cacheKey' => $cacheKey])
                                            </tbody>
                                        </table>

                                        <div id="loading-indicator" class="text-center my-3" style="display: none;">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
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
                            <label class="form-label">Born:</label>
                            <input class="form-control" name="born" type="text" maxlength="4"
                                oninput="this.value=this.value.replace(/\D/g,'').slice(0,4)" placeholder="YYYY"
                                value="{{ $inputdata['born'] ?? '' }}">
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-12 mb-3">
                            <label class="form-label">From Age:</label>
                            <input class="form-control" name="from_age" type="number" min="18"
                                value="{{ $inputdata['from_age'] ?? '' }}">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">To Age:</label>
                            <input class="form-control" name="to_age" type="number" max="70"
                                value="{{ $inputdata['to_age'] ?? '' }}">
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
                            <input class="form-control" type="text" value="{{ $inputdata['arealocation'] ?? '' }}"
                                name="arealocation">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mb-3">
                            <label class="form-label">Marital:</label>
                            <select name="ms" id="ms" class="form-select">
                                <option value="">Select</option>
                                <option value="1" {{ isset($inputdata['ms']) && $inputdata['ms'] == '1' ? 'selected' : '' }}>
                                    Never Married</option>
                                <option value="2" {{ isset($inputdata['ms']) && $inputdata['ms'] == '2' ? 'selected' : '' }}>
                                    Divorced</option>
                                <option value="3" {{ isset($inputdata['ms']) && $inputdata['ms'] == '3' ? 'selected' : '' }}>
                                    Widow</option>
                                <option value="4" {{ isset($inputdata['ms']) && $inputdata['ms'] == '4' ? 'selected' : '' }}>
                                    Separated</option>
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
        var nextCursor = @json($results->nextCursor() ? $results->nextCursor()->encode() : null);
        var isLoading = false;
        var hasMorePages = {{ $results->hasMorePages() ? 'true' : 'false' }};
        var inputData = @json($inputdata);
        var totalLoaded = {{ $results->count() }};

        $(function () {
            // Row selection logic
            $(document).on('change', '.chkrno', function () {
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
                let search_term = $("#searchFilterText").val();
                if (search_term.trim() == "") {
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
            let scrollTimeout;

            // Proactive Infinite Scroll logic
            $(window).on('scroll', function () {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(checkAndLoadMore, 100);
            });

            // Start auto-loading all data on page load
            if (hasMorePages) {
                setTimeout(loadMoreResults, 1000);
            }

            function checkAndLoadMore() {
                if (isLoading || !hasMorePages) return;

                let scrollPosition = $(window).scrollTop() + $(window).height();
                let docHeight = $(document).height();
                
                // Trigger when user has scrolled 40% through the current content
                let triggerPoint = docHeight * 0.4; 

                if (scrollPosition >= triggerPoint) {
                    loadMoreResults();
                }
            }

            function loadMoreResults() {
                if (isLoading || !hasMorePages) return;
                
                isLoading = true;
                $('#loading-indicator').show();

                $.ajax({
                    url: "{{ route('search-data') }}",
                    type: 'GET',
                    data: {
                        ...inputData,
                        cursor: nextCursor
                    },
                    success: function (response) {
                        if (response.html.trim() === "") {
                            hasMorePages = false;
                        } else {
                            let $newRows = $(response.html);
                            $('#results-container').append($newRows);
                            nextCursor = response.next_cursor;
                            hasMorePages = response.hasMorePages;
                            
                            // Update counter
                            totalLoaded += $newRows.filter('tr').length;
                            $('#loaded-count').text(totalLoaded);

                            // Re-initialize feather icons for new rows
                            if (typeof feather !== 'undefined') {
                                feather.replace();
                            }

                            // AUTO LOAD MORE: Continue loading until all data is fetched
                            if (hasMorePages) {
                                setTimeout(loadMoreResults, 500); 
                            }
                        }
                        isLoading = false;
                        $('#loading-indicator').hide();
                    },
                    error: function () {
                        isLoading = false;
                        $('#loading-indicator').hide();
                    }
                });
            }
        });
    </script>

    <script>
        function resetSearch() {
            const url = new URL(window.location.href);

            const searchinfield = url.searchParams.get('searchinfield');
            const searchvalue = url.searchParams.get('searchvalue');

            // Clear all params
            url.search = '';

            // Re-add only required params
            if (searchinfield) url.searchParams.set('searchinfield', searchinfield);
            if (searchvalue) url.searchParams.set('searchvalue', searchvalue);

            // Reload page
            window.location.href = url.toString();
        }
    </script>

@endsection