{{-- Fix Member Modal --}}
<div class="modal fade" id="fixMemberModal" tabindex="-1" role="dialog" aria-labelledby="fixMemberModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="IntractionPageTitle"><span
                                class="fixActiveMemberModal_action_label"></span> Member</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmFixMember" method="POST" action="{{ route('save-fix-member') }}">
                    @csrf
                    <div class="row">
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="fixMemberModal_refno"
                                disabled>
                        </div>
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="fixMemberModal_refname"
                                disabled>
                        </div>
                        <div class="col-4 mt-0">
                            <label for="" class="form-label"><span class="fixActiveMemberModal_action_label"></span>
                                Date</label>
                            <input class="form-control bg-secondary-subtle" type="text"
                                value="{{ now()->format('M d, Y') }}" disabled>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-4 mt-4">
                            <label for="" class="form-label"><span class="fixActiveMemberModal_action_label"></span>
                                Time</label>
                            <input class="form-control bg-secondary-subtle" type="text"
                                value="{{ now()->format('h:i A') }}" disabled>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label"><span class="fixActiveMemberModal_action_label"></span>
                                By</label>
                            <select name="fix_by" id="fix_by" class="form-select" style="width: 100%; height: 40px;"
                                required>
                                <option>Select</option>
                            </select>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label"><span class="fixActiveMemberModal_action_label"></span>
                                Source</label>
                            <select name="fixed_through" id="fixed_through" class="form-select" required>
                                <option>Select</option>
                                <option value="Own Source">Own Source</option>
                                <option value="Jodi Search">Jodi Search</option>
                                <option value="Other Reason">Other Reason</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Remarks (if any)</label>
                            <textarea name="remarks" class="form-control" rows="4" placeholder="Enter remarks"
                                spellcheck="false" required></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="rno" id="fixMemberModal_rno" />
                        <input type="hidden" name="status" id="fixMemberModal_status" />

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
{{-- end modal --}}