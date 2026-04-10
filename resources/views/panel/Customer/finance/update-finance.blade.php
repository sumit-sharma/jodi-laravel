<!-- Hold Member Modal -->
<div class="modal fade" id="addAttendanceModal" tabindex="-1" role="dialog"
    aria-labelledby="addAttendanceModalModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="IntractionPageTitle"><span
                                class="addAttendanceModalModal_action_label"></span>
                            Add Attendance</h5>
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

                <form id="frmaddAttendanceModal" method="POST" action="{{ route('add-attendance') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Select Date:</label>
                            <input type="text" name="dated" id="dated" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Select Employee:</label>
                            <select name="empid" id="empid" class="form-select" style="width: 100%;" required>
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-4 mt-0">
                            <label for="" class="form-label">In Time:</label>
                            <input type="text" name="intime" id="intime" class="tp form-control" autocomplete="off"
                                required>
                        </div>
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">Out Time:</label>
                            <input type="text" name="outtime" id="outtime" class="tp form-control" autocomplete="off"
                                required>
                        </div>
                        <div class="col-4 mt-0">
                            <label for="add_status" class="form-label">Status:</label>
                            <select name="status" id="add_status" class="form-select" required>
                                <option value="Normal" selected="selected">Normal</option>
                                <option value="Absent">Absent</option>
                                <option value="Late">Late</option>
                                <option value="Half Day">Half Day</option>
                                <option value="Went Early">Went Early</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Remark:</label>
                            <textarea id="remarks" name="remarks" class="form-control" rows="4"
                                placeholder="Enter Description" spellcheck="false"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                Attendance</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->