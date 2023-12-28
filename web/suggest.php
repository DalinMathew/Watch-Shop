<!DOCTYPE HTML>
<html>
<head>
<title>Watches Admin Edit Watch</title>
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
<script src="js/shopassword.js"></script>
</head>
<body>
	<?php
	include("connection.php");
    include("sheader.html");
    ?>
    <div class="account-in">
   	  <div class="container">
         <form method="POST" action="" enctype="multipart/form-data">
		     <div class="register-bottom-grid">
				    <h2>SUGGESTIONS</h2>
					 <div>
				<span>Type Your Edits</span>
				<input type="text" name="suggest"  required> 
			 </div>
             <div>
					 </div>
					 <div class="clearfix"> </div>
					 <div class="clearfix"> </div>
					 <div class="clearfix"> </div>
                     </div> 
        <div class="clearfix"> </div>
		<div class="register-but">

			   <input type="submit" value="Submit" name="submit">
			   <div class="clearfix"> </div>
		   </form>
		</div>
	   </div>
   </div>
   
   <?php


$watchid = $_REQUEST['watchid'];
$suggest = isset($_POST['suggest']) ? $_POST['suggest'] : '';
// Fetch data from the database
$ret = "SELECT * FROM watch WHERE watchid=$watchid";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $brand = mysqli_real_escape_string($conn, $data['brand']);
    $model = mysqli_real_escape_string($conn, $data['model']);
    // Insert all details into the database
    $sql = "INSERT INTO `suggest`(
        `watchid`,
        `brand`,
        `model`,
        `suggest`
    )
    VALUES(
        '$watchid',
        '$brand',
        '$model',
        '$suggest'
    )";

    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
       
            echo "<script type = 'text/javascript'>
            alert('Successfully Added');
            window.location = 'shopwatch.php';
            </script>";
        }
    }
include("footer.html");
?>
