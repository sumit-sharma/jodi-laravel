<!-- Modal -->
<div class="modal fade" id="ChangeTCTLRMPageModal" tabindex="-1" role="dialog" aria-labelledby="ChangeTCTLRMPageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="ChangeTCTLRLPageTitle">Change TC/TL/RM</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmConvertMember" action="{{ route('edit-tctlrm-member') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <label class="form-control" id="chg_tctlrm_refno"></label>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <label class="form-control" id="chg_tctlrm_refname"></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">TC Code:</label>
                            <select name="tc" id="tc" class="form-select" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">TL Code:</label>
                            <select name="tl" id="tl" class="form-select" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-0">
                            <label for="" class="form-label">RM Code:</label>
                            <select name="rm" id="rm" class="form-select" style="width: 100%;" required>
                            </select>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <input type="hidden" id="tctlrm_rno" name="rno" />
                    <input type="hidden" id="old_tc" name="old_tc" />
                    <input type="hidden" id="old_tl" name="old_tl" />
                    <input type="hidden" id="old_rm" name="old_rm" />

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                            Information</button>
                    </div>
                    <div class="clearfix"></div>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->