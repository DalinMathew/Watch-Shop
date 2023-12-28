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
    $_SESSION['watchid']=$watchid;
    $shopid= $_SESSION['shopid'];
    
$ret = " SELECT * FROM watch where watchid=$watchid ";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);
    ?>
    <div class="account-in">
   	  <div class="container">
         <form method="POST" action="" enctype="multipart/form-data">
		   
         <div class="register-bottom-grid">
    <h2>ADD TO STOCK</h2>
    <div>
        <span>Brand</span>
        <select name='brand' disabled>
            <option value="" disabled>Select Brand</option>
            <option <?php if ($data['brand'] == 'Boat') echo 'selected'; ?>>Boat</option>
            <option <?php if ($data['brand'] == 'Titan') echo 'selected'; ?>>Titan</option>
            <option <?php if ($data['brand'] == 'Fastrack') echo 'selected'; ?>>Fastrack</option>
        </select>
        <input type="hidden" name="brand" value="<?php echo $data['brand']; ?>">
    </div>
    <div>
        <span>Model</span>
        <input type="text" name="model" value="<?php echo $data['model']; ?>" disabled>
        <input type="hidden" name="model" value="<?php echo $data['model']; ?>">
    </div>
    <div>
        <span>Price</span>
        <input type="number" name="price" pattern="[0-9]" value="<?php echo $data['price']; ?>" disabled>
        <input type="hidden" name="price" value="<?php echo $data['price']; ?>">
    </div>
    <div>
        <span>Quantity</span>
        <input type="number" name="quantity" required>
    </div>
    <div class="clearfix"> </div>
    <div class="clearfix"> </div>
    <div class="clearfix"> </div>
</div>
<div class="clearfix"></div>
<div class="register-but">
    <input type="submit" value="Submit" name="submit">
    <div class="clearfix"></div>
    </form>

</div>
		
	   </div>
   </div>
   
   <?php

// Fetch data from the database
$ret = "SELECT * FROM watch WHERE watchid=$watchid";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
   
    // Check if the item already exists in stock
    $checkQuery = "SELECT * FROM stock WHERE watchid=$watchid";
    $checkResult = mysqli_query($conn, $checkQuery);
     
    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['shopid']=$shopid;
        $shopid= $_SESSION['shopid'];
        echo "<script type='text/javascript'>
            alert('This Item is Already in Stock.');
            window.location = 'custbook.php';
            </script>";
    } else {
        $_SESSION['shopid']=$shopid;
        $shopid= $_SESSION['shopid'];
        // Insert all details into the database
        $sql = "INSERT INTO `stock`(
            `watchid`,
            `shopid`,
            `brand`,
            `model`,
            `price`,
            `quantity`
        )
        VALUES(
            '$watchid',
            '$shopid',
            '$brand',
            '$model',
            '$price',
            '$quantity'
        )";

        $result = mysqli_query($conn, $sql);

        if ($result === TRUE) {
            echo "<script type='text/javascript'>
                alert('Successfully Inserted');
                window.location = 'custbook.php';
                </script>";
              
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

include("footer.html");
?>