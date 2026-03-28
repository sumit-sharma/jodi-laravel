<!-- Modal -->
<div class="modal fade" id="AddFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="FeedbackPageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="FeebbackPageTitle">Add Feedback</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmAddFeedback" action="{{ route('save-feedback') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="feedback_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="feedback_refname"></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Feedback Date:</label>
                            <input class="form-control" type="date" id="feedback_dated" name="dated" placeholder=""
                                max="{{ now()->format('Y-m-d') }}" value="{{ now()->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Feedback Time:</label>
                            <input class="form-control timepicker" type="text" id="feedback_tob" name="time" readonly>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Proposal:</label>
                            <select name="proposal" id="feedback_proposal" class="form-select"></select>
                        </div>
                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Feedback Status:</label>
                            <select name="fstatus" id="fstatus" class="form-select">
                                <option value="0">No</option>
                                <option value="1" selected="selected">Yes</option>
                                <option value="2">Can't Decide Now</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Feedback Details:</label>
                            <select name="feedback" id="feedbackdetails" class="form-select"></select>
                        </div>
                        <div class="clearfix"></div>

                        <input type="hidden" id="feedback_rno" name="rno" />

                        <div class="col-12 mt-4">
                            <button type="submit" id="btnAddFeedback"
                                class="btn btn-primary waves-effect waves-light">Save
                                Feedback</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->