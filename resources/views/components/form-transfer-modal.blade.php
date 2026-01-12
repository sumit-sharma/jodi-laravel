<!-- Modal -->
<div class="modal fade" id="FormTransferModal" tabindex="-1" role="dialog" aria-labelledby="FormTransferModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="ChangeTCTLRLPageTitle">Form Transfer</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmFormTransfer" action="{{ route('save-form-transfer') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="form_transfer_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="form_transfer_refname"></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">Transfer To:</label>
                            <select name="assign_to" id="form_transfer_empid" class="form-select" style="width: 100%;"
                                required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">Remarks (if any)</label>
                            <textarea name="remarks" class="form-control" rows="4" placeholder="Enter remarks"
                                spellcheck="false" required></textarea>
                        </div>

                    </div>
                    <div class="clearfix"></div>

                    <input type="hidden" id="form_transfer_rno" name="rno" />

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Transfer</button>
                    </div>
                    <div class="clearfix"></div>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->