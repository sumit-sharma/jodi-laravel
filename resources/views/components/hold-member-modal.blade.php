<!-- Hold Member Modal -->
<div class="modal fade" id="holdMemberModal" tabindex="-1" role="dialog" aria-labelledby="holdMemberModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="IntractionPageTitle"><span
                                class="holdMemberModal_action_label"></span>
                            Member</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmHoldMember" method="POST" action="{{ route('save-hold-member') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="holdMemberModal_refno"
                                disabled>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="holdMemberModal_refname"
                                disabled>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-6 mt-4">
                            <label for="" class="form-label"><span class="holdMemberModal_action_label"></span>
                                Date</label>
                            <input class="form-control bg-secondary-subtle" type="text"
                                value="{{ now()->format('M d, Y') }}" disabled>
                        </div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label"><span class="holdMemberModal_action_label"></span>
                                Time</label>
                            <input class="form-control bg-secondary-subtle" type="text"
                                value="{{ now()->format('h:i A') }}" disabled>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-6 mt-4">
                            <label for="" class="form-label"><span class="holdMemberModal_action_label"></span>
                                By</label>
                            <select name="hold_by" id="hold_by" class="form-select" style="width: 100%; height: 40px;"
                                required>
                                <option>Select</option>
                            </select>
                        </div>

                        <div class="col-6 mt-4">
                            <label for="" class="form-label">Reason for <span
                                    class="holdMemberModal_action_label"></span></label>
                            <textarea name="reason" class="form-control" rows="4" placeholder="Enter remarks"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="rno" id="holdMemberModal_rno" />
                        <input type="hidden" id="holdMemberModal_status" name="status" />

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->