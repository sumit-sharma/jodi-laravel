@extends('layouts.home')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        @php
                            if ($moreInfo->rno) {
                                $type = 'Update';
                            } else {
                                $type = 'Add';
                            }
                        @endphp
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">{{ $type }} More Info</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main</a></li>
                                            <li class="breadcrumb-item active">{{ $type }} More Info</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Reference No.</label>
                                        <label class="form-control">{{ $rno }}</label>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Name </label>
                                        <label class="form-control">{{ $bio->refname }}</label>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Met With </label>
                                        @foreach ($employees as $item)
                                            @if ($moreInfo->metwith == $item->username)
                                                <label>{{ $item->username . '-' . $item->name }}</label>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Member</label>
                                        <textarea name="member" class="form-control" rows="4" placeholder="Enter member"
                                            spellcheck="false" disabled> {{ $moreInfo->member }}</textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Current Profession </label>
                                        <textarea name="profession" class="form-control" rows="4"
                                            placeholder="Enter current profession details" spellcheck="false"
                                            disabled>{{ $moreInfo->profession }}</textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Family Outlook </label>
                                        <textarea name="family" class="form-control" rows="4"
                                            placeholder="Enter family outlook" spellcheck="false"
                                            disabled>{{ $moreInfo->family }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">Properties</label>
                                        <select name="prop1" class="form-select" disabled>
                                            <option value="" {{ $moreInfo->prop1 == '' ? 'selected' : '' }}>
                                            </option>
                                            <option value="Owned" {{ $moreInfo->prop1 == 'Owned' ? 'selected' : '' }}>
                                                Owned</option>
                                            <option value="Rented" {{ $moreInfo->prop1 == 'Rented' ? 'selected' : '' }}>
                                                Rented</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">&nbsp; </label>
                                        <select name="prop2" class="form-select" disabled>
                                            <option value="" {{ $moreInfo->prop2 == '' ? 'selected' : '' }}>
                                            </option>
                                            <option value="Kothi" {{ $moreInfo->prop2 == 'Kothi' ? 'selected' : '' }}>
                                                Kothi</option>
                                            <option value="Floor" {{ $moreInfo->prop2 == 'Floor' ? 'selected' : '' }}>
                                                Floor</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="" class="form-label">&nbsp; </label>
                                        <select name="prop3" class="form-select" disabled>
                                            <option value="" {{ $moreInfo->prop3 == '' ? 'selected' : '' }}></option>
                                            <option value="Joint" {{ $moreInfo->prop3 == 'Joint' ? 'selected' : '' }}>Joint
                                            </option>
                                            <option value="Nuclear" {{ $moreInfo->prop3 == 'Nuclear' ? 'selected' : '' }}>
                                                Nuclear</option>
                                            <option value="Floorwise" {{ $moreInfo->prop3 == 'Floorwise' ? 'selected' : '' }}>
                                                Floorwise</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-12 mt-3">
                                        <label for="" class="form-label">Properties Details </label>
                                        <textarea name="properties" class="form-control" rows="4"
                                            placeholder="Enter details" spellcheck="false"
                                            disabled>{{ $moreInfo->properties }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Residence </label>
                                        <textarea name="residence" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->residence }}</textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Business </label>
                                        <textarea name="business" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->business }}</textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Income </label>
                                        <textarea name="income" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->income }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Rented Income </label>
                                        <textarea name="rentedincome" class="form-control" rows="4"
                                            placeholder="Enter details" spellcheck="false"
                                            disabled>{{ $moreInfo->rentedincome }}</textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Turnover </label>
                                        <textarea name="turnover" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->turnover }}</textarea>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <label for="" class="form-label">Vehicle </label>
                                        <textarea name="vehicle" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->vehicle }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mt-3">
                                        <label for="" class="form-label">Any Roka Earlier </label>
                                        <textarea name="roka" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->roka }}</textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="" class="form-label">Remarks </label>
                                        <textarea name="remarks" class="form-control" rows="4" placeholder="Enter details"
                                            spellcheck="false" disabled>{{ $moreInfo->remarks }}</textarea>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>

                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <div class="clearfix"></div>


        </div>
        <!-- end row-->


    </div> <!-- container-fluid -->
@endsection