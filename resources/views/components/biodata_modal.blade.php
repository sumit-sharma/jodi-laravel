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
                            <a href="#bio_photos">
                                <button type="button" class="btn btn-outline-primary">Photos</button>
                            </a>
                            {{-- <a class="btn btn-outline-primary" id="btn_pdf" href="#" target="_blank">PDF <i
                                    data-feather="download"></i></a> --}}
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    PDF <i data-feather="download"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item btn_pdf" href="javascript:;" data-pdf="pdf1">Pdf
                                            1</a></li>
                                    <li><a class="dropdown-item btn_pdf" href="javascript:;" data-pdf="pdf2">Pdf
                                            2</a></li>
                                    <li><a class="dropdown-item btn_pdf" href="javascript:;" data-pdf="pdf3">Pdf
                                            3</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
                {{-- <label id="rno"></label> --}}
                <!--                                                            <h5 class="modal-title font-size-16" id="SerialNumberTitle">BIO Data</h5>-->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="bio_loader" class="modal_loader text-center p-5" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div class="table-rep-plugin" id="tab_bio_data">
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
                            <thead class="table-primary">
                                <tr>
                                    <th colspan="6" class="font-size-18" id="bio_photos">Photos</th>
                                </tr>
                            </thead>
                            <tbody id="pics-tbody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>


