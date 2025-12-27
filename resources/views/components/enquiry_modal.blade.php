<!-- Modal -->
<div class="modal fade" id="EnquiryPageModal" tabindex="-1" role="dialog" aria-labelledby="EnquiryPageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="EnquiryPageTitle">Enquiry</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmAddEnquiry" method="POST" action="{{ route('save-enquiry') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="enquiry_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="enquiry_refname"></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Enquiry Date:</label>
                            <input class="form-control" type="date" id="enquiry_date" name="dated" placeholder=""
                                value="{{ now()->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Enquiry Time:</label>
                            <input class="form-control timepicker" type="time" id="enquiry_time" name="time"
                                placeholder="Enquiry Time" readonly>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Reason for Enquiry:</label>
                            <select name="enqpur" id="enqpur" class="form-select">
                                <option value="For more profiles" selected="selected">For more profiles</option>
                                <option value="For more meetings">For more meetings</option>
                                <option value="For any profile related dispute">For any profile related dispute</option>
                                <option value="For any other complaints">For any other complaints</option>
                                <option value="For refund">For refund</option>
                            </select>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="" class="form-label">SL for:</label>
                            <select name="slfor" id="slfor" class="form-select" style="width: 100%;" required>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Remarks:</label>
                            <textarea name="remarks" class="form-control" rows="4" placeholder="Enter Remarks"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="clearfix"></div>

                        <input type="hidden" id="enquiry_rno" name="rno" />

                        <div class="col-12 mt-4">
                            <button type="submit" id="btnAddEnquiry"
                                class="btn btn-primary waves-effect waves-light">Save
                                Enquiry</button>
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