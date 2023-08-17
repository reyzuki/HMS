<?php 
session_start();

error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paitent Profile </title>
</head>
<body>
	<?php 
	include("../include/header.php");
	include("../include/connection.php")
	 ?>

	  <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -30px;">
	 				<?php 
	 				include("sidenav.php");

	 				$patient = $_SESSION['patient'];
	 				$query = "SELECT * FROM patients WHERE username='$patient'";

	 				$res = mysqli_query($connect,$query);

	 				$row = mysqli_fetch_array($res);

	 				?>
	 			</div>
	 			<div class="col-md-10">
	 				<div class="container-fluid">
	 					<div class="col-md-12">
	 						<div class="row">
	 							<div class="col-md-6">
	 								<?php 
	 								if(isset($_POST['upload'])){
	 									$img = $_FILES['img']['name'];
	 									if(empty($img)){

	 									}else{
	 										$query = "UPDATE patients SET profile = '$img' WHERE username = '$patient' ";

	 										$res = mysqli_query($connect,$query);

	 										if ($res) {
	 											move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
	 										}
	 									}
	 								}
	 								 ?>
	 								 <h5>My Profile</h5>
	 								 <form method="post" enctype="multipart/form-data">
	 								 	<?php 
	 								 	echo "<img src='img/".$row['profile']."' style='height: 250px;' class='col-md-6 my-3'>"; 

	 								 	?>
	 								 	<input type="file" name="img" class="form-control my-2"><br>
	 								 	<input type="submit" name="upload" class="btn btn-info" value="Update Profile" style="margin-left: 225px;">
	 								 </form>
	 								 <div class="my-3">
	 								 	<table class="table table-bordered">
	 								 		<tr>
	 								 			<th colspan="2" class="text-center">My Details</th>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Firstname</td>
	 								 			<td><?php echo $row['firstname']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Surname</td>
	 								 			<td><?php echo $row['surname']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Username</td>
	 								 			<td><?php echo $row['username']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Email</td>
	 								 			<td><?php echo $row['email']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Phone Number</td>
	 								 			<td><?php echo $row['phone']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Gender</td>
	 								 			<td><?php echo $row['gender']; ?></td>
	 								 		</tr>
	 								 	</table>
	 								 </div>

	 							</div>
	 							<div class="col-md-6">
	 								<h5 class="text-center my-2">Change Username</h5>
	 								<?php 

	 								 if(isset($_POST['update'])){
	 									$uname = $_POST['uname'];
	 									if(empty($uname)){

	 									}else{
	 										$query = "UPDATE patients SET username = '$uname' WHERE username = '$patient' ";

	 										$res = mysqli_query($connect,$query);

	 										if ($res) {
	 											$_SESSION['patient'] = $uname;
	 										}
	 									}
	 								}

	 								 ?>

	 								<form method="post">
	 									<label>Update Username</label>
	 									<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
	 									<br>
	 									<input type="submit" name="update" class="btn btn-info" value="Change Username" style="margin-left: 225px;">
	 								</form>
	 								<br><br>
	 								<h5 class="text-center my-2">Change Password</h5>
	 								<?php 

	 								 if($_POST['change']){
	 									$old = $_POST['old_pass'];
	 									$new = $_POST['new_pass'];
	 									$con = $_POST['con_pass'];

	 									$q = "SELECT * FROM patients WHERE username = '$patient'";
	 									$re = mysqli_query($connect,$q);
	 									$row = mysqli_fetch_array($re);


	 									if($old != $row['password']){

	 									}else if (empty($new)) {
	 										// code...
	 									}else if ($con != $new) {
	 										// code...
	 									}else{
	 										$query = "UPDATE patients SET password = '$new' WHERE username = '$patient'";

	 										mysqli_query($connect,$query);
	 									}
	 								}

	 								 ?>
	 								<form method="post">
	 									<div class="form-group">
	 										<label>Old Password</label>
	 										<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password"><br>
	 									</div>
	 									<div class="form-group">
	 										<label>New Password</label>
	 										<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password"><br>
	 									</div>
	 									<div class="form-group">
	 										<label>Confirm Password</label>
	 										<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder=" Confirm Password"><br>
	 									</div>
	 									<input type="submit" name="change" class="btn btn-info" value="Change Password" style="margin-left: 225px;">
	 								</form>
	 							</div>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>