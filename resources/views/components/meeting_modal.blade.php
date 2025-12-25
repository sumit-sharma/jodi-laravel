<!-- Modal -->
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

<div class="modal fade" id="MeetingPageModal" tabindex="-1" role="dialog" aria-labelledby="MeetingPageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="MeetingPageTitle">Add Meeting Schedule</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form id="frmAddMeeting" method="POST" action="{{ route('save-meeting') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="meet_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="meet_refname"></label>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-6 mt-4 mb-2">
                            <label for="" class="form-label d-block">Meeting With:</label>
                            <select class="form-select" id="meeting_with" name="proposal">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Meeting Status:</label>
                            <select name="meeting_type" class="form-select">
                                <option value="Family Meeting">Family Meeting</option>
                                <option value="Parent Meeting">Parent Meeting</option>
                                <option value="Individual Meeting">Individual Meeting</option>
                            </select>

                        </div>
                        <div class="clearfix"></div>

                        <div class="col-4 mt-4">
                            <label for="" class="form-label">Meeting Date:</label>
                            <input name="dated" class="form-control" type="date" {{--
                                min="{{ now()->subDay(1)->format('Y-m-d') }}" --}}>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label">Meeting Time:</label>
                            <input name="time" class="form-control timepicker" type="text" id="meeting_time" readonly>
                        </div>


                        <div class="col-4 mt-4">
                            <label for="" class="form-label">Meeting Place:</label>
                            <input name="place" class="form-control" type="text" value="" id="">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Meeting Conducted By:</label>
                            <select name="mtg_by1" id="mtg_by1" class="form-select">
                                <option>Select</option>
                            </select>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="" class="form-label">&nbsp;</label>
                            <select name="mtg_by2" id="mtg_by2" class="form-select">
                                <option>Select</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Meeting Attended By:</label>
                            <select name="att_by1" id="att_by1" class="form-select">
                                <option>Select</option>
                            </select>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="" class="form-label">&nbsp;</label>
                            <select name="att_by2" id="att_by2" class="form-select">
                                <option>Select</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Meeting Remark:</label>
                            <textarea name="remarks" class="form-control" rows="4" placeholder="Enter Description"
                                spellcheck="false"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" id="meet_rno" name="rno" />
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                Meeting</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
            <!--<div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>-->
        </div>
    </div>
</div>
<!-- end modal -->