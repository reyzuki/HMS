<?php

session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

   
    $errors = array();

  
    $query = "SELECT * FROM doctors WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ss", $uname, $password);

    
    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    
    if (mysqli_num_rows($result) == 0) {
        $errors['login'] = "Invalid Username or Password";
    } else {
        $row = mysqli_fetch_assoc($result);

        if ($row['status'] == "Pending") {
            $errors['login'] = "Please wait for approval of your sign up";
        } else if ($row['status'] == "Rejected") {
            $errors['login'] = "Your application was rejected, Please sign up again";
        }
    }

    
    mysqli_stmt_close($stmt);

   
    if (count($errors) == 0) {
        echo "<script>alert('Done')</script>";
        $_SESSION['doctor'] = $uname;
        header("Location: doctor/index.php");
        exit();
    }
}


$show = "";
if (isset($errors['login'])) {
    $l = $errors['login'];
    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Login Page</title>
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
					<div>
						<?php 
						echo $show; ?>
					</div>
					<form method="post"  class="my-2">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
						</div>
						<br>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="Enter Password" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>">
						</div>
						<br>
						<input type="submit" name="login" class="btn btn-info" value="Login"  >
						<p >I dont have an account  <a href="apply.php">Sign Up</a></p>

					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</body>
</html>