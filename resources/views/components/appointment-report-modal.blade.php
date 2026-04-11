<!-- daily report Modal -->
<div class="modal fade" id="AppointmentReportModal" tabindex="-1" role="dialog"
    aria-labelledby="AppointmentReportModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="AppointmentReportModalTitle"><span
                                class="addAttendanceModalModal_action_label"></span>
                            Appointment Report</h5>
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

                <form id="frmAppointmentReportModal" method="GET" action="{{ route('appointment-report.index') }}">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Start Date:</label>
                            <input type="text" name="from_date" id="appointment_start_date" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">End Date:</label>
                            <input type="text" name="to_date" id="appointment_end_date" class="form-control"
                                autocomplete="off" required>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Employee:</label>
                            <select class="form-select" id="appointment_empid" name="empid">

                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Select Appointment Type:</label>
                            <select class="form-select" name="apttype">
                                <option value="">Select Appointment Type</option>
                                <option value="Final">Final</option>
                                <option value="Pickup">Pickup</option>
                                <option value="Home Visit">Home Visit</option>
                                <option value="Upgradation">Upgradation</option>
                                <option value="Meeting">Meeting</option>
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Select Appointment Status:</label>
                            <select class="form-select" name="aptstatus">
                                <option value="">Select Appointment Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Done</option>
                                <option value="2">Cancelled</option>
                                <option value="3">Postponed</option>
                                <option value="4">All</option>
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