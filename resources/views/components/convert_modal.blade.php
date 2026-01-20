<!-- Modal -->
<div class="modal fade" id="ConvertMemberModal" tabindex="-1" role="dialog" aria-labelledby="ConvertPageTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="ConvertPageTitle">Convert Member</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="convert_loader" class="text-center p-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <form id="frmConvertMemberProcess" action="{{ route('convert-member') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Convert From:</label>
                            <input class="form-control" type="text" id="convert_from" name="convert_from"
                                placeholder="Convert From" readonly>
                        </div>
                        <div class="col-6 mt-0">
                            <label for="" class="form-label">Convert To:</label>
                            <input class="form-control" type="text" id="convert_to" name="convert_to"
                                placeholder="Convert To" readonly>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-4 mt-4">
                            <label for="" class="form-label">TC Code:</label>
                            <select name="tc_code" id="tc_code" class="form-select" required></select>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label">TL Code:</label>
                            <select name="tl_code" id="tl_code" class="form-select" required></select>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="form-label">RM Code:</label>
                            <select name="rm_code" id="rm_code" class="form-select" required></select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>

                        <input type="hidden" id="convert_rno" name="rno" />

                        <div class="col-12 mt-4 pt-2">
                            <button type="submit" id="btnConvertMember"
                                class="btn btn-primary waves-effect waves-light">Convert Member and Apply Codes</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->