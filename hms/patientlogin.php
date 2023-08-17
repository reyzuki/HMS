<?php

session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (empty($uname)) {
    	echo "<script>alert('Enter Username')</script>";
    }else if(empty($pass)){
    	echo "<script>alert('Enter Password')</script>";
    }else{
    	$query = "SELECT * FROM patients WHERE username = '$uname' AND password = '$pass'";
    	$res = mysqli_query($connect,$query);

    	if (mysqli_num_rows($res)==1) {
    		header("Location: patient/index.php");

    		$_SESSION['patient'] = $uname;

    	}else{
    		echo "<script>alert('Invalid Account')</script>";
    	}
    }

   
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Login Page</title>
</head>
<body style="background-color: rgb(230,230,250);">

	<?php 

	include("include/header.php");

	 ?>

	 <div style="margin-top: 50px;"></div>

	 <div class="container">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my">
	 				<img src="img/act.jpg" style="height: 200px; width: 20%; margin-left: 250px;" class="col-md-12">
	 				<form method="post" class="my-2">
	 					<div class="form-group">
	 						<label>Username</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
	 					</div><br>
	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>">
	 					</div><br>
	 					<input type="submit" name="login" class="btn btn-info" value="Login">
	 					<p>Don't have an account? <a href="account.php">Sign Up</a></p>
	 				</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>