<?php
    session_start();
	include("connection.php");
    include("sheader.html");
    
    $bookingid= $_SESSION['bookingid'];
    $shopid= $_SESSION['shopid'];
    $custid= $_SESSION['custid'];
$ret = " SELECT * FROM booking where bookingid=$bookingid ";
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
			<h2>EDIT Booking</h2>
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
                     <div>
                        <?php
                        $custid= $_SESSION['custid'];
                        $ret = " SELECT name FROM customer where custid=$custid ";
                        $re = mysqli_query($conn, $ret);
                        $data = mysqli_fetch_assoc($re);
                        ?>
						<span>Name</span>
						<input type="text" name="price" pattern="[0-9]" value="<?php echo $data['name']; ?>" disabled>
					 </div>
                     <?php
                     $ret = " SELECT * FROM booking where bookingid=$bookingid ";
                     $re = mysqli_query($conn, $ret);
                     $data = mysqli_fetch_assoc($re);
                         ?>
                     
             <div>
				<span>Date</span>
				<input type="date" name="date" value="<?php echo $data['date']; ?>" required > 
					 <div class="clearfix"> </div>
			 </div>
             <div>
    <span>Status</span>
    <select name="status" required>
        <option value="Pending" <?php echo ($data['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
        <option value="Approved" <?php echo ($data['status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>
        <option value="Done" <?php echo ($data['status'] == 'Done') ? 'selected' : ''; ?>>Done</option>
    </select>
</div>

					 <div class="clearfix"> </div>
					 <div class="clearfix"> </div>
                     </div>
					 <div class="clearfix"> </div>

        <div class="clearfix"> </div>
		<div class="register-but">

			   <input type="submit" value="Submit" name="submit">
			   <div class="clearfix"> </div>
		   </form>
		</div>
	   </div>
   </div>
   
   <?php
$bookingid= $_SESSION['bookingid'];

// Fetch data from the database
$ret = "SELECT * FROM booking WHERE bookingid=$bookingid";
$re = mysqli_query($conn, $ret);
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $bookingid= $_SESSION['bookingid'];
    // Insert all details into the database
    $sql = "UPDATE `booking`
            SET
            `date` = '$date',
            `status` = '$status'
            WHERE bookingid = '$bookingid'";

    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
       
            echo "<script type = 'text/javascript'>
            alert('Successfully Updated');
            window.location = 'booking.php';
            </script>";
        }
    }
include("footer.html");
?>
