<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jodi Serach Bio Data</title>

	<style>
		.main_cls {
			font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
			margin: 0 auto;
			width: 1000px;
		}

		.sect_one {
			background: #fff;
			border-radius: 5px;
			padding: 20px;
			margin-bottom: 20px;
		}

		.sect_one h1 {
			margin: 0;
			padding: 0;
			font-size: 40px;
		}

		.sect_one h2,
		h3 {
			margin: 0 0 15px 0;
			padding: 0;
			font-size: 20px;
		}

		.sect_one table {
			border-collapse: collapse;
		}

		.sect_one th,
		td {
			padding: 6px;
		}

		.sect_two {
			background: #430b1c;
			border-radius: 5px;
			padding: 20px;
			margin-bottom: 20px;
			text-align: center;
			color: #ffffff;
		}

		.sect_two h2 {
			margin: 0;
			padding: 0;
		}
	</style>

</head>



<body bgcolor="#dcd9d2">
	<div class="main_cls">

		<div class="sect_one">
			<table width="100%">
				<tr>
					<td width="50%" align="left">
						<h1>{{ $data->refname }}</h1>
					</td>
					<td width="50%" align="right">
						<img src="{{ public_path('assets/images/emb-logo2.jpg') }}" width="170">
					</td>
				</tr>
			</table>
		</div>

		<div class="sect_one">
			<table width="100%">
				<tr>
					<td width="33%"><img src="{{ public_path('/assets/images/bio-data.jpg') }}" width="100%" /></td>
					<td width="33%"><img src="{{ public_path('/assets/images/bio-data2.jpg') }}" width="100%" /></td>
					<td width="33%"><img src="{{ public_path('/assets/images/bio-data3.jpg') }}" width="100%" /></td>
				</tr>
			</table>
		</div>

		{{-- @dump($data) --}}
		<div class="sect_one">
			<h2>Personal Details</h2>
			<table width="100%" border="1" collapse="0" bordercolor="#D8D8D8">
				<tr>
					<td width="16.6%">Reference No:</td>
					<td width="16.6%">{{ $data->rno }}</td>
					<td width="16.6%">Name:</td>
					<td width="16.6%">{{ $data->refname }}</td>
					<td width="16.6%">DOB:</td>
					<td width="16.6%">{{ \Carbon\Carbon::parse($data->bio->dob)->format('M d Y') }}</td>
				</tr>
				<tr>
					<td width="16.6%">Age:</td>
					<td width="16.6%">{{ \Carbon\Carbon::parse($data->bio->dob)->age }}</td>
					<td width="16.6%">Time of Birth:</td>
					<td width="16.6%">{{ $data->bio->tob }}</td>
					<td width="16.6%">Birth Place:</td>
					<td width="16.6%">{{ $data->bio->pob }}</td>
				</tr>
				<tr>
					<td width="16.6%">Gender:</td>
					<td width="16.6%">{{ $data->bio->gender }}</td>
					<td width="16.6%">Height (Cms):</td>
					<td width="16.6%">{{ $data->bio->hght }}</td>
					<td width="16.6%">Weight:</td>
					<td width="16.6%">{{ $data->bio->wtkg }}</td>
				</tr>
				<tr>
					<td width="16.6%">Religion:</td>
					<td width="16.6%">{{ $data->bio->religion->label() }}</td>
					<td width="16.6%">Caste:</td>
					<td width="16.6%">{{ $data->cst }}</td>
					<td width="16.6%">Subcaste:</td>
					<td width="16.6%">{{ $data->bio->subcaste }}</td>
				</tr>
				<tr>
					<td width="16.6%">Gotra:</td>
					<td width="16.6%">{{ $data->bio->gotra }}</td>
					<td width="16.6%">Complexion:</td>
					<td width="16.6%">{{ $data->bio->complexion->label() }}</td>
					<td width="16.6%">Color of Eye:</td>
					<td width="16.6%">{{ $data->personal->eyecolor->label() }}</td>
				</tr>
				<tr>
					<td width="16.6%">Color of Hair:</td>
					<td width="16.6%">{{ $data->personal->haircolor->label() }}</td>
					<td width="16.6%">Blood Group:</td>
					<td width="16.6%">{{ $data->bio->bg }}</td>
					<td width="16.6%">Astro Status:</td>
					<td width="16.6%">{{ $data->bio->astrostatus->label() }}</td>
				</tr>
				<tr>
					<td width="16.6%">Drinking:</td>
					<td width="16.6%">{{ $data->bio->drinkinghabit->label() }}</td>
					<td width="16.6%">Smoking:</td>
					<td width="16.6%">{{ $data->bio->smokinghabit->label() }}</td>
					<td width="16.6%">Eating:</td>
					<td width="16.6%">{{ $data->bio->eatinghabit->label() }}</td>
				</tr>
				<tr>
					<td width="16.6%">Spectacles:</td>
					<td width="16.6%">{{ $data->bio->spects }}</td>
					<td width="16.6%">Disease / Disability:</td>
					<td width="16.6%">{{ $data->bio->dd }}</td>
					<td width="16.6%">Hobbies:</td>
					<td width="16.6%">{{ $data->personal->hobbies }}</td>
				</tr>
				<tr>
					<td>Characteristics:</td>
					<td colspan="5">{{ $data->personal->characteristics }}</td>
				</tr>
			</table>
		</div>

		<div class="sect_one">
			<h2>Education</h2>
			<table width="100%" border="1" collapse="0" bordercolor="#D8D8D8">
				<tr>
					<td width="10%">S.No:</td>
					<td width="30%">Name of Course:</td>
					<td width="50%">Institution:</td>
					<td width="10%">Year:</td>
				</tr>
				@foreach ($data->education as $key => $item)
					<tr>
						<td width="10%">{{ ++$key }}</td>
						<td width="30%">{{ $item->educourse }}</td>
						<td width="50%">{{ $item->eduinst }}</td>
						<td width="10%">{{ $item->eduyear }}</td>
					</tr>
				@endforeach
			</table>
		</div>

		<div class="sect_one">
			<h2>Occupation</h2>
			<table width="100%" border="1" collapse="0" bordercolor="#D8D8D8">
				<tr>
					<td width="16.6%">Occupation:</td>
					<td width="16.6%">{{ $data?->occupation?->name }}</td>
					<td width="16.6%">Income (P.A.):</td>
					<td width="16.6%">{{ $data->income->income }}</td>
					<td width="16.6%">Salary (P.A.):</td>
					<td width="16.6%">{{ $data?->personal?->salary }}</td>
				</tr>
				@foreach ($data->organisation as $item)
					<tr>
						<td width="16.6%">Company Name:</td>
						<td width="16.6%">{{ $item->orgname }}</td>
						<td width="16.6%">Designation:</td>
						<td width="16.6%">{{ $item->orgdept }}</td>
						<td width="16.6%">Working Year:</td>
						<td width="16.6%">{{ $item->orgyear }}</td>
					</tr>
				@endforeach

			</table>
		</div>
		@php
			$rs_value = "";
			switch ($data->rs) {
				case "1":
					$rs_value = "Indian Citizen";
					break;
				case "2":
					$rs_value = "Temp. Residing Abroad";
					break;
				case "3":
					$rs_value = "Non Resident Indian";
					break;

			}
			$ms = "";
			switch ($data->ms) {
				case "1":
					$ms = "Never Married";
					break;
				case "2":
					$ms = "Divorced";
					break;
				case "3":
					$ms = "Widow";
					break;
				case "4":
					$ms = "Separated";
					break;
			}

		@endphp

		<div class="sect_one">
			<h2>Other Details</h2>
			<table width="100%" border="1" collapse="0" bordercolor="#D8D8D8">
				<tr>
					<td width="16.6%">Residential:</td>
					<td width="16.6%">{{ $rs_value }}</td>
					<td width="16.6%">Residing Country:</td>
					<td width="16.6%">{{ $data->personal->rcountry }}</td>
					<td width="16.6%">Visa:</td>
					<td width="16.6%">{{ $data->personal->visa }}</td>
				</tr>
				<tr>
					<td width="16.6%">Nationality:</td>
					<td width="16.6%">{{ $data->personal->nationality }}</td>
					<td width="16.6%">Residing City:</td>
					<td width="16.6%">{{ $data->personal->rcity }}</td>
					<td width="16.6%">Marital:</td>
					<td width="16.6%">{{ $ms }}</td>
				</tr>
				<tr>
					<td width="16.6%">No. of Children:</td>
					<td width="16.6%">{{ $data->ch }}</td>
					<td width="16.6%">Marriage Info:</td>
					<td width="16.6%">{{ $data->personal->marriageinfo ?? '--' }}</td>
					<td width="16.6%">Child Info:</td>
					<td width="16.6%">{{ $data->personal->childdetails ?? '--' }}</td>
				</tr>

			</table>
		</div>

		<div class="sect_one">
			<h2>Family Details</h2>
			<table width="100%" border="1" collapse="0" bordercolor="#D8D8D8">
				@foreach ($data->profilebs as $item)

					<tr>
						<td width="16.6%">Name of Brother / Sister:</td>
						<td width="16.6%">{{ $item->bsname }}</td>
						<td width="16.6%">B/S:</td>
						<td width="16.6%">{{ $item->bs }}</td>
						<td width="16.6%">Age:</td>
						<td width="16.6%">{{ $item->bsage }}</td>
					</tr>
					<tr>
						<td width="16.6%">Ms-St:</td>
						<td width="16.6%">{{ $item->bsmarriage }}</td>
						<td width="16.6%">Personal Details:</td>
						<td width="16.6%" colspan="3">{{ $item->bsdetails }}</td>
					</tr>
				@endforeach
				<tr>
					<td width="16.6%">Family Type:</td>
					<td width="16.6%">{{ $data->personal->typeoffamily }}</td>
					<td width="16.6%">Family Status:</td>
					<td width="16.6%" colspan="3">{{ $data->personal->familystatus }}</td>
				</tr>
				<tr>
					<td width="16.6%">Father's Name:</td>
					<td width="16.6%">{{ $data->personal->fathersname }}</td>
					<td width="16.6%">Father's Details:</td>
					<td width="16.6%" colspan="3">{{ $data->personal->fatherdetails }}</td>
				</tr>
				<tr>
					<td width="16.6%">Mother's Name:</td>
					<td width="16.6%">{{ $data->personal->mothersname }}</td>
					<td width="16.6%">Mother's Details:</td>
					<td width="16.6%" colspan="3">{{ $data->personal->motherdetails }}</td>
				</tr>
				<tr>
					<td width="16.6%">Family History:</td>
					<td width="16.6%" colspan="5">{{ $data->personal->familyhistory }}</td>
				</tr>
				<tr>
					<td width="16.6%">Extra Info (Personal):</td>
					<td width="16.6%" colspan="5">{{ $data->personal->personaldetails }}</td>
				</tr>
				<tr>
					<td width="16.6%">Family Income (P.A):</td>
					<td width="16.6%">{{ $data->income->income }}</td>
					<td width="16.6%">Family Native:</td>
					<td width="16.6%">{{ $data->personal->familynative }}</td>
					<td width="16.6%">Budget:</td>
					<td width="16.6%">{{ $data->personal->budget }}</td>
				</tr>
			</table>
		</div>

		<div class="sect_one">
			<h2>Person Details</h2>
			<table width="100%" border="1" collapse="0" bordercolor="#D8D8D8">
				<tr>
					<td width="16.6%">Contact Person:</td>
					<td width="16.6%">{{ $data->personal->contactperson }}</td>
					<td width="16.6%">Address:</td>
					<td width="16.6%" colspan="3">{{ $data->personal->contactaddress }}</td>
				</tr>
				<tr>
					<td width="16.6%">Location:</td>
					<td width="16.6%">{{ $data->personal->arealocation }}</td>
					<td width="16.6%">City:</td>
					<td width="16.6%">{{ $data->personal->contactcity }}</td>
					<td width="16.6%">Pin Code:</td>
					<td width="16.6%">{{ $data->personal->contactpincode }}</td>
				</tr>
				<tr>
					<td width="16.6%">State:</td>
					<td width="16.6%">{{ $data->personal->contactstate }}</td>
					<td width="16.6%">Country:</td>
					<td width="16.6%">{{ $data->personal->contactcountry }}</td>
					<td width="16.6%">Phone No:</td>
					<td width="16.6%">{{ $data->personal->contactphone }}</td>
				</tr>
				<tr>
					<td width="16.6%">Email ID:</td>
					<td width="16.6%">{{ $data->personal->contactemail }}</td>
					<td width="16.6%">Relation:</td>
					<td width="16.6%">{{ $data->personal->contactrelation }}</td>
					<td width="16.6%">Zone:</td>
					<td width="16.6%">{{ $data->personal->zone->zone_name }}</td>
				</tr>
			</table>
		</div>

		<div class="sect_two">
			<h2>JodiSearch Matrimonial</h2>
			<p>Second Floor, D-24, Defence Colony, New Delhi, Delhi 110024</p>
			<p>Email: info@jodisearchmatrimonial.in | Support: (+91) 9718511111 / 9711000143</p>
		</div>




	</div>







</body>



</html>