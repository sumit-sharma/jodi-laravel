<!-- daily report Modal -->
<div class="modal fade" id="showFinanceReportModal" tabindex="-1" role="dialog"
    aria-labelledby="showFinanceReportModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="FinancePageTitle"><span
                                class="finance_report_action_label"></span>
                            Finance Report</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{-- <div id="bio_loader" class="modal_loader text-center p-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div> --}}

                <form id="frmShowFinanceReportModal" method="GET" action="{{ route('reports.finance-report') }}">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Start Date:</label>
                            <input type="date" name="start_date" id="finStartDate" class="form-control js-date"
                                autocomplete="off" required value="{{ now()->subDays(2)->format('Y-m-d') }}">
                        </div>
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">End Date:</label>
                            <input type="date" name="end_date" id="finEndDate" class="form-control" autocomplete="off"
                                required value="{{ now()->subDays(1)->format('Y-m-d') }}">
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Employee:</label>
                            <select name="tc" id="finance_report_tc" class="form-select" style="width: 100%;">
                                <option value="">-</option>
                            </select>
                        </div>


                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Show</button>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->