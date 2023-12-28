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
    include("aheader.html");
$watchid = $_REQUEST['watchid'];
$ret = " SELECT * FROM watch where watchid=$watchid ";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);
    ?>
    <div class="account-in">
   	  <div class="container">
         <form method="POST" action="" enctype="multipart/form-data">
		   <div class="register-top-grid">
			<h2>EDIT WATCH</h2>
			 
			 <div>
			 <span>Brand</span>
             <select name='brand' required>
        <option value="" disabled>Select Brand</option>
        <option <?php if ($data['brand'] == 'Boat') echo 'selected'; ?>>Boat</option>
        <option <?php if ($data['brand'] == 'Titan') echo 'selected'; ?>>Titan</option>
        <option <?php if ($data['brand'] == 'Fastrack') echo 'selected'; ?>>Fastrack</option>
    </select>
			 </div>
			 <div>
			 <span>Colour</span>
             <select name='colour' required>
        <option value="" disabled>Select Colour</option>
        <option value="Black" <?php if ($data['colour'] == 'Black') echo 'selected'; ?>>Black</option>
        <option value="Red" <?php if ($data['colour'] == 'Red') echo 'selected'; ?>>Red</option>
        <option value="Blue" <?php if ($data['colour'] == 'Blue') echo 'selected'; ?>>Blue</option>
    </select>
			 </div>
			 <div>
			 <span>Type</span>
             <select name="type" required>
        <option value="" disabled>Select Type</option>
        <option value="Smart" <?php if ($data['type'] == 'Smart') echo 'selected'; ?>>Smart</option>
        <option value="Chain" <?php if ($data['type'] == 'Chain') echo 'selected'; ?>>Chain</option>
        <option value="Wrist" <?php if ($data['type'] == 'Wrist') echo 'selected'; ?>>Wrist</option>
    </select>
			 </div>
			 <div>
			 <span>Shape</span>
             <select name="shape" required>
        <option value="" disabled>Select Shape</option>
        <option value="Round" <?php if ($data['shape'] == 'Round') echo 'selected'; ?>>Round</option>
        <option value="Square" <?php if ($data['shape'] == 'Square') echo 'selected'; ?>>Square</option>
        <option value="Oval" <?php if ($data['shape'] == 'Oval') echo 'selected'; ?>>Oval</option>
    </select>
			 </div>
             <div>
			 <span>Gender</span>
             <select name="gender" required>
        <option value="" disabled>Select Gender</option>
        <option value="Unisex" <?php if ($data['gender'] == 'Unisex') echo 'selected'; ?>>Unisex</option>
        <option value="Male" <?php if ($data['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($data['gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select>
			 </div>
			 <div>
			 <span>Strap Type</span>
             <select name="strap" required>
        <option value="" disabled>Select Type</option>
        <option value="Leather" <?php if ($data['strap'] == 'Leather') echo 'selected'; ?>>Leather</option>
        <option value="Chain" <?php if ($data['strap'] == 'Chain') echo 'selected'; ?>>Chain</option>
        <option value="Rubber" <?php if ($data['strap'] == 'Rubber') echo 'selected'; ?>>Rubber</option>
    </select>
			 </div>
			 <div>
			 <span>Screen Type</span>
             <select name="screen">
        <option value="" disabled>Select Type</option>
        <option value="AmoLED" <?php if ($data['screen'] == 'AmoLED') echo 'selected'; ?>>AmoLED</option>
        <option value="TFT" <?php if ($data['screen'] == 'TFT') echo 'selected'; ?>>TFT</option>
        <option value="HD" <?php if ($data['screen'] == 'HD') echo 'selected'; ?>>HD</option>
    </select>
			 </div>
			 
			 <div>
			 <span>Warrenty</span>
             <select name="warrenty" required>
        <option value="" disabled>Select Warranty</option>
        <option value="6 Months" <?php if ($data['warrenty'] == '6 Months') echo 'selected'; ?>>6 Months</option>
        <option value="1 Year" <?php if ($data['warrenty'] == '1 Year') echo 'selected'; ?>>1 Year</option>
        <option value="2 Year" <?php if ($data['warrenty'] == '2 Year') echo 'selected'; ?>>2 Year</option>
    </select>
			 </div>
			 <div>
			 <span>Waterproof</span>
             <select name="water" required>
        <option value="" disabled>Select</option>
        <option value="Yes" <?php if ($data['water'] == 'Yes') echo 'selected'; ?>>Yes</option>
        <option value="No" <?php if ($data['water'] == 'No') echo 'selected'; ?>>No</option>
    </select>
			 </div>
             <div>
			 <span>Call Fuction</span>
             <select name="call" required>
        <option value="" disabled>Select</option>
        <option value="Yes" <?php if ($data['call_val'] == 'Yes') echo 'selected'; ?>>Yes</option>
        <option value="No" <?php if ($data['call_val'] == 'No') echo 'selected'; ?>>No</option>
    </select>
			 </div>
			 <div class="clearfix"> </div>
			   <a class="news-letter">
			   </a>
			 </div>
		     <div class="register-bottom-grid">
				    <h2>IMPORTANT INFORMATION</h2>
					 
					 <div>
				<span>Model</span>
				<input type="text" name="model" value="<?php echo $data['model']; ?>"  required> 
			 </div>
             <div>
						<span>Price</span>
						<input type="number" name="price" pattern="[0-9]" value="<?php echo $data['price']; ?>" required>
					 </div>
             
             <div>
				<span>Extras</span>
				<input type="text" name="extra" value="<?php echo $data['extra']; ?>" > 
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

// Fetch data from the database
$ret = "SELECT * FROM watch WHERE watchid=$watchid";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $colour = mysqli_real_escape_string($conn, $_POST['colour']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $shape = mysqli_real_escape_string($conn, $_POST['shape']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $strap = mysqli_real_escape_string($conn, $_POST['strap']);
    $screen = mysqli_real_escape_string($conn, $_POST['screen']);
    $warrenty = mysqli_real_escape_string($conn, $_POST['warrenty']);
    $water = mysqli_real_escape_string($conn, $_POST['water']);
    $call = mysqli_real_escape_string($conn, $_POST['call']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $extra = mysqli_real_escape_string($conn, $_POST['extra']);

    // Insert all details into the database
    $sql = "UPDATE `watch`
            SET
            `brand` = '$brand',
            `colour` = '$colour',
            `type` = '$type',
            `shape` = '$shape',
            `gender` = '$gender',
            `strap` = '$strap',
            `screen` = '$screen',
            `warrenty` = '$warrenty',
            `water` = '$water',
            `call_val` = '$call',
            `model` = '$model',
            `price` = '$price',
            `extra` = '$extra'
            WHERE watchid = '$watchid'";

    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
       
            echo "<script type = 'text/javascript'>
            alert('Successfully Updated');
            window.location = 'watch.php';
            </script>";
        }
    }
include("footer.html");
?>
