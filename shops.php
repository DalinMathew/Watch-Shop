<?php
ob_start(); // Start output buffering

	include("connection.php");
    include("aheader.html");
    
if (isset($_POST['delete'])) {
    // Use mysqli_real_escape_string to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Retrieve the IDs associated with the email from both tables
    $login_query = "SELECT id FROM login WHERE email='$email'";
    $shop_query = "SELECT shopid FROM shop WHERE email='$email'";

    $login_result = mysqli_query($conn, $login_query);
    $shop_result = mysqli_query($conn, $shop_query);

    // Delete from login_table
    while ($login_data = mysqli_fetch_assoc($login_result)) {
        $login_id = $login_data['id'];
        $login_delete_query = "DELETE FROM login where id='$login_id'";
        mysqli_query($conn, $login_delete_query);
    }

    // Delete from shop table
    while ($shop_data = mysqli_fetch_assoc($shop_result)) {
        $shop_id = $shop_data['shopid'];
        $shop_delete_query = "DELETE FROM shop WHERE shopid='$shop_id'";
        mysqli_query($conn, $shop_delete_query);
    }

    header("location: shops.php");
}
ob_end_flush(); // Flush the output buffer and send content to the browser

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Watches Shops</title>
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
   	   <h3>Shops List</h3>
		  
          <table class="table">
    <tr>
        <th>Owner Name</th>
        <th>Shop Name</th>
        <th>Location</th>
        <th>Contact</th>
        <th>Shop Regno</th>
        <th>GST No</th>
        <th>Email</th>
        <th>Delete</th>
    </tr>
    <?php
    $sql = "select * from shop";
    $re = mysqli_query($conn, $sql);
    if ($re) {
        while ($data = mysqli_fetch_assoc($re)) {
            $id = $data['shopid'];
            $name = $data['name'];
            $sname = $data['shop_name'];
            $location = $data['location'];
            $contact = $data['contact'];
            $reg = $data['shop_regno'];
            $gst = $data['gst'];
            $email = $data['email'];
            echo "<tr><td>" . $name . "</td><td>" . $sname . "</td><td>" . $location . "</td><td><a href='tel:" . $contact . "'>" . $contact . "</a></td><td>" . $reg . "</td><td>" . $gst . "</td><td><a href='mailto:" . $email . "'>" . $email . "</a></td><td>";
            ?>
            <form method="POST" action="">
    <input type='hidden' name='email' value='<?php echo $email; ?>'>
    <input style="background-color: #FF0000; 
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
</form>
            </td></tr>
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