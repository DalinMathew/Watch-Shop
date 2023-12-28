<!DOCTYPE HTML>
<html>
<head>
<title>Watches Admin Home</title>
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
<style>
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        h4 {
            overflow: hidden;
            border-right: 2px solid; /* You can adjust the border properties as needed */
            white-space: nowrap;
            font-size: 15px; /* You can adjust the font size as needed */
            animation: typing 4s steps(40, end) infinite; /* Adjust the animation duration as needed */
        }
    </style>
</head>
<body>
	<div class="banner">
   	  <div class="container">
   	  	<div class="header_top">
   	  	   <div class="header_top_left"><br>
	  	      <div class="box_11">
		      <h4><p>Welcome.. Admin.</p><div class="clearfix"> </div></h4>
		      </div>
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right"><br>
		  	 
			 <ul class="header_user_info">
			  <a class="login" href="index.php">
				<i > </i> 
			  </a>
			  
			  <div class="clearfix"> </div>
			  
		     </ul>
			 <ul class="header_user_info">
			 <a href="index.php">
				<i class="user"> </i> 
				<li class="user_desc">Log Out</li>
			  </a>
		            <div class="clearfix"> </div>
					
			 </div>
			</ul>
		     <div class="clearfix"> </div>
	  </div><br>
      
	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a><span class="m_1">W</span>atches</a></h1>
	   </div>
   	   <div class="menu">
	     <ul class="megamenu skyblue">
			<li class="active grid"><a class="color4">.</a>	
			<li ><a class="color3" href="shops.php">Shops.</a></li>
			<li class="active grid"><a class="color7" href="customers.php">Customers.</a></li>
			<li><a class="color10" href="watch.php">Watch.</a></li>

			<div class="clearfix"> </div>
			</ul>
			</div>
	        <div class="clearfix"> </div>
	        </div>
	    </div>
   </div>
   <?php
   include("common-footer.php");
   ?>