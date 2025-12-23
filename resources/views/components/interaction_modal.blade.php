<!-- Modal -->
<div class="modal fade" id="IntractionPageModal" tabindex="-1" role="dialog" aria-labelledby="IntractionPageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="IntractionPageTitle">Add Interaction</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmAddInteraction" method="{{ route('save-interaction') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="inter_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="inter_refname"></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Intraction Date:</label>
                            <input class="form-control" type="date" id="inter_dated" name="dated" placeholder=""
                                max="{{ now()->format('Y-m-d') }}" value="{{ now()->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Intraction Time:</label>
                            <input class="form-control timepicker" type="text" id="inter_tob" name="time"
                                placeholder="Interaction Time" readonly>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-4 mt-4">
                            <label for="" class="form-label">Call Type:</label>
                            <select name="calltype" id="calltype" class="form-select">
                                <option value="0">Incoming</option>
                                <option value="1" selected="selected">Outgoing</option>
                                <option value="2">Sms</option>
                                <option value="3">Email</option>
                                <option value="4">Personal Visit</option>
                                <option value="5">Home Visit</option>
                                <option value="6">NR</option>
                            </select>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label">Call Status:</label>
                            <select name="callstatus" id="callstatus" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label">Future Date:</label>
                            <input name="futuredate" class="form-control" type="date" min="{{ now()->format('Y-m-d') }}"
                                required>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Description:</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Enter Description"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="clearfix"></div>

                        <input type="hidden" id="inter_rno" name="rno" />

                        <div class="col-12 mt-4">
                            <button type="button" id="btnAddInteraction"
                                class="btn btn-primary waves-effect waves-light">Save
                                Interaction</button>
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