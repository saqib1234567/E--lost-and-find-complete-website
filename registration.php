<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Registration</title>
<link rel="stylesheet" href="rcss/style.css" />

    <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/style.css" rel="stylesheet">
	<link rel="stylesheet" href="st1/style.css">

</head>
<body>
<?php

session_start();
require('db.php');
if (isset($_SESSION['email'])) {
	//redirecting if there is already a session with the name email
	header("Location: home.php");
}


// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	
	
	$phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($con,$phone);
	$idcard = stripslashes($_REQUEST['idcard']);
	$idcard = mysqli_real_escape_string($con,$idcard);
	$address = stripslashes($_REQUEST['address']);
	$address = mysqli_real_escape_string($con,$address);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$posts = "No";
	
	$trn_date = date("Y-m-d H:i:s");
	$status = "verified";

	
	
	
	/*check email already exists or not*/
	
	
		$check_username_query = "select user_name from users where email='$email'";
		$run_username = mysqli_query($con,$check_username_query);

		if(strlen($password) <9 ){
			echo"<script>alert('Password should be minimum 9 characters!')</script>";
			echo "<script>window.open('registration.php', '_self')</script>";
			exit();
		}

		$check_email = "select * from users where email='$email'";
		$run_email = mysqli_query($con,$check_email);

		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('registration.php', '_self')</script>";
			exit();
		}

	
	
	
        $query = "INSERT into `users` (username, password, email, trn_date, phone, idcard, address,posts)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date', '$phone', '$idcard', '$address','$posts' )";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>

  <?php include("header.php") ?>

<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="User Name" required />



<input type="text" name="phone" placeholder="Phone Number" required />
<input type="text" name="idcard" placeholder="Id Card Number" required />
<input type="text" name="address" placeholder="Address" required />



<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
<br><br><br><br>
	<?php include("footer.php") ?>
	
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
 

</body>
</html>