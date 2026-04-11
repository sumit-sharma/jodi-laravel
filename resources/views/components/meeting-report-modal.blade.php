<!-- daily report Modal -->
<div class="modal fade" id="ShowMeetingReportModal" tabindex="-1" role="dialog"
    aria-labelledby="showMeetingReportModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="IntractionPageTitle"><span
                                class="addAttendanceModalModal_action_label"></span>
                            Daily Report</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{-- <div id="bio_loader" class="modal_loader text-center p-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div> --}}

                <form id="frmShowMeetingReportModal" method="GET" action="{{ route('reports.meeting-report') }}">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Start Date:</label>
                            <input type="text" name="start_date" id="meeting_start_date" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">End Date:</label>
                            <input type="text" name="end_date" id="meeting_end_date" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Employee:</label>
                            <select class="form-select" id="meeting_empid" name="empid">

                            </select>
                        </div>
                        <div class="clearfix"></div>
                        {{-- <input type="hidden" name="username" value="{{ auth()->user()->username }}" /> --}}
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Show</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->