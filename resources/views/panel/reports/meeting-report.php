<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
		
		
		
       <?php include 'includes/header-css.php'; ?> 
		
		

    </head>

    <body data-topbar="dark" data-sidebar="brand">

        <!-- Begin page -->
        <div id="layout-wrapper">

            
			<?php include 'includes/header2.php'; ?> 
            

            <!-- start main content -->			
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <!--<div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Horizontal</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                            <li class="breadcrumb-item active">Horizontal</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>-->
                        <!-- end page title -->
						
                    <div class="row">

                        <?php include 'includes/inner-menu.php'; ?> 

                        <div class="col-xl-12">
                            <!-- card -->
                            <div class="card">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                              <h4 class="mb-sm-0 font-size-18">Meeting Report</h4>
                                              <div class="page-title-right">
                                                  <ol class="breadcrumb m-0">
                                                      <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                                      <li class="breadcrumb-item active">Meeting Report</li>
                                                  </ol>
                                              </div>
                                           </div>
                                          </div>
										
										<hr>
										
										<div class="col-md-12 col-12">
											<div class="row">
												
											<div class="col-md-2 col-12 mt-2">	
												<label for="example-text-input" class="form-label">	Meeting Report From </label>
                                                <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
											</div>
											<div class="col-md-2 col-12 mt-2">	
												<label for="example-text-input" class="form-label">	Meeting Report To  </label>
                                                <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
											</div>
											<div class="col-md-2 col-12 mt-2">	
												<label for="example-text-input" class="form-label">	Select Employee Code</label>
                                                <select class="form-select">
                                                    <option>Select</option>
                                                    <option>3044-Aditi</option>
                                                    <option>9999-Admin</option>
													<option>3062-Akansha</option>
													<option>3091-Ankit</option>
													<option>1058-Archana Verma</option>
													<option>1034-Arjun</option>
													<option>3074-Ashish</option>
													<option>3054-Avani</option>
													<option>3046-Barkha</option>
													<option>3002-bharti</option>
													<option>3045-Deepika</option>
													<option>3035-Deepti</option>
													<option>1054-Dipika</option>
													<option>3001-Divaker</option>
													<option>1063-Divya</option>
													<option>1061-Gautam Kumar</option>
													<option>3064-Geeta</option>
													<option>3038-Geetanjali</option>
													<option>1043-Himanshi</option>
													<option>3075-Himanshi Duggal</option>
													<option>3043-Ishaan</option>
													<option>3051-Jassi</option>
													<option>3007-Jyoti Naine</option>
													<option>3076-Kalpana Balodi</option>
													<option>3058-Kanchan</option>
													<option>1007-Khushi</option>
													<option>1044-Kirti Rai</option>
													<option>1003-Kunal</option>
													<option>3095-Manisha</option>
													<option>3033-Manu</option>
													<option>3077-Meenakshi</option>
													<option>3004-megha</option>
													<option>3060-Mitali</option>
													<option>3067-Neelam</option>
													<option>3072-Neha</option>
													<option>3056-Nikita</option>
													<option>1053-Nishika</option>
													<option>1018-Pankaj</option>
													<option>3012-Payal</option>
													<option>1057-Pooja Mehra</option>
													<option>3014-preeti</option>
													<option>3094-Priyanka</option>
													<option>1060-Rahul Singh</option>
													<option>3063-Rakhi</option>
													<option>3015-Ravi</option>
													<option>1055-Reena</option>
													<option>8110-ReetKaur</option>
													<option>1017-Rohan</option>
													<option>1059-Rohan K</option>
													<option>2002-Sakshi</option>
													<option>1047-Sangeeta</option>
													<option>3061-Sanjita</option>
													<option>3071-Sarita</option>
													<option>1111-Sarora</option>
													<option>3066-Shelly</option>
													<option>1024-shikha</option>
													<option>3023-Simmi Singh</option>
													<option>3068-Sonam</option>
													<option>3069-Sonia</option>
													<option>3065-Sonika</option>
													<option>3059-Stella</option>
													<option>3093-Suman</option>
													<option>3011-Sunita</option>
													<option>3070-Sushma</option>
													<option>1037-Tanisha</option>
													<option>3024-Vandanasahdev</option>
													<option>5002-Vijitmittal</option>
													<option>3040-VikasGupta</option>
													<option>1056-Vinay</option>
													<option>3048-Vrishti</option>
													<option>3013-Yashoda</option>
                                                </select>
											</div>
											<div class="clearfix"></div>
												
											
											<div class="col-md-12 col-12 mt-4">
												<button type="button" class="btn btn-primary w-lg waves-effect waves-light">Show</button>
											</div>
                                            
                                        	</div>
										</div>
										
									</div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
						<div class="clearfix"></div>
						
						<div class="col-xl-12">
                            <!-- card -->
                            <div class="card">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                              <h4 class="mb-sm-0 font-size-18">Result</h4>
                                              <!--<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Total Result-1</button>-->
                                           </div>
                                        </div>
										<div class="clearfix"></div>
										
										<hr>
										
										<div class="col-md-8 col-12">
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-filter-alt label-icon"></i> Filter</button>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bxs-eraser label-icon"></i> Remove</button>
                                                &nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-reset label-icon"></i> Reset</button>
                                            </div>											
                                        </div>
										<div class="col-md-2 col-12">
											<form class="app-search d-none d-lg-block pt-0 pb-0">
												<div class="position-relative">
													<input type="search" class="form-control bg-black opacity-50" placeholder="Search...">
													<button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
												</div>
											</form>
										</div>
                                        <div class="col-md-2 col-12 text-right" style="text-align: right;">
                                            <div class="mb-4">
                                                <button type="button" class="btn btn-secondary">Total Record - 8</button>
                                            </div>
                                        </div>
										<div class="clearfix"></div>
										
										<hr>
										
										
										<div class="col-12">
											<div class="table-rep-plugin">
                                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table table-bordered">
                                                <thead class="table-primary pdng_d">
                                                    <tr>
                                                        <th data-priority="1" width="">S.No.</th>
                                                        <th data-priority="2" width="">Ref.No.</th>
                                                        <th data-priority="3" width="">Name</th>
                                                        <th data-priority="4" width="">Prop.</th>
														<th data-priority="5" width="">Name</th>
														<th data-priority="6" width="">Date</th>
                                                        <th data-priority="7" width="">Time</th>
                                                        <th data-priority="8" width="">Place</th>
                                                        <th data-priority="9" width="">By-1</th>
														<th data-priority="10" width="">By-2</th>
														<th data-priority="11" width="">Type</th>
														<th data-priority="12" width="">Remarks</th>
                                                    </tr>
                                                </thead>
												
                                                <tbody class="pdng_d">
                                                    <tr>
                                                        <td>...</td>
                                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#SerialNumber">11023488</a></td>
                                                        <td>...</td>
                                                        <td>...</td>
														<td>...</td>
														<td>...</td>
                                                        <td>...</td>
                                                        <td>...</td>
														<td>...</td>
														<td>...</td>
                                                        <td>...</td>
                                                        <td>...</td>
                                                    </tr>
                                                </tbody>
												
                                            </table>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="SerialNumber" tabindex="-1" role="dialog" aria-labelledby="SerialNumberTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content biodata-popup-h">
                                                    <div class="modal-header">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <h5 class="modal-title font-size-16" id="SerialNumberTitle">BIO Data</h5>
                                                            </div>
                                                        </div>
                                                        <div class="row d-sm-none1">
                                                            <div class="col-12">
                                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                  <a href="#personal-details">
                                                                      <button type="button" class="btn btn-outline-primary">Personal</button>
                                                                    </a>
                                                                  <a href="#education">
                                                                      <button type="button" class="btn btn-outline-primary">Edu</button>
                                                                    </a>
                                                                  <a href="#occupation">
                                                                      <button type="button" class="btn btn-outline-primary">Occu</button>
                                                                    </a>
                                                                    <a href="#other-details">
                                                                      <button type="button" class="btn btn-outline-primary">Other</button>
                                                                    </a>
                                                                  <a href="#family-details">
                                                                      <button type="button" class="btn btn-outline-primary">Family</button>
                                                                    </a>
                                                                  <a href="#person-details">
                                                                      <button type="button" class="btn btn-outline-primary">Contact</button>
                                                                    </a>
                                                                  <button type="button" class="btn btn-outline-primary">PDF <i data-feather="download"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
