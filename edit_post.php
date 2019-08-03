 <?php 
 
    session_start ();
 
 include("db.php");
 include("header.php") ;
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
<title>Home</title>
<link rel="stylesheet" href="rcss/style.css" />
    <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/style.css" rel="stylesheet">
	<link rel="stylesheet" href="st1/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styleh/home_style2.css">
	<link rel="stylesheet" href="styles/home_style.css" media="all"/>

</head>
<body>




<!--Container starts--> 
	<div class="container">
		<!--Header Wrapper Starts-->
		<div>
		
			<!--Header Starts-->
			<form method="get" action="results.php" id="form1">
					<input type="text" name="user_query" placeholder="Search a topic"/> 
					<input type="submit" name="search" value="Search"/>
				</form>
			<!--Header ends-->
		</div>
		<!--Header Wrapper ends-->
			<!--Content area starts-->
			<div class="content">
				<!--user timeline starts-->
				<div id="user_timeline">
				  <div id="user_details">
					<?php 
					$user = $_SESSION['email'];
					$get_user = "select * from users where email='$user'"; 
					$run_user = mysqli_query($con,$get_user);
					$row=mysqli_fetch_array($run_user);
					
					$user_id = $row['user_id']; 
					$username = $row['username'];
					$phone = $row['phone'];
					$user_image = $row['img'];
					
				    
					
					$user_posts = "select * from lostitem where user_id='$user_id'"; 
					$run_posts = mysqli_query($con,$user_posts); 
					$posts = mysqli_num_rows($run_posts);
					
					//getting the number of unread messages 
					$sel_msg = "select * from messeges where receiver='$user_id' AND status='unread' ORDER by 1 DESC"; 
					$run_msg = mysqli_query($con,$sel_msg);		
		
					$count_msg = mysqli_num_rows($run_msg);
					
					
					echo "
						<center>
						<img src='user/user_images/$user_image' width='200' height='200'>
						</center>
						<div id='user_mention'>
						<p><strong>Name:</strong> $username</p>
						
						<p><strong>Phone:</strong> $phone</p>
					
						
						
						<p><a href='my_messages.php?inbox&u_id=$user_id'>Messages ($count_msg)</a></p>
						<p><a href='my_posts.php?u_id=$user_id'>My Posts ($posts)</a></p>
						<p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p>
						<p><a href='logout.php'>Logout</a></p>
						</div>
					";
					?>
					</div>
				</div>
				<!--user timeline ends-->
				
				
	
				<!--Content timeline starts-->
				<div id="content_timeline">
				<?php 
					if(isset($_GET['post_id'])){
						
						$get_id = $_GET['post_id']; 
						
						$get_post = "select * from lostitem where post_id='$get_id'"; 
						$run_post = mysqli_query($con,$get_post); 
						$row=mysqli_fetch_array($run_post); 
						
						$post_title = $row['name']; 
						$post_con = $row['description'];
						$phone = $row['ph']; 
						$city = $row['city']; 
						$address = $row['address']; 
						
					
					}
				?>
					<form action="" method="post" id="f">
					<h2>Edit Your Post:</h2>
					<input type="text" name="title" value="<?php echo $post_title;?>" size="82" required="required"/><br/> 
					<textarea cols="83" rows="4" name="content"><?php echo $post_con;?></textarea><br/>
					
					<input type="text" name="phone"  value="<?php echo $phone;?>"  />                 
                    <input type="text" name="city" value="<?php echo $city;?>" />
                    <input type="text" name="address" value="<?php echo $address;?>" />
					
					<input type="submit" name="update" value="Update Post"/>
					</form>
					
					<?php 
					if(isset($_POST['update'])){
					
					$title = $_POST['title']; 
					$content = $_POST['content'];
					$up = $_POST['phone'];
					$uc = $_POST['city'];
					$ua = $_POST['address'];
					
					
				
					
					$update_post = "update lostitem set name='$title', description='$content', ph='$up', city='$uc', address='$ua' where post_id='$get_id'";
					$run_update = mysqli_query($con,$update_post); 
					
					if($run_update){
					
					echo "<script>alert('Post has been updated!')</script>";
					echo "<script>window.open('home.php','_self')</script>";
					
					}
					
					}
					
					?>
					
			
				</div>
	
	
				
				
				
				
				
				
				
                </div>
				<!--Content timeline ends-->
			</div>
			<!--Content area ends-->
		
	</div>
	<!--Container ends-->













<?php include("footer.php") ?>


	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
 
</body>
</html>





<?php } ?>