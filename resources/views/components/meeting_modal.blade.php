       <!-- Modal -->
       <div class="modal fade" id="MeetingPageModal" tabindex="-1" role="dialog" aria-labelledby="MeetingPageTitle"
           aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content biodata-popup-h">
                   <div class="modal-header">
                       <div class="row">
                           <div class="col-12">
                               <h5 class="modal-title font-size-16" id="MeetingPageTitle">Add Meeting Schedule</h5>
                           </div>
                       </div>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>

                   <div class="modal-body">

                       <div class="row">
                           <div class="col-4 mt-0">
                               <label for="" class="form-label">Refrence No.</label>
                               <label class="form-control" id="meet_refno"></label>
                           </div>
                           <div class="col-4 mt-0">
                               <label for="" class="form-label">Name:</label>
                               <label class="form-control" id="meet_refname"></label>
                           </div>
                           <div class="col-4 mt-0">
                               <label for="" class="form-label">Meeting Status:</label>
                               <select name="meeting_type" class="form-select">
                                    <option value="Family Meeting">Family Meeting</option>
                                    <option value="Parent Meeting">Parent Meeting</option>
                                    <option value="Individual Meeting">Individual Meeting</option>
                               </select>

                           </div>
                           <div class="clearfix"></div>

                           <div class="col-4 mt-4">
                               <label for="" class="form-label">Meeting Date:</label>
                               <input class="form-control" type="date" value="2019-08-19" id="">
                           </div>
                           <div class="col-4 mt-4">
                               <label for="" class="form-label">Meeting Time:</label>
                               <input class="form-control" type="time" value="13:45:00" id="">
                           </div>
                           <div class="col-4 mt-4">
                               <label for="" class="form-label">Meeting Place:</label>
                               <input class="form-control" type="text" value="" id="">
                           </div>
                           <div class="clearfix"></div>

                           <div class="col-6 mt-4">
                               <label for="" class="form-label">Meeting Conducted By:</label>
                               <select class="form-select">
                                   <option>Select</option>
                                   <option>...</option>
                                   <option>...</option>
                               </select>
                           </div>
                           <div class="col-6 mt-4">
                               <label for="" class="form-label">&nbsp;</label>
                               <select class="form-select">
                                   <option>Select</option>
                                   <option>...</option>
                                   <option>...</option>
                               </select>
                           </div>
                           <div class="clearfix"></div>

                           <div class="col-6 mt-4">
                               <label for="" class="form-label">Meeting Attended By:</label>
                               <select class="form-select">
                                   <option>Select</option>
                                   <option>...</option>
                                   <option>...</option>
                               </select>
                           </div>
                           <div class="col-6 mt-4">
                               <label for="" class="form-label">&nbsp;</label>
                               <select class="form-select">
                                   <option>Select</option>
                                   <option>...</option>
                                   <option>...</option>
                               </select>
                           </div>
                           <div class="clearfix"></div>

                           <div class="col-12 mt-4">
                               <label for="" class="form-label">Meeting Remark:</label>
                               <textarea name="" class="form-control" form="" rows="4" placeholder="Enter Description"
                                   spellcheck="false"></textarea>
                           </div>
                           <div class="clearfix"></div>
                           <input type="hidden" id="meet_rno" name="rno" />
                           <div class="col-12 mt-4">
                               <button type="button" class="btn btn-primary waves-effect waves-light">Save
                                   Meeting</button>
                           </div>
                           <div class="clearfix"></div>

                       </div>
                   </div>
                   <!--<div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>-->
               </div>
           </div>
       </div>
       <!-- end modal -->