<!--                                                            <h5 class="modal-title font-size-16" id="SerialNumberTitle">BIO Data</h5>-->
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-rep-plugin">
                                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                                <table id="tech-companies-1" class="table table-bordered bio_data">
                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                          <th colspan="6" class="font-size-18" id="personal-details">Personal Details</th>
                                                                        </tr>
                                                                      </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="12%"><strong>Gender:</strong></td>
                                                                            <td width="21%">...</td>
                                                                            <td width="12%"><strong>Name:</strong></td>
                                                                            <td width="21%">...</td>
                                                                            <td width="12%"><strong>DOB:</strong></td>
                                                                            <td width="21%">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Age:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Time of Birth:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Birth Place:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Height (Cms):</strong></td>
                                                                            <td>... (Fit) ...</td>
                                                                            <td><strong>Weight:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Religion:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Caste & Subcaste:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Other Caste:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Gotra:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Complexion:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Color of Eye:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Color of Hair:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Blood Group:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Astro Status:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Drinking:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Smoking:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Eating:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Spectacles:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Disease / Disability:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Hobbies:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Characteristics:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                    </tbody>

                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                          <th colspan="6" id="education" class="font-size-18">Education</th>
                                                                        </tr>
                                                                      </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Education:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Name of Course:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Institution:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                            <td><strong>Year:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                    </tbody>

                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                          <th colspan="6" id="occupation" class="font-size-18">Occupation</th>
                                                                        </tr>
                                                                      </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Occupation:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Income (P.A.):</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Salary (P.A.):</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Company Name:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Designation:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Working Year:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                    </tbody>

                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                          <th colspan="6" id="other-details" class="font-size-18">Other Details</th>
                                                                        </tr>
                                                                      </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Residential:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Residing Country:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Visa:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Nationality:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Residing City:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Marital:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>No. of Children:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Marriage Info:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Child Info:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                    </tbody>

                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                          <th colspan="6" id="family-details" class="font-size-18">Family Details</th>
                                                                        </tr>
                                                                      </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Name of Brother / Sister:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>B/S:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Age:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Ms-St:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Personal Details:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Family Type:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Family Status:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Father's Name:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Father's Details:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Mother's Name:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Mother's Details:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Family History:</strong></td>
                                                                            <td colspan="5">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Extra Info (Personal):</strong></td>
                                                                            <td colspan="5">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Family Income (P.A):</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Family Native:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Budget:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                    </tbody>

                                                                    <thead class="table-primary">
                                                                        <tr>
                                                                          <th colspan="6" class="font-size-18" id="person-details">Person Details</th>
                                                                        </tr>
                                                                      </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><strong>Contact Person:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Address:</strong></td>
                                                                            <td colspan="3">...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Location:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>City:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Pin Code:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>State:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Country:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Phone No:</strong></td>
                                                                            <td>...</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Email ID:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Relation:</strong></td>
                                                                            <td>...</td>
                                                                            <td><strong>Zone:</strong></td>
                                                                            <td>...</td>
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

                                    </div>
										</div>
										<div class="clearfix"></div>
										
									</div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
						<div class="clearfix"></div>

                    </div>
                        <!-- end row-->


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

				
				
				<?php include 'includes/footer.php'; ?>
                
				
				
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

		
		
		
		
		
		
        
		
		
		<?php include 'includes/footer-js.php'; ?>
		

    </body>

</html>