<?php
session_start();
ob_start(); // Start output buffering
include("connection.php");
include("sheader.html");
$shopid = $_SESSION['shopid'];
$ret = " SELECT * FROM shop where shopid=$shopid ";
$re = mysqli_query($conn, $ret);

$data = mysqli_fetch_assoc($re);
    ?>
    <div class="account-in">
   	  <div class="container">
         <form method="POST" action="" enctype="multipart/form-data">
		     <div class="register-bottom-grid">
				    <h2>EDIT PROFILE</h2>
					 
					 <div>
				<span>Owner Name</span>
				<input type="text" name="name" value="<?php echo $data['name']; ?>"  required> 
			 </div>
             <div>
				<span>Shop Name</span>
				<input type="text" name="shop" value="<?php echo $data['shop_name']; ?>"  required> 
			 </div>
             <div>
				<span>Location</span>
				<input type="text" name="location" value="<?php echo $data['location']; ?>"  required> 
			 </div>
             <div>
						<span>Contact</span>
						<input type="number" name="contact" pattern="[0-9]" value="<?php echo $data['contact']; ?>" required>
					 </div>
             
             <div>
				<span>Shop Reg No</span>
				<input type="text" name="reg" value="<?php echo $data['shop_regno']; ?>" required> 
			 </div>
             <div>
				<span>GST</span>
				<input type="text" name="gst" value="<?php echo $data['gst']; ?>" required> 
			 </div>
             <div>
				<span>Email</span>
				<input type="text" name="email" value="<?php echo $data['email']; ?>" disabled> 
			 </div>
             <div>
				<span>Offer</span>
				<input type="text" name="offer" value="<?php echo $data['offer']; ?>" > 
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


$shopid = $_SESSION['shopid'];

// Fetch data from the database
$ret = "SELECT * FROM shop WHERE shopid=$shopid";
$re = mysqli_query($conn, $ret);
$data = mysqli_fetch_assoc($re);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $owner = mysqli_real_escape_string($conn, $_POST['name']);
    $shop = mysqli_real_escape_string($conn, $_POST['shop']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $reg = mysqli_real_escape_string($conn, $_POST['reg']);
    $gst = mysqli_real_escape_string($conn, $_POST['gst']);
    $offer = mysqli_real_escape_string($conn, $_POST['offer']);
    // Insert all details into the database
    $shopid = $_SESSION['shopid'];

    $sql = "UPDATE `shop` SET
            `name` = '$owner',
            `shop_name` = '$shop',
            `location` = '$location',
            `contact` = '$contact',
            `shop_regno` = '$reg',
            `gst` = '$gst',
            `offer` = '$offer'
            WHERE shopid = '$shopid'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    if ($result === TRUE) {
            echo "<script type = 'text/javascript'>
            alert('Successfully Updated');
            window.location = 'shopprofile.php';
            </script>";
        }
    }
include("footer.html");
?>