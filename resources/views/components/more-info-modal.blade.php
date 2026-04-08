<style>
    #moreInfoSection tr {
        height: 50px !important;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="MoreInfoModal" tabindex="-1" role="dialog" aria-labelledby="moreInfoModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <h5 class="modal-title font-size-16" id="moreInfoModalTitle">More Info View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="more_info_loader" class="text-center p-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div id="moreInfoSection" class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-bordered bio_data">
                            <tbody>
                                <tr>
                                    <td width="12%"><strong>Reference No.:</strong></td>
                                    <td width="21%"><span id="refno"></span></td>
                                    <td width="12%"><strong>Name:</strong></td>
                                    <td width="21%"><span id="name"></span></td>
                                    <td width="12%"><strong>Met With:</strong></td>
                                    <td width="21%"><span id="met_with"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Member:</strong></td>
                                    <td><span id="member"></span></td>
                                    <td><strong>Current Profession:</strong></td>
                                    <td><span id="current_profession"></span></td>
                                    <td><strong>Family Outlook:</strong></td>
                                    <td><span id="family_outlook"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Properties Type:</strong></td>
                                    <td><span id="properties_type"></span></td>
                                    <td><strong>Properties Details:</strong></td>
                                    <td><span id="properties_details"></span></td>
                                    <td><strong>Residence:</strong></td>
                                    <td><span id="residence"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Business:</strong></td>
                                    <td><span id="business"></span></td>
                                    <td><strong>Income:</strong></td>
                                    <td><span id="income"></span></td>
                                    <td><strong>Rented Income:</strong></td>
                                    <td><span id="rented_income"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Turnover:</strong></td>
                                    <td><span id="turnover"></span></td>
                                    <td><strong>Vehicle:</strong></td>
                                    <td><span id="vehicle"></span></td>
                                    <td><strong>Any Roka Earlier:</strong></td>
                                    <td><span id="any_roka_earlier"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Remarks:</strong></td>
                                    <td><span id="remarks"></span></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--<div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>-->
        </div>
    </div>
</div>
<!-- end modal -->