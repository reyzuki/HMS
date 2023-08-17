<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white"style="margin-left: 20px;">Hospital Management System</h5>
		<div class="mr-auto"></div>

		<ul class="navbar-nav" style="margin-left: 900px;">
			<?php

			if(isset($_SESSION['admin'])){

				$user = $_SESSION['admin'];
				echo '
			<li class="nav-item"><a href="profile.php" class="nav-link">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
				';
			}
			else if (isset($_SESSION['doctor'])){

				$user = $_SESSION['doctor'];
				echo '
			<li class="nav-item"><a href="profile.php" class="nav-link">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
				';

			}else if (isset($_SESSION['patient'])){

				$user = $_SESSION['patient'];
				echo '
			<li class="nav-item"><a href="profile.php" class="nav-link">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link">logout</a></li>
				';

			}else{
				echo'
			<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
			<!-- <li class="nav-item"><a href="adminlogin.php" class="nav-link">Admin</a></li> -->
			<li class="nav-item"><a href="doctorlogin.php" class="nav-link">Doctor</a></li>
			<li class="nav-item"><a href="patientlogin.php" class="nav-link">Patient</a></li>
				';
			}

			?>
		</ul>
	</nav>

</body>
</html>