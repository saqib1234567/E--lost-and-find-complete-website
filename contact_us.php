

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.containerr {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

    <title>Find and lost things</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="st1/style.css">
	
  </head>
  <body>
  
   <div id="log-btn">
               
                <div>
                    <a href="login.php" >LOGIN</a>
                    <a href="registration.php" >SIGNUP</a>
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
	
	<div class="row" id="btn">
		<div class="col-md-12">
			

<h3>Contact Form</h3>

<div class="containerr">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>




			
			
		</div>
		
	</div>
	
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1 style="text-align:center;">
					HOPE is the source of Happiness
				</h1>
			</div>
		</div>
	</div>
	<br><br>

   
<?php include("footer.php") ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
	
	
  </body>
</html>