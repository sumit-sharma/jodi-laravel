<!-- Modal -->
<div class="modal fade" id="SaveSLModal" tabindex="-1" role="dialog" aria-labelledby="SaveSLModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="SaveSLModalTitle">Save for SL</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmSaveSL" action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">RNo.</label>
                            <input class="form-control" type="text" id="sl_input_rno">
                        </div>
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="sl_input_name" disabled>
                        </div>
                        <label id="error_msg" class="text-danger display_msg"></label>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="table-sl-result" class="table table-bordered">
                                        <thead class="table-primary pdng_d">
                                            <tr>
                                                <th>#</th>
                                                <th>Ref. No.</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                            </tr>
                                        </thead>
                                        <tbody class="pdng_d"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <label id="success_msg" class="text-success display_msg"></label>
                        <input type="hidden" name="rno" id="saveSLModal_rno" />
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save SL</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->