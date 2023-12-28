<?php
ob_start(); // Start output buffering

include("connection.php");
include("aheader.html");

if (isset($_POST['delete'])) {
    // Use mysqli_real_escape_string to prevent SQL injection
    $suggestid = mysqli_real_escape_string($conn, $_POST['suggest']);

    // Retrieve the IDs associated with the email from both tables
    $query = "SELECT suggestid FROM suggest WHERE suggestid='$suggestid'";

    $result = mysqli_query($conn, $query);

    // Delete from login_table
    while ($data = mysqli_fetch_assoc($result)) {
        $suggestid = $data['suggestid'];
        $delete_query = "DELETE FROM suggest where suggestid='$suggestid'";
        mysqli_query($conn, $delete_query);
    }
    header("location: watch.php");
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
   	   <h3>Suggestions List</h3>
		  
          <table class="table">
    <tr>
        <th>Watch ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Suggestion</th>
        <th>Delete</th>
    </tr>
    <?php
    $sql = "select * from suggest";
    $re = mysqli_query($conn, $sql);
    if ($re) {
        while ($data = mysqli_fetch_assoc($re)) {
            $suggestid = $data['suggestid'];
            $watchid = $data['watchid'];
            $brand = $data['brand'];
            $model = $data['model'];
            $suggest = $data['suggest'];
            echo "<tr><td>" . $watchid . "</td><td>" . $brand . "</td><td>". $model . "</td><td>" . $suggest . "</td><td>";
            ?>
            <form method="POST" action="">
    <input type='hidden' name='suggest' value='<?php echo $suggestid; ?>'>
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