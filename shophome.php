<!DOCTYPE HTML>
<html>
<head>
<title>Watches Shop Home</title>
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
                <?php
				session_start();
				$shopid= $_SESSION['shopid'];
				
include("connection.php");
// Check if the 'shopid' key is set in the $_REQUEST array

    // Query to get the name from the 'shop' table based on the 'shopid'
    $sql = "SELECT name FROM shop WHERE shopid = $shopid";
    $result = mysqli_query($conn, $sql);
    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);

        // Output the welcome message using the fetched name
        echo '<h4><p>Welcome..' . $row['name'] . '.</p><div class="clearfix"> </div></h4>';
    } else {
        // Handle the case where the query failed
        echo "Welcome";
    }

?>

		      </div>
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right">
		  	 <br>
			 <ul class="header_user_info">
			 <?php
					 $shopid= $_SESSION['shopid'];
					 $_SESSION['shopid']=$shopid;
			  echo "<a class='login' href='shopprofile.php'>";
				echo "<i class='user'> </i>";
				echo "<li class='user_desc'>PROFILE</li></a>";
				
			  
			  ?>
			  <div class="clearfix"> </div>
			  
		     </ul>
			 <ul class="header_user_info">
			 <a href="index.php">
				<i class="user"> </i> 
				<li class="user_desc">LOG OUT</li>
			  </a>
		            <div class="clearfix"> </div>
					
			 </div>
			</ul>
		     <div class="clearfix"> </div>
	  </div><br>
      
	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a href="shophome.php"><span class="m_1">W</span>atches</a></h1>
	   </div>
   	   <div class="menu">
	     <ul class="megamenu skyblue">
		 <li class="active grid">
    <?php
					 $shopid= $_SESSION['shopid'];
					 $_SESSION['shopid']=$shopid;
        echo "<li><a class='color4' href='shopwatch.php'>Watch.</a></li>";
        echo "<li><a class='color10' href='stock.php'>Stock.</a></li>";
			echo "<li class='active grid'><a class='color3' href='booking.php'>Bookings.</a></li>";
			?>
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