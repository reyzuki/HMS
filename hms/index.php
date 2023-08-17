<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HMS Home Page</title>
</head>
<body>

	<?php
include("include/header.php");
?>

	<div style="margin-top: 50px;"></div>

	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3 mx-1 shadow">
					<img src="img/info.png" style="width:100%; height: 190px;">
					<h5 class="text-center">For more Infomation?</h5>
					<a href="">
						<button class="btn btn-success my-3" style="margin-left: 30%">Read More</button>
					</a>
				</div>
				<div class="col-md-4 mx-1 shadow">
					<img src="img/patient.jpeg" style="width: 100%;">
					<h5 class="text-center">Looking for quality health care?</h5>
					<a href="account.php">
						<button class="btn btn-success my-3" style="margin-left: 40%">Join us</button>
					</a>
					
				</div>
				<div class="col-md-4 mx-1 shadow">
					<img src="img/doctor.jpeg" style="width: 100%;">
					<h5 class="text-center">Join our Elite Doctors</h5>
					<a href="apply.php">
						<button class="btn btn-success my-3" style="margin-left: 30%">Apply Now!!</button>
					</a>
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>