@section('bottom-section')
    <script>
        // Handle PDF button clicks
        $(document).on("click", ".btn_pdf", function (e) {
            e.preventDefault();
            const pdfType = $(this).data("pdf"); // Get pdf1, pdf2, or pdf3
            const rno = $("#Modal_biodata").data("current-rno");
            if (rno && pdfType) {
                window.open(`/pdfview/${pdfType}/${rno}`, '_blank');
            }
        });

        $(document).on("click", ".biodata_modal", function () {
            let rno = $(this).data("rno"); // auto-parsed JSON
            const options = {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'GET',
            }
            $(".modal_loader").show();
            $("#tab_bio_data").hide();
            // const url = `{{ route('search-data') }}?searchinfield=rno&searchvalue=${encodeURIComponent(rno)}`
            // const url = `/services/search-result?searchinfield=rno&searchvalue=${encodeURIComponent(rno)}`
            let url = `{{ route('fetch-customer-data', ['rno' => ':rno']) }}`
            url = url.replace(':rno', rno);
            fetch(url, options)
                .then(res => res.json())
                .then(data => {
                    $(".modal_loader").hide();
                    $("#tab_bio_data").show();

                    const item = data.data;
                    console.log("itemssssssss", item);
                    let religion_name = ""
                    switch (item.bio.religion) {
                        case 1:
                            religion_name = "Hindu"
                            break;
                        case 2:
                            religion_name = "Sikh"
                            break;
                        case 3:
                            religion_name = "Jain"
                            break;
                        case 4:
                            religion_name = "Christian"
                            break;
                        case 5:
                            religion_name = "Muslim"
                            break;
                    }

                    console.log("snaps", item.snaps);

                    let complexion = "";
                    switch (item.bio.complexion) {
                        case 1:
                            complexion = "Very Fair";
                            break;
                        case 2:
                            complexion = "Fair";
                            break;
                        case 3:
                            complexion = "Wheatish";
                            break;
                        case 4:
                            complexion = "Brown";
                            break;
                        case 5:
                            complexion = "Dark";
                            break;
                    }


                    const birthDate = new Date(item.bio.dob);
                    const today = new Date();
                    let years = today.getFullYear() - birthDate.getFullYear();


                    let eyecolor = ""
                    switch (item.personal.eyecolor) {
                        case 1:
                            eyecolor = "Amber"
                            break;
                        case 2:
                            eyecolor = "Blue"
                            break;
                        case 3:
                            eyecolor = "Brown"
                            break;
                        case 4:
                            eyecolor = "Black"
                            break;
                        case 5:
                            eyecolor = "Gray"
                            break;
                        case 6:
                            eyecolor = "Green"
                            break;
                        case 7:
                            eyecolor = "Hazel"
                            break;
                        case 8:
                            eyecolor = "Red & Violet"
                            break;
                        case 9:
                            eyecolor = "Spectrum"
                            break;
                    }

                    let haircolor = "";
                    switch (item.personal.haircolor) {
                        case 1:
                            haircolor = "Black"
                            break;
                        case 2:
                            haircolor = "Brown"
                            break;
                        case 3:
                            haircolor = "Grey"
                            break;
                        case 4:
                            haircolor = "Blond"
                            break;
                        case 5:
                            haircolor = "Bald"
                            break;
                    }

                    let ast = ""
                    switch (item.bio.astrostatus) {
                        case 1:
                            ast = "Manglik";
                            break;
                        case 2:
                            ast = "Slightly Manglik";
                            break;
                        case 3:
                            ast = "Non Manglik";
                            break;
                        case 4:
                            ast = "Don't Believe";
                            break;
                        case 5:
                            ast = "Don't Know";
                            break;
                    }


                    let dh = ""
                    switch (item.bio.drinkinghabit) {
                        case 1:
                            dh = "Non Consumer";
                            break;
                        case 2:
                            dh = "Drink Occasionally";
                            break;
                        case 3:
                            dh = "Regular Drinker";
                            break;
                        case 4:
                            dh = "Don't Know";
                            break;
                    }

                    let smoking = ""
                    switch (item.bio.smokinghabit) {
                        case 1:
                            smoking = "Non Smoker"
                            break;
                        case 2:
                            smoking = "Smoker"
                            break;
                        case 3:
                            smoking = "Don't Know"
                            break;
                    }

                    let eating = ""
                    switch (item.bio.eatinghabit) {
                        case 1:
                            eating = "Vegetarian"
                            break;
                        case 2:
                            eating = "Eggetarian"
                            break;
                        case 3:
                            eating = "Non Vegetarian"
                            break;
                        case 4:
                            eating = "Don't Know"
                            break;
                        case 5:
                            eating = "Occasionally Non Vegetarian"
                            break;
                    }

                    // Store rno for PDF button clicks
                    $("#Modal_biodata").data("current-rno", item.rno);

                    // $("#Modal_biodata #rno").text(item.rno);
                    $("#Modal_biodata #gender").text(item.g);
                    $("#Modal_biodata #refname").text(item.refname);
                    $("#Modal_biodata #dob").text(item.bio.dob);



                    $("#Modal_biodata #age").text(parseInt(years));
                    $("#Modal_biodata #tob").text(item.bio.tob);
                    $("#Modal_biodata #pob").text(item.bio.pob);



                    $("#Modal_biodata #height").text(item.hghtft);
                    $("#Modal_biodata #weight").text(item.wt);
                    $("#Modal_biodata #religion").text(religion_name);

                    $("#Modal_biodata #caste").text(item.cst);
                    $("#Modal_biodata #subcaste").text(item.bio.subcaste);
                    $("#Modal_biodata #gotra").text(item.bio.gotra);


                    $("#Modal_biodata #complexion").text(complexion);
                    $("#Modal_biodata #eyecolor").text(eyecolor);
                    $("#Modal_biodata #haircolor").text(haircolor);


                    $("#Modal_biodata #bg").text(item.bio.bg);
                    $("#Modal_biodata #astrostatus").text(ast);
                    $("#Modal_biodata #dh").text(dh);

                    $("#Modal_biodata #smoking").text(smoking);
                    $("#Modal_biodata #eating").text(eating);
                    $("#Modal_biodata #spec").text(item.bio.spects);



                    $("#Modal_biodata #dd").text(item.bio.dd);
                    $("#Modal_biodata #hobbies").text(item.personal.hobbies);
                    $("#Modal_biodata #characteristics").text(item.personal.characteristics);


                    let education = "";
                    switch (item.ed) {
                        case "1":
                            education = "Matriculate"
                            break;
                        case "2":
                            education = "Under Graduate"
                            break;
                        case "3":
                            education = "Graduate"
                            break;
                        case "6":
                            education = "Double Graduate"
                            break;
                        case "4":
                            education = "Post Graduate"
                            break;
                        case "5":
                            education = "Doctorate"
                            break;
                    }
                    let eduHtml = `<tr><td><strong>Education:</strong></td><td colspan="5">${education}</td></tr>`;
                    item.education.forEach(ed => {
                        eduHtml += `<tr> <td><strong>Name of Course:</strong></td> <td><label class="educourse">${ed.educourse}</label></td> <td><strong>Institution:</strong></td> <td><label class="eduinst">${ed.eduinst}</label></td> <td><strong>Year:</strong></td> <td><label class="eduyear">${ed.eduyear}</label></td> </tr>`;
                    });

                    $("#Modal_biodata #education_container").html(eduHtml);
                    $("#Modal_biodata #occupation").text(item?.occupation?.name);
                    $("#Modal_biodata #income").text(item?.income?.income);
                    $("#Modal_biodata #salary").text(item?.personal?.salary);

                    $("#Modal_biodata #tbody_organistion").children('tr.company_row').remove();
                    let companyhtml = "";

                    item.organisation.forEach(org => {
                        companyhtml += `<tr class="company_row"> <td><strong>Company Name:</strong></td> <td>${org.orgname}</td> <td><strong>Designation:</strong></td> <td>${org.orgdept}</td> <td><strong>Working Year:</strong></td> <td>${org.orgyear}</td>
                                                                                                                                                                                                                                                                                                                                                                    </tr>`;
                    });
                    $("#Modal_biodata #tbody_organistion").append(companyhtml)

                    let rs_value = ""
                    switch (item.rs) {
                        case "1":
                            rs_value = "Indian Citizen"
                            break;
                        case "2":
                            rs_value = "Temp. Residing Abroad"
                            break;
                        case "3":
                            rs_value = "Non Resident Indian"
                            break;

                    }
                    let ms = ""
                    switch (item.ms) {
                        case "1":
                            ms = "Never Married"
                            break;
                        case "2":
                            ms = "Divorced"
                            break;
                        case "3":
                            ms = "Widow"
                            break;
                        case "4":
                            ms = "Separated"
                            break;
                    }

                    $("#Modal_biodata #rs").text(rs_value);
                    $("#Modal_biodata #rcountry").text(item.personal.rcountry);
                    $("#Modal_biodata #visa").text(item.personal.visa);
                    $("#Modal_biodata #nationality").text(item.personal.nationality);
                    $("#Modal_biodata #rcity").text(item.personal.rcity);
                    $("#Modal_biodata #ms").text(ms);
                    $("#Modal_biodata #child").text(item.ch);
                    $("#Modal_biodata #marriageinfo").text(item.personal.marriageinfo);
                    $("#Modal_biodata #childdetails").text(item.personal.childdetails);


                    let bshtml = "";
                    item.profilebs.forEach(bs => {
                        bshtml += `<tr> <td><strong>Name of Brother / Sister:</strong></td> <td>${bs.bsname}</td> <td><strong>B/S:</strong></td> <td>${bs.bs}</td> <td><strong>Age:</strong></td> <td>${bs.bsage}</td> </tr> <tr> <td><strong>Ms-St:</strong></td> <td>${bs.bsmarriage}</td> <td><strong>Personal Details:</strong></td> <td colspan="3">${bs.bsdetails}</td> </tr>`;
                    })

                    $("#Modal_biodata #family_detail").append(bshtml)

                    $("#Modal_biodata #typeoffamily").text(item.personal.typeoffamily);
                    $("#Modal_biodata #familystatus").text(item.personal.familystatus);
                    $("#Modal_biodata #fathersname").text(item.personal.fathersname);
                    $("#Modal_biodata #fatherdetails").text(item.personal.fatherdetails);
                    $("#Modal_biodata #mothersname").text(item.personal.mothersname);
                    $("#Modal_biodata #motherdetails").text(item.personal.motherdetails);
                    $("#Modal_biodata #familyhistory").text(item.personal.familyhistory);
                    $("#Modal_biodata #personaldetails").text(item.personal.personaldetails);
                    $("#Modal_biodata #familyincome").text(item.personal.familyincome);
                    $("#Modal_biodata #familynative").text(item.personal.familynative);
                    $("#Modal_biodata #budget").text(item.personal.budget);

                    $("#Modal_biodata #contactperson").text(item.personal.contactperson);
                    $("#Modal_biodata #contactaddress").text(item.personal.contactaddress);

                    $("#Modal_biodata #arealocation").text(item.personal.arealocation);
                    $("#Modal_biodata #contactcity").text(item.personal.contactcity);
                    $("#Modal_biodata #contactpincode").text(item.personal.contactpincode);

                    $("#Modal_biodata #contactstate").text(item.personal.contactstate);
                    $("#Modal_biodata #contactcountry").text(item.personal.contactcountry);
                    $("#Modal_biodata #contactphone").text(item.personal.contactphone);


                    $("#Modal_biodata #contactemail").text(item.personal.contactemail);
                    $("#Modal_biodata #contactrelation").text(item.personal.contactrelation);
                    $("#Modal_biodata #contactzone").text(item.personal.zone.zone_name);

                    let snapTbody = document.getElementById("pics-tbody");
                    let snapHtml = '<tr>';
                    if (item.snaps.length > 0) {
                        item.snaps.forEach(element => {
                            snapHtml += `<td width="16.5%" align="center"> <img src="/uploads/customer/${element.photo}"  alt="Broken Image" width="100%" onerror="this.onerror=null;this.src='/assets/images/broken-image.png';" /></td>`;
                        });
                    } else {
                        snapHtml += `<td colspan="5">No Snapshots Found</td>`;
                    }
                    snapHtml += '</tr>';
                    snapTbody.innerHTML = snapHtml;
                })


            // // Example: Fill modal fields

            // // You can access full object here
            // console.log(item.refname);
        });
    </script>

@endsection