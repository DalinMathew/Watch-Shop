<!DOCTYPE HTML>
<html>
<head>
<title>Watches Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/shopassword.js"></script>
</head>
<body>
	<?php
	session_start();
	date_default_timezone_set("Asia/Calcutta");
	include("connection.php");
    include("header.html");

    ?>
  
   <div class="account-in">
   	 <div class="container">
   	   <h3>Account</h3>
		<div class="col-md-7 account-top">
		  <form method="POST" action="">
			<div> 	
				<span>Email</span>
				<input type="text" placeholder="Enter Your Email ID" name="email" required> 
			</div>
			<div> 
				<span class="pass">Password</span>
				<input type="password" placeholder="Enter Your Password" name="password" id="password" 	required>
				<br><input type="checkbox" onclick="myFunction()"> Show Password

			</div>				
				<input type="submit" value="Log In" name="submit"> 
				&nbsp;&nbsp;&nbsp;&nbsp;Don't Have an Account!<a href="register.php"> Click Here</a>
		   </form>
		</div>
		
	    <div class="clearfix"> </div>
	  </div>
   </div>
   <?php
   if (isset($_POST["submit"])) {		
	   $email = $_POST['email'];
	   $password = $_POST['password'];
   
	   $qry = "SELECT type FROM login WHERE email='$email' AND password='$password'";
	   $res = mysqli_query($conn, $qry);
   
	   if ($res) {
		   $rs = mysqli_fetch_assoc($res);
   
		   if ($rs) {
			   $da = $rs["type"];
			   
			   if ($da == "admin")
			   {
				   header("location: adminhome.php");
			   } 
			   elseif ($da == "shop")
			   {
				$query="select * from shop where email='$email'";
				$result=mysqli_query($conn,$query)or die("selection error".mysqli_error($con));
				$row=mysqli_fetch_array($result);
				if($row)
				  {
					$email1=$row["email"];
					if($email==$email1)
					{
					  $_SESSION['shopid']=$row['shopid'];
					  echo "<script> alert('Login successfull');</script>";
					 header('Location:shophome.php');
					  exit();
					}
					
				   } else {
					echo "<script>alert(\"Error retrieving shop information\");</script>";
				}
			   } 
			   elseif ($da == "customer") {
				$query="select * from customer where email='$email'";
				$result=mysqli_query($conn,$query)or die("selection error".mysqli_error($con));
				$row=mysqli_fetch_array($result);
			
				if ($row) 
				{
					$email1=$row["email"];
					if($email==$email1)
					{
					$_SESSION['custid']=$row['custid'];
					echo "<script> alert('Login successfull');</script>";
					header("location: custhome.php"); 
					exit();
					} // Redirect to shophome.php with custid parameter
				} 
				else {
					echo "<script>alert(\"Error retrieving customer information\");</script>";
				}
			   } 
			   else {
				   echo "<script>alert(\"INVALID USERNAME OR PASSWORD\");</script>";
			   }
		   } 
		   else {
			   echo "<script>alert(\"Invalid username or password\");</script>";
		   }
	   } 
	   else {
		   echo "<script>alert(\"Database query error\");</script>";
	   }
   }
   
   include("footer.html")
   ?>
</body>
</html>		