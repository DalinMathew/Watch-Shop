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
<style>
.register-top-grid select,
.register-bottom-grid select{
    border: 1px solid #EEE;
    outline-color: #FF5B36;
    width: 96%;
    font-size: 1.5em;
    padding: 0.5em;
    background-color: #fff; /* Add background color if needed */
    color: #000; /* Text color */
    margin: 10px 0;
}

/* Additional styling for dropdown arrow */
.register-top-grid select::after,
.register-bottom-grid select::after{
    content: '\25BC'; /* Unicode character for down arrow */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 1.5em;
    color: #999; /* Arrow color */
    pointer-events: none; /* Ensure arrow doesn't interfere with select click */
}

/* Styling for dropdown options */
.register-top-grid select option ,
.register-bottom-grid select option{
    background-color: #fff; /* Background color for options */
    color: #000; /* Text color for options */
}
</style>
</head>
<body>
	<?php
    session_start();
	include("connection.php");
    include("sheader.html");
    
    $watchid= $_SESSION['watchid'];
$ret = " SELECT * FROM stock where watchid=$watchid ";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);
    ?>
    <div class="account-in">
   	  <div class="container">
         <form method="POST" action="" enctype="multipart/form-data">
		   <div class="register-bottom-grid">
			<h2>EDIT STOCK</h2>
            <div>
			 <span>Brand</span>
             <select name='brand' disabled>
        <option value="" disabled>Select Brand</option>
        <option <?php if ($data['brand'] == 'Boat') echo 'selected'; ?>>Boat</option>
        <option <?php if ($data['brand'] == 'Titan') echo 'selected'; ?>>Titan</option>
        <option <?php if ($data['brand'] == 'Fastrack') echo 'selected'; ?>>Fastrack</option>
    </select>
			 </div>
					 <div>
				<span>Model</span>
				<input type="text" name="model" value="<?php echo $data['model']; ?>"  disabled> 
			 </div>
             <div>
						<span>Price</span>
						<input type="number" name="price" pattern="[0-9]" value="<?php echo $data['price']; ?>" disabled>
					 </div>
             
             <div>
				<span>Quantity</span>
				<input type="number" name="quantity" value="<?php echo $data['quantity']; ?>" required > 
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

$watchid= $_SESSION['watchid'];

// Fetch data from the database
$ret = "SELECT * FROM stock WHERE watchid=$watchid";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $watchid= $_SESSION['watchid'];
    // Insert all details into the database
    $sql = "UPDATE `stock`
            SET
            `quantity` = '$quantity'
            WHERE watchid = '$watchid'";

    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
       
            echo "<script type = 'text/javascript'>
            alert('Successfully Updated');
            window.location = 'stock.php';
            </script>";
        }
    }
include("footer.html");
?>
