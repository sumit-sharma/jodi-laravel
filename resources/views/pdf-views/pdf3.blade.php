<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jodi Serach Bio Data</title>

	<style>
		.main_cls {
			font-family: "serif";
			margin: 0 auto;
			width: 1000px;
		}

		.sect_one {
			background: #fff;
			border-radius: 5px;
			padding: 15px;
			margin-bottom: 10px;
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
			padding: 8px;
		}

		.sect_two {
			width: 90%;
			background: #fff;
			border-radius: 5px;
			padding: 0px;
			margin: 0 auto;
		}

		.ref-hdng strong {
			background: #430e1c;
			padding: 10px 25px;
			color: #fff;
			margin: 10px 0px;
			border: 1px solid #ebe0c1;
			font-size: 22px;
		}

		.sect_two h2 {
			margin: 0 0 10px 0;
			padding: 6px 15px;
			background: #480f1f;
			color: #fff;
			width: 350px;
			border-radius: 0 0 20px 0;
			font-size: 20px;
		}

		hr {
			margin: 40px 0;
		}

		.footer {
			background: #480e1f;
			color: #fff;
			text-align: center;
			padding: 40px 0 20px 0;
			line-height: 6px;
			margin-top: 40px;
		}
	</style>

</head>



<body bgcolor="#fff">
	<div class="main_cls">

		<div class="sect_one">
			<table width="100%">
				<tr>
					<td align="center" style="padding: 0;">
						{{-- <img src="https://jodi-v2.cswebgroup.com/assets/images/pdf-banner.jpg" width="100%" /> --}}
						<img src="{{ public_path('assets/images/pdf-banner.jpg') }}" width="100%" />
					</td>
				</tr>
			</table>
		</div>


		<div class="sect_two">
			<table width="100%" border="0" collapse="0" bordercolor="#D8D8D8" style="margin:10px 0 40px 0;"
				class="ref-hdng">
				<tr>
					<td align="center">
						<strong>Reference No:</strong>
						<strong>{{ $data->rno }}</strong>
					</td>
				</tr>
			</table>

			<hr>

			<h2>Personal Details:</h2>
			<table width="100%" border="0" collapse="0" bordercolor="#D8D8D8" style="margin-bottom:30px;">
				<tr>
					<td width="25%">MEMBER NAME</td>
					<td width="1%">:</td>
					<td width="74%"><strong>{{ $data->refname }}</strong></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>:</td>
					<td>{{ $data->gender == 'M' ? 'MALE' : 'FEMALE' }}</td>
				</tr>
				<tr>
					<td>DATE OF BIRTH & TIME</td>
					<td>:</td>
					<td>
						{{ \Carbon\Carbon::parse($data->bio->dob)->format('d/M/Y') }} &nbsp; | &nbsp;
						{{ $data->bio->tob }}
					</td>
				</tr>

				<tr>
					<td>AGE</td>
					<td>:</td>
					<td>{{ \Carbon\Carbon::parse($data->bio->dob)->age }}</td>
				</tr>
				<tr>
					<td>HEIGHT</td>
					<td>:</td>
					<td>{{ $data->hghtft }} &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; {{ $data->hg }} CMS.</td>
				</tr>
				<tr>
					<td>PLACE OF BIRTH</td>
					<td>:</td>
					<td>{{ $data->bio->pob }}</td>
				</tr>
				<tr>
					<td>RELIGION</td>
					<td>:</td>
					<td>{{ $data->bio->religion->label() }}</td>
				</tr>
				<tr>
					<td>CASTE</td>
					<td>:</td>
					<td>{{ $data->cst }}</td>
				</tr>
				<tr>
					<td>EDUCATION</td>
					<td>:</td>
					<td>{{ $data->bio?->education?->label() }}</td>
				</tr>

				<tr>
					<td>OCCUPATION</td>
					<td>:</td>
					<td>{{ $data->occupation?->name }}</td>
				</tr>
				<tr>
					<td>FATHER'S NAME</td>
					<td>:</td>
					<td>{{ $data->personal->fathersname }}</td>
				</tr>
				<tr>
					<td>MOTHER'S NAME</td>
					<td>:</td>
					<td>{{ $data->personal->mothersname }}</td>
				</tr>
				<tr>
					<td>STATE</td>
					<td>:</td>
					<td>{{ $data->personal->contactstate }}</td>
				</tr>
			</table>

		</div>
		<hr>

		<div>
			<p>DISCLAIMER</p>
			<p><small>IF YOU NEED ANY OTHER INFORMATION, PLEASE CONTACT YOUR ASSIGNED RELATIONSHIP MANAGER.
					ALTERNATIVELY, FOR ANY ASSISTANCE, PLEASE WHATSAPP YOUR QUERY FROM (10.00 AM TO 6.00 PM). SATURDAY
					WILL BE CLOSED. WISH YOU ALL THE BEST AND LOOK TO OUR ASSOCIATION FOR SATISFACTORY DESIRED
					RESULT.</small></p>
			<p><small>THIS INFORMATION MAY BE CONFIDENTIAL OR PRIVILEGED. IF YOU RECEIVED THIS COMMUNICATION BY MISTAKE,
					DON'T FORWARD IT TO ANYONE ELSE. PLEASE ERASE ALL COPIES AND ATTACHMENTS, AND LET ME KNOW THAT IT
					WENT TO THE WRONG PERSON.</small></p>
			<p><small>PLEASE DO NOT PRINT THIS INFORMATION UNLESS IT IS ABSOLUTELY NECESSARY. SPREAD ENVIRONMENTAL
					AWARENESS.</small></p>
		</div>

		<div class="footer">
			<h3>JodiSearch Matrimonial</h3>
			<p>Email: info@jodisearchmatrimonial.in | Support: (+91) 9718511111 / 9711000143</p>
		</div>

	</div>







</body>



</html>