@extends('layouts.home')

@section('main-content')

    <div class="container-fluid">

        <style>
            .select2-results__option {
                padding: 0.5px 0 !important;
                /* margin-top: 6px !important; */
            }

            .bg-pink {
                display: block;
                width: 100%;
                padding: 6px 10px;
                color: #4d4afbff !important;
                background-color: #FFB7DB !important;
            }
        </style>
        <div class="row">


            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <form action="{{ route('sendmail.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                <div class="col-6">
                                    <div class="row">
                                        <input type="hidden" name="rno" value="{{ $customer->rno }}" />
                                        <div class="col-md-4 mt-2">
                                            <label for="example-text-input" class="form-label">Mail To</label>
                                            <label class="form-control bg-secondary-subtle">{{ $customer->rno }}</label>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="example-text-input" class="form-label">Name </label>
                                            <label class="form-control bg-secondary-subtle">{{ $customer->refname }}</label>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="example-text-input" class="form-label">Email</label>
                                            <label
                                                class="form-control bg-secondary-subtle">{{ $customer->personal->contactemail }}</label>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-md-4 mt-2">
                                            <label for="example-text-input" class="form-label"> Proposal </label>
                                            <select class="form-select" name="proposal" id="proposal">
                                                <option>Select</option>
                                                <option value="{{ $customer->rno }}">{{ $customer->rno }} -
                                                    {{ $customer->refname }}
                                                </option>
                                                {{-- Fresh SL --}}
                                                <optgroup label="🆕 Fresh SL">
                                                    @foreach ($fresh as $row)
                                                        <option value="{{ $row['other_id'] }}"
                                                            class="{{ $row['other_status'] == 'F' ? 'bg-pink' : '' }} {{ $row['other_status'] == 'F' ? 'disabled' : '' }}">
                                                            {{ $row['other_id'] }} - {{ $row['other_refname'] ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>

                                                {{-- Already Sent --}}
                                                <optgroup label="📤 Already Sent">
                                                    @foreach ($sent as $row)
                                                        <option value="{{ $row['other_id'] }}"
                                                            class="{{ $row['other_status'] == 'F' ? 'bg-pink' : '' }} {{ $row['other_status'] == 'F' ? 'disabled' : '' }}">
                                                            {{ $row['other_id'] }} - {{ $row['other_refname'] ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>

                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="example-text-input" class="form-label"> Type Sent PDF </label>
                                            <select name="pdf_type" id="pdf_type" class="form-select">
                                                <option value="1">Pdf 1</option>
                                                <option value="2">Pdf 2</option>
                                                <option value="3">Pdf 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="example-text-input" class="form-label">Side</label>
                                            <select name="side" id="side" class="form-select">
                                                <option value="0">Same Side</option>
                                                <option value="1">Opposite Side</option>
                                                <option value="2">Both Side</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-12 mt-2">
                                            <label for="example-text-input" class="form-label"> Enter Massage </label>
                                            <textarea name="matter" class="form-control" rows="11"
                                                placeholder="Enter Massage" spellcheck="false"></textarea>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div>
                                        <label for="example-text-input" class="form-label"> Select Photos </label>
                                        <table class="table table-responsive">
                                            @foreach ($customer->snaps->chunk(5) as $chunk)
                                                <tr>
                                                    @foreach ($chunk as $item)
                                                        <td width="16.5%" align="center">
                                                            <img src="{{ url('uploads/customer/' . $item->photo) }}" width="100%" />
                                                            <input class="form-check-input mt-2 border-primary" type="checkbox"
                                                                name="rno_photo[]" value="{{ $item->photo }}">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div id="section_propsed" class="d-none">
                                        <label for="example-text-input" class="form-label"> Select Photos </label>
                                        <table id="table_proposed" class="table table-responsive">
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-lg waves-effect waves-light">Send
                                        Mail</button>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div><!-- end card -->
                    </form>
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>

            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Sent Mail History</h4>
                                    <!--<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Total Result-1</button>-->
                                </div>
                            </div>
                            <div class="clearfix"></div>




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
                                                                <a href="{{ url('/uploads/customer/' . $photo) }}"
                                                                    class="image-popup" data-lightbox="gallery">
                                                                    {{-- <img src="/uploads/customer/{{ $photo }}" width="100%" />
                                                                    --}}
                                                                    {{ 'File ' . ++$key }}
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

    <script>
        $(document).ready(function () {
            var prerno = "{{ $customer->rno }}";
            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<span class="' + $(state.element).attr('class') + '">' + state.text + '</span>'
                );
                return $state;
            }

            $('#proposal').select2({
                placeholder: "Select or type to add",
                allowClear: true,
                templateResult: formatState
            });

            $('#proposal').on('change', function () {
                const tbody = document.querySelector('#table_proposed tbody');
                tbody.innerHTML = '';
                $("#section_propsed").addClass('d-none');
                var proposal = $(this).val();
                if (prerno == proposal) {
                    $("#side option").each(function () {
                        if ($(this).val() != 0) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                    // $("#side").val(0);
                } else {
                    $("#side option").show();
                    var url = "{{ route('fetch-images', ['rno' => ':rno']) }}";
                    url = url.replace(':rno', proposal);
                    fetch(url).then(response => response.json()).then(data => {
                        console.log(data.data);
                        $("#section_propsed").removeClass('d-none');
                        let html = '<tr>';
                        data.data.forEach(element => {
                            html += `<td width="16.5%" align="center">
                                                                        <img src="/uploads/customer/${element.photo}" width="100%" />
                                                                        <input class="form-check-input mt-2 border-primary" type="checkbox"
                                                                            name="prop_photo[]" value="${element.photo}">
                                                                    </td>`;
                        });
                        html += '</tr>';
                        tbody.innerHTML = html;
                    });
                }
            });
        });
    </script>
@endsection