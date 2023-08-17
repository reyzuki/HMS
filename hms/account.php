<?php 

include("include/connection.php");

if(isset($_POST['create'])){
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$password = $_POST['pass'];
	$con_pass = $_POST['con_pass'];

	$error = array();

	if(empty($fname)){
	$error['ac'] = "Enter Firstname";
	}
	else if(empty($sname)){
		$error['ac'] = "Enter Surname";
	}
	else if(empty($uname)){
		$error['ac'] = "Enter Username";
	}
	else if(empty($email)){
		$error['ac'] = "Enter Email Address";
	}
	else if(empty($phone)){
		$error['ac'] = "Enter Phone Number";
	}
	else if($gender ==""){
		$error['ac'] = "Select your gender";
	}
	else if(empty($password)){
		$error['ac'] = "Enter Password";
	}
	else if($con_pass != $password){
		$error['ac'] = "Password does not match";
	}
	
	if(count($error)==0){

		$query = "INSERT INTO patients(firstname,surname,username,email,phone,gender,password,date_reg,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$password',NOW(),'patient.jpeg')";

		$res = mysqli_query($connect,$query);

		if($res){

			echo "<script>alert('You have Successfully Signed Up')</script>";

			header("Location: patientlogin.php");

		}
		else {
			echo "<script>alert('Failed')</script>";
		}
	 }

}



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Account</title>
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
				<div class="col-md-6 ">
					<h5 class="text-center">Create Account</h5><br>
					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
						</div><br>
						<div class="form-group">
							<label>Surname</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
						</div><br>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
						</div><br>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
						</div>
						<br>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
						</div><br>
						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div><br>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div><br>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
						</div><br>
						<input type="submit" name="create" value="Signup" class="btn btn-success">
						<p>I already have an account? <a href="patientlogin.php">Login</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>