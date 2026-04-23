<!-- Hold Member Modal -->
<div class="modal fade" id="UpdateFinanceModal" tabindex="-1" role="dialog"
    aria-labelledby="updateFinanceModalModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="FinanceDetailsTitle">Finance Details</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="fin_loader" class="modal_loader text-center p-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div id="fin_form" class="row" style="display: none;">
                    <div class="col-4 mt-2 mb-4">
                        <label for="" class="form-label">Enter Password</label>
                        <input class="form-control" type="password" value="" id="fin_password"
                            placeholder="enter password">
                    </div>
                    <div class="col-4" style="margin-top:35px;">
                        <button type="button" id="btnChkPasscode" class="btn btn-primary waves-effect waves-light">
                            <i class="bx bx-smile font-size-16 align-middle me-2"></i> Login
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <p id="errorMsg" class="text-danger fw-bolder"></p>
                    <hr>

                    <div class="col-6 mt-2">
                        <label for="" class="form-label">Member No.</label>
                        <input class="form-control bg-secondary-subtle" type="text" id="fin_member_no" disabled>
                    </div>
                    <div class="col-6 mt-2">
                        <label for="" class="form-label">Name:</label>
                        <input class="form-control bg-secondary-subtle" type="text" id="fin_member_name" disabled>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-6 mt-2">
                        <label for="" class="form-label">Package</label>
                        <input class="form-control" type="text" name="package" id="fin_package">
                    </div>
                    <div class="col-6 mt-2">
                        <label for="" class="form-label">R. Date</label>
                        <input class="form-control" type="date" name="r_date" id="fin_r_date">
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-6 mt-2">
                        <label for="" class="form-label">Refrence</label>
                        <select id="refselect" style="min-width: 100%;"></select>
                    </div>
                    <div class="col-6 mt-2">
                        <label for="" class="form-label">Duration</label>
                        <input class="form-control" type="text" value="" id="fin_duration">
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-6 mt-2">
                        <label for="" class="form-label">TC Code</label>
                        <select id="tcselect" style="min-width: 100%;"></select>
                    </div>



                    <div class="col-6 mt-2">
                        <label for="" class="form-label">TL Code</label>
                        <select id="tlselect" style="min-width: 100%;"></select>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-6 mt-2">
                        <label for="" class="form-label">RM Code</label>
                        <select id="rmselect" style="min-width: 100%;"></select>
                    </div>
                    <div class="col-6 mt-2">
                        <label for="" class="form-label">Service</label>
                        <select id="servicetype" class="form-select"></select>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-12 mt-2">
                        <label for="" class="form-label">Other Details</label>
                        <textarea class="form-control" id="otherdetails" rows="2" spellcheck="false"></textarea>
                    </div>
                    <div class="clearfix"></div>


                    <div id="SectionAddFinance" class="row mt-3 bg-danger-subtle pb-3">
                        <div class="hstack gap-3">
                            <div class="col-3 mt-2">
                                <label for="" class="form-label">Amount</label>
                                <input class="form-control" type="text" id="fin_amount">
                            </div>
                            <div class="col-3 mt-2">
                                <label for="" class="form-label">Dated</label>
                                <input class="form-control" type="date" id="fin_dated">
                            </div>
                            <div class="col-4 mt-2">
                                <label for="" class="form-label">Payment Details</label>
                                <input class="form-control" type="text" id="fin_payment_details">
                            </div>

                            <div class="col-2" style="margin-top: 35px;">
                                <button id="btnAddFinance" type="button" class="btn btn-secondary" disabled>Add</button>
                            </div>
                        </div>
                    </div>

                    <div id="amtDetailsSection" class="col-12 mt-4" style="display: none;">
                        <h5>Amount Details</h5>
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="table_finance_entries" class="table table-bordered">
                                    <thead class="table-primary pdng_d">
                                        <tr>
                                            <th data-priority="1" width="">SI. No</th>
                                            <th data-priority="2" width="">Amount</th>
                                            <th data-priority="3" width="">Date</th>
                                            <th data-priority="4" width="">Details</th>
                                            <th data-priority="5" width="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="pdng_d"></tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>




                    <div class="col-12 mt-4">
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save All
                            Information</button>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->