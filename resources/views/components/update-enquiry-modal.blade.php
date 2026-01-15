{{-- Fix Member Modal --}}
<div class="modal fade" id="updateEnquiryModal" tabindex="-1" role="dialog" aria-labelledby="updateEnquiryModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content biodata-popup-h">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5 class="modal-title font-size-16" id="IntractionPageTitle">Update Enquiry</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmUpdateEnquiry" method="POST" action="#">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">Refrence No.</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="updateEnquiryModal_rno"
                                disabled>
                        </div>
                        <div class="col-4 mt-0">
                            <label for="" class="form-label">Name:</label>
                            <input class="form-control bg-secondary-subtle" type="text" id="updateEnquiryModal_refname"
                                disabled>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="updateEnquiryModal_furtheraction" class="form-label">Further Action</label>
                            <textarea name="furtheraction" id="updateEnquiryModal_furtheraction" class="form-control"
                                rows="4" placeholder="Further Action" spellcheck="false" required></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="status" value="1" />
                        <input type="hidden" name="updatedby" value="{{ auth()->user()->username }}" />
                        <input type="hidden" name="updatedatetime" value="{{ now() }}" />
                        <input type="hidden" id="updateEnquiryModal_enquiry_id" data-enquiry_id="" />
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