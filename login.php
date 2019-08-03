<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>
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
if (isset($_POST['email'])){
        // removes backslashes
	$email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['email'] = $email;
            
	    header("Location:home.php");
         }else{
			 echo "<script>alert('Your Email or Password is Incorrect')</script>";
			echo "<script>window.open('login.php', '_self')</script>";
			exit();
			 
	}
    }else{
?>

 
 
  <?php include("header.php") ?>

<div class="form">
<h1>Login</h1>
<form action="" method="post" name="login">
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("footer.php") ?>


	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
 
</body>
</html>
<?php } ?>

