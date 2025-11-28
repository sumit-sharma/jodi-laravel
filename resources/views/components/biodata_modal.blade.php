{{-- Modal --}}
<div class="modal fade" id="Modal_biodata" tabindex="-1" role="dialog" aria-labelledby="SerialNumberTitle"
    aria-hidden="true">
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
                            <a class="btn btn-outline-primary" id="btn_pdf" href="#" target="_blank">PDF <i
                                    data-feather="download"></i></a>
                        </div>
                    </div>
                </div>
                {{-- <label id="rno"></label> --}}
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
                                    <td width="21%"><label id="gender"></label></td>
                                    <td width="12%"><strong>Name:</strong></td>
                                    <td width="21%"><label id="refname"></label></td>
                                    <td width="12%"><strong>DOB:</strong></td>
                                    <td width="21%"><label id="dob"></label></td>
                                </tr>
                                <tr>
                                    <td><strong>Age:</strong></td>
                                    <td>
                                        <label id="age"></label>
                                    </td>
                                    <td><strong>Time of Birth:</strong></td>
                                    <td>
                                        <label id="tob"></label>
                                    </td>
                                    <td><strong>Birth Place:</strong></td>
                                    <td>
                                        <label id="pob"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Height (Cms):</strong></td>
                                    <td>
                                        <label id="height"></label>

                                    </td>
                                    <td><strong>Weight:</strong></td>
                                    <td>
                                        <label id="weight"></label>
                                    </td>
                                    <td><strong>Religion:</strong></td>
                                    <td>
                                        <label id="religion"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Caste:</strong></td>
                                    <td><label id="caste"></label></td>
                                    <td><strong>Subcaste:</strong></td>
                                    <td><label id="subcaste"></label></td>
                                    <td><strong>Gotra:</strong></td>
                                    <td><label id="gotra"></label></td>
                                </tr>
                                <tr>
                                    <td><strong>Complexion:</strong></td>
                                    <td>
                                        <label id="complexion"></label>
                                    </td>
                                    <td><strong>Color of Eye:</strong></td>
                                    <td>
                                        <label id="eyecolor"></label>
                                    </td>
                                    <td><strong>Color of Hair:</strong></td>
                                    <td>
                                        <label id="haircolor"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Blood Group:</strong></td>
                                    <td>
                                        <label id="bg"></label>
                                    </td>
                                    <td><strong>Astro Status:</strong></td>
                                    <td>
                                        <label id="astrostatus"></label>
                                    </td>
                                    <td><strong>Drinking:</strong></td>
                                    <td>
                                        <label id="dh"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Smoking:</strong></td>
                                    <td>
                                        <label id="smoking"></label>
                                    </td>
                                    <td><strong>Eating:</strong></td>
                                    <td>
                                        <label id="eating"></label>
                                    </td>
                                    <td><strong>Spectacles:</strong></td>
                                    <td>
                                        <label id="spec"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Disease / Disability:</strong></td>
                                    <td>
                                        <label id="dd"></label>
                                    </td>
                                    <td><strong>Hobbies:</strong></td>
                                    <td>
                                        <label id="hobbies"></label>
                                    </td>
                                    <td><strong>Characteristics:</strong></td>
                                    <td>
                                        <label id="characteristics"></label>
                                    </td>
                                </tr>
                            </tbody>

                            <thead class="table-primary">
                                <tr>
                                    <th colspan="6" id="education" class="font-size-18">Education</th>
                                </tr>
                            </thead>
                            <tbody id="education_container"></tbody>

                            <thead class="table-primary">
                                <tr>
                                    <th colspan="6" class="font-size-18">Occupation</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_organistion">
                                <tr>
                                    <td><strong>Occupation:</strong></td>
                                    <td>
                                        <label id="occupation"></label>
                                    </td>
                                    <td><strong>Income (P.A.):</strong></td>
                                    <td>
                                        <label id="income"></label>
                                    </td>
                                    <td><strong>Salary (P.A.):</strong></td>
                                    <td>
                                        <label id="salary"></label>
                                    </td>
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
                                    <td>
                                        <label id="rs"></label>
                                    </td>
                                    <td><strong>Residing Country:</strong></td>
                                    <td>
                                        <label id="rcountry"></label>
                                    </td>
                                    <td><strong>Visa:</strong></td>
                                    <td>
                                        <label id="visa"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Nationality:</strong></td>
                                    <td>
                                        <label id="nationality"></label>
                                    </td>
                                    <td><strong>Residing City:</strong></td>
                                    <td>
                                        <label id="rcity"></label>
                                    </td>
                                    <td><strong>Marital:</strong></td>
                                    <td>
                                        <label id="ms"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>No. of Children:</strong></td>
                                    <td>
                                        <label id="child"></label>
                                    </td>
                                    <td><strong>Marriage Info:</strong></td>
                                    <td>
                                        <label id="marriageinfo"></label>
                                    </td>
                                    <td><strong>Child Info:</strong></td>
                                    <td>
                                        <label id="childdetails"></label>
                                    </td>
                                </tr>
                            </tbody>

                            <thead class="table-primary">
                                <tr>
                                    <th colspan="6" id="family-details" class="font-size-18">Family Details</th>
                                </tr>
                            </thead>
                            <tbody id="family_detail">

                                <tr>
                                    <td><strong>Family Type:</strong></td>
                                    <td>
                                        <label id="typeoffamily"></label>
                                    </td>
                                    <td><strong>Family Status:</strong></td>
                                    <td colspan="3">
                                        <label id="familystatus"></label>
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Father's Name:</strong></td>
                                    <td>
                                        <label id="fathersname"></label>
                                    </td>

                                    <td><strong>Father's Details:</strong></td>
                                    <td colspan="3">
                                        <label id="fatherdetails"></label>
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Mother's Name:</strong></td>
                                    <td><label id="mothersname"></label>
                                    </td>

                                    <td><strong>Mother's Details:</strong></td>
                                    <td colspan="3"><label id="motherdetails"></label>
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Family History:</strong></td>
                                    <td colspan="5"><label id="familyhistory"></label>
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Extra Info (Personal):</strong></td>
                                    <td colspan="5"><label id="personaldetails"></label>
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Family Income (P.A):</strong></td>
                                    <td><label id="familyincome"></label>
                                    </td>

                                    <td><strong>Family Native:</strong></td>
                                    <td><label id="familynative"></label>
                                    </td>

                                    <td><strong>Budget:</strong></td>
                                    <td><label id="budget"></label>
                                    </td>

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
                                    <td><label id="contactperson"></label>
                                    <td><strong>Address:</strong></td>
                                    <td colspan="3"><label id="contactaddress"></label>
                                </tr>
                                <tr>
                                    <td><strong>Location:</strong></td>
                                    <td><label id="arealocation"></label>
                                    <td><strong>City:</strong></td>
                                    <td><label id="contactcity"></label>
                                    <td><strong>Pin Code:</strong></td>
                                    <td><label id="contactpincode"></label>
                                </tr>
                                <tr>
                                    <td><strong>State:</strong></td>
                                    <td><label id="contactstate"></label>
                                    <td><strong>Country:</strong></td>
                                    <td><label id="contactcountry"></label>
                                    <td><strong>Phone No:</strong></td>
                                    <td><label id="contactphone"></label>
                                </tr>
                                <tr>
                                    <td><strong>Email ID:</strong></td>
                                    <td><label id="contactemail"></label>
                                    <td><strong>Relation:</strong></td>
                                    <td><label id="contactrelation"></label>
                                    <td><strong>Zone:</strong></td>
                                    <td><label id="contactzone"></label>
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


