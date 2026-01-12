<!-- Modal -->
<div class="modal fade" id="FollowUpModal" tabindex="-1" role="dialog" aria-labelledby="FollowUpModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="ChangeTCTLRLPageTitle">Followup</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmFollowUp" action="{{ route('save-followup') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="followup_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="followup_refname"></label>
                        </div>

                    </div>
                    <div class="row prev_date">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">Prev. Assign Date:</label>
                            <label class="form-control" id="followup_prev_date"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">Assign To:</label>
                            <select name="empid" id="followup_empid" class="form-select" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <input type="hidden" id="followup_rno" name="rno" />

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Put in Followup</button>
                    </div>
                    <div class="clearfix"></div>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->