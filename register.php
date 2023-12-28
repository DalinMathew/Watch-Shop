<!DOCTYPE HTML>
<html>
<head>
<title>Watches Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
</head>
<body>
	<?php
    include("header.html");
    include("connection.php");
    ?>
   
    <div class="account-in">
   	  <div class="container">
   	     <form method="POST" action=""> 
		   <div class="register-top-grid">
			<h2>Registration</h2>
			 <div>
				<span>Who are You<label>?</label></span>
				<input type="radio" name="type" value="shop" checked>&nbsp;&nbsp;Shop Owner
                <br><input type="radio" name="type" value="cust">&nbsp;&nbsp;Customer
			 </div>
			  	     
			<div class="register-but">
		  		 <form>
				   <input type="submit" value="Select" name="submit">
		  		 </form>
				</div>
	   		</div>
   		</div>
   </div>
   
   <?php
   if(isset($_POST['submit']))
   {
	$type=$_POST['type'];
	if ( $type== "shop")
		header("Location: shop_register.php");
	elseif ( $type== "cust")
		header("Location: cust_register.php");

   }
   include("footer.html");
   ?>
</body>
</html>		