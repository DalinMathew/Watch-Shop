<?php
session_start();
include("connection.php");
include("cheader.html");
$watchid= $_SESSION['watchid'];
$custid= $_SESSION['custid'];
$shopid= $_SESSION['shopid'];
$ret = " SELECT * FROM watch where watchid=$watchid ";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);
    ?>
    <head>
        <style>
            .register-top-grid input[type="text"], 
.register-bottom-grid input[type="email"], 
.register-bottom-grid input[type="text"],
.register-bottom-grid input[type="password"],
.register-bottom-grid input[type="number"],
.register-bottom-grid input[type="file"],
.register-bottom-grid input[type="date"] {
    border: 1px solid #EEE;
    outline-color: #FF5B36;
    width: 96%;
    font-size: 2em;
    padding: 0.5em;
    -webkit-appearance: none;
    /* Additional styles specific to file input */
    background-color: #fff;
    color: #000;
}
</style>
</head>
    <div class="account-in">
   	  <div class="container">
         <form method="POST" action="" enctype="multipart/form-data">
		   
         <div class="register-bottom-grid">
    <h2>BOOK WATCH</h2>
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
    <div>
        <span>Date</span>
        <input type="date" name="date" required>
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
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    
    // Check if the item already exists in stock
    $checkQuery = "SELECT * FROM booking WHERE watchid=$watchid";
    $checkResult = mysqli_query($conn, $checkQuery);
    $watchid= $_SESSION['watchid'];
    $custid= $_SESSION['custid'];
    $shopid= $_SESSION['shopid'];
    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['shopid']=$shopid;
        $shopid= $_SESSION['shopid'];
        echo "<script type='text/javascript'>
            alert('This Item is Already Booked.');
            window.location = 'custbook.php';
            </script>";
    } else {
        $watchid= $_SESSION['watchid'];
        $custid= $_SESSION['custid'];
        $shopid= $_SESSION['shopid'];
        $_SESSION['shopid']=$shopid;
        $_SESSION['custid']=$custid;

        // Insert all details into the database
        $sql = "INSERT INTO `booking`(
            `watchid`,
            `shopid`,
            `custid`,
            `brand`,
            `model`,
            `price`,
            `quantity`,
            `date`,
            `status`
        )
        VALUES(
            '$watchid',
            '$shopid',
            '$custid',
            '$brand',
            '$model',
            '$price',
            '$quantity',
            '$date',
            'Pending'
        )";

        $result = mysqli_query($conn, $sql);

        if ($result === TRUE) {
            echo "<script type='text/javascript'>
                alert('Successfully Booked');
                window.location = 'custbook.php';
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
include("footer.html");
?>