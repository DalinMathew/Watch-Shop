<?php
ob_start(); // Start output buffering

include("connection.php");
include("aheader.html");

if (isset($_POST['delete'])) {
    // Use mysqli_real_escape_string to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Retrieve the IDs associated with the email from both tables
    $login_query = "SELECT id FROM login WHERE email='$email'";
    $cust_query = "SELECT custid FROM customer WHERE email='$email'";

    $login_result = mysqli_query($conn, $login_query);
    $cust_result = mysqli_query($conn, $cust_query);

    // Delete from login_table
    while ($login_data = mysqli_fetch_assoc($login_result)) {
        $login_id = $login_data['id'];
        $login_delete_query = "DELETE FROM login where id='$login_id'";
        mysqli_query($conn, $login_delete_query);
    }

    // Delete from customer table
    while ($cust_data = mysqli_fetch_assoc($cust_result)) {
        $cust_id = $cust_data['custid'];
        $cust_delete_query = "DELETE FROM customer WHERE custid='$cust_id'";
        mysqli_query($conn, $cust_delete_query);
    }
    header("location: customers.php");
}

ob_end_flush(); // Flush the output buffer and send content to the browser
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Watches Customers</title>
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
</head>
<body>
	
   <div class="account-in">
   	 <div class="container">
        <div class="caccount-top">
   	   <h3>Customers List</h3>
		  
          <table class="table">
    <tr>
        <th>Customer Name</th>
        <th>Place</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Delete</th>
    </tr>
    <?php
    $sql = "select * from customer";
    $re = mysqli_query($conn, $sql);
    if ($re) {
        while ($data = mysqli_fetch_assoc($re)) {
            $id = $data['custid'];
            $name = $data['name'];
            $place = $data['place'];
            $phone = $data['phone'];
            $email = $data['email'];
            echo "<tr><td>" . $name . "</td><td>" . $place . "</td><td><a href='tel:" . $phone . "'>" . $phone . "</a></td><td><a href='mailto:" . $email . "'>" . $email . "</a></td><td>";
            ?>
            <form method="POST" action="">
    <input type='hidden' name='email' value='<?php echo $email; ?>'>
    <input style="background-color: #FF0000; /* Green */
        border: none;
        color: white;
        padding: 0px 6px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        border-radius: 4px;
        margin: 4px 2px;
        cursor: pointer;" type='submit' value='Delete' name='delete'>
            </td></tr>
        </form>
            <?php
        }
    }
    
    ?>
</table>

    </div>
	    <div class="clearfix"> </div>
         </div>
         </div>
   <?php
   include("footer.html")
   ?>
</body>
</html>		