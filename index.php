<?php 
session_start();
require('db.php');
if (isset($_SESSION['email'])) {
	//redirecting if there is already a session with the name email
	header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find and lost things</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="st1/style.css">
	
	<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 50px 70px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
</style>
	
	
	
  </head>
  <body>
  
   <div id="log-btn">
               
                <div>
                    <a href="login.php" ><button>LOGIN</button></a>
                    <a href="registration.php" ><button>SIGNUP</button></a>
                </div>
        </div>
  <?php 
  include("header.php")
  ?>

  <!--header pic-->
  <div class="row">
		<div class="col-md-12">
			<img src="data/findme.jpg" alt="cover  pic" width="100%" height="80%">
		</div>
	</div>
	
	 <div class="container-fluid" style="background: linear-gradient(to left, #ffffff -9%, #000000 127%);">
	<div class="row">
			<div class="col-xl-8">
				<div >
					<p style="color:white; text-align:center;"><br><br> "If you have lost or found some click here <br>
					      but first you have to be register." <br><br></p>
				</div>
			</div>
			<div class="col-xl-4" >
				<button type="button" class="button button5" onclick="window.location.href='login.php'"  >
				LOST/FOUND SOMETHING
			</button>
			</div>
		</div>
	
	</div>
	
	
	
	
	
	<br><br><br><br>
	
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1 style="text-align:center;">
					HOPE is the source of Happiness
				</h1>
			</div>
		</div>
	</div>
	
<br><br><br>
   
<?php include("footer.php") ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
	
	
  </body>
</html>