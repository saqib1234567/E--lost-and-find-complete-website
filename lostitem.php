<?php 
 
  session_start ();
 
 include("db.php");
 include("functions/functions.php") ;
 
 
 if(!isset($_SESSION['email'])){
	
	header("location: index.php"); 
}
else {
    
 ?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>lost items</title>
<link rel="stylesheet" href="rcss/style.css" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="st1/style.css">

</head>
<body>
<?php
require('db.php');



$user = $_SESSION['email'];
					$get_user = "select * from users where email='$user'"; 
					$run_user = mysqli_query($con,$get_user);
					$row=mysqli_fetch_array($run_user);
					
					$user_id = $row['user_id'];
		







if (isset($_POST['submit'])){
	



	
	global $con;
	global $user_id;
	 
        // removes backslashes
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($con,$name); 
	$description = stripslashes($_REQUEST['description']);
	$description = mysqli_real_escape_string($con,$description);
	$phone = stripslashes($_REQUEST['phone']);
	$phone = mysqli_real_escape_string($con,$phone);
	$countary = stripslashes($_REQUEST['countary']);
	$countary = mysqli_real_escape_string($con,$countary);
	$city = stripslashes($_REQUEST['city']);
	$city = mysqli_real_escape_string($con,$city);
	$address = stripslashes($_REQUEST['address']);
	$address = mysqli_real_escape_string($con,$address);
	
	
	
	
	
	
        $query = "INSERT into `lostitem` (name, description, ph, countary, city, address,date,user_id)
VALUES ('$name', '$description', '$phone', '$countary', 'city', '$address',NOW(),'$user_id' )";
        $result = mysqli_query($con,$query);
        if($result){
			$update = "update users set posts='yes' where user_id='$user_id'";
			$run_update = mysqli_query($con,$update);
            echo "<div class='form'>
<h3>You have entered data successfully.</h3>
<br/>Click here to <a href='home.php'>to go home</a></div>";

        }
    }else{
?>


	

 <?php include("header.php")?>



<div class="form" id="myForm"">
<h1>Enter Data </h1>
<form name="registration" action="lostitem.php?=<?php echo $user_id;?>" method="post" >
<br><br>



<input type="text" name="name" placeholder="Name/ Title" value="I LOST/FOUND " required />
<br><br>
<textarea name="description" rows="5" cols="40" placeholder="Description" value="" ></textarea>
<br>
 
<input type="text" name="phone" placeholder="Phone Number" value=""  required />
<input type="text" name="countary" placeholder="Countary"  value="" required />
<input type="text" name="city" placeholder="city" required />
  <input type="text" name="address" placeholder="Address" required />
<input type="submit" name="submit" value="Submit" />
</form>
</div>



<script>
function myFunction() {
  document.getElementById("myForm").reset();
}

</script>

<?php } ?>

	<br><br><br><br><br>
<?php include("footer.php") ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
 

</body>
</html>

<?php } ?>