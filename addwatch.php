<!DOCTYPE HTML>
<html>
<head>
<title>Watches Admin Add Watch</title>
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
    ?>
    <div class="account-in">
   	  <div class="container">
   	     <form method="POST" action="" enctype="multipart/form-data"> 
		   <div class="register-top-grid">
			<h2>ADD WATCH</h2>
			 
			 <div>
			 <span>Brand</span>
             <select name="brand" required>
        <option value="" selected disabled>Select Brand</option>
        <option >Boat</option>
        <option >Titan</option>
        <option >Fastrack</option>
    </select>
			 </div>
			 <div>
			 <span>Colour</span>
            <select name="colour" required>
                <option value="" selected disabled>Select Colour</option>
                <option>Black</option>
                <option>Red</option>
                <option >Blue</option>
            </select>
			 </div>
			 <div>
			 <span>Type</span>
            <select name="type" required>
                <option value="" selected disabled>Select Type</option>
                <option>Smart</option>
                <option>Chain</option>
                <option>Wrist</option>
            </select>
			 </div>
			 <div>
			 <span>Shape</span>
            <select name="shape" required>
                <option value="" selected disabled>Select Shape</option>
                <option>Round</option>
                <option>Square</option>
                <option>Oval</option>
            </select>
			 </div>
             <div>
			 <span>Gender</span>
            <select name="gender" required>
                <option value="" selected disabled>Select Shape</option>
                <option>Unisex</option>
                <option>Male</option>
                <option>Female</option>
            </select>
			 </div>
			 <div>
			 <span>Strap Type</span>
            <select name="strap" required>
                <option value="" selected disabled>Select Type</option>
                <option>Leather</option>
                <option>Chain</option>
                <option>Rubber</option>
            </select>
			 </div>
			 <div>
			 <span>Screen Type</span>
            <select name="screen">
                <option value="" selected disabled>Select Type</option>
                <option>AmoLED</option>
                <option>TFT</option>
                <option>HD</option>
            </select>
			 </div>
			 
			 <div>
			 <span>Warrenty</span>
            <select name="warrenty" required>
                <option value="" selected disabled>Select Warrenty</option>
                <option>6 Months</option>
                <option>1 Year</option>
                <option>2 Year</option>
            </select>
			 </div>
			 <div>
			 <span>Waterproof</span>
            <select name="water" required>
                <option value="" selected disabled>Select</option>
                <option>Yes</option>
                <option>No</option>
            </select>
			 </div>
             <div>
			 <span>Call Fuction</span>
            <select name="call">
                <option value="" selected disabled>Select</option>
                <option>Yes</option>
                <option>No</option>
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
				<input type="text" name="model" required> 
			 </div>
             <div>
						<span>Price</span>
						<input type="number" name="price" pattern="[0-9]" required>
					 </div>
             <div class>
				<span>Image</span>
				<input type="file" name="image" id="image" accept="image/*" required> 
			 </div>
             <div>
				<span>Extras</span>
				<input type="text" name="extra"> 
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

if (isset($_POST['submit'])) {
    $brand = $_POST['brand'];
    $colour = $_POST['colour'];
    $type = $_POST['type'];
    $shape = $_POST['shape'];
    $gender = $_POST['gender'];
    $strap = $_POST['strap'];
    $screen = $_POST['screen'];
    $warrenty = $_POST['warrenty'];
    $water = $_POST['water'];
    $call = $_POST['call'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $extra = $_POST['extra'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the image file is a valid type
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if the file was successfully uploaded
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File uploaded successfully
            $filePath = $targetFile;

            // Insert all details into the database
            $sql = "INSERT INTO `watch` (
                `brand`, `colour`, `type`, `shape`, `gender`, `strap`, `screen`,
                `warrenty`, `water`, `call_val`, `model`, `price`, `image`, `extra`
            )
            VALUES (
                '$brand', '$colour', '$type', '$shape', '$gender', '$strap', '$screen',
                '$warrenty', '$water', '$call', '$model', '$price', '$filePath', '$extra'
            )";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert(\"Registration Successful\");</script>";
                
                // Redirect to watch.php
                header("Location: watch.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    // No need to close the database connection here if it's handled in your external file
}

include("footer.html");
?>
