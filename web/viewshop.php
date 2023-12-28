<?php
session_start();
ob_start(); // Start output buffering
include("connection.php");
include("cheader.html");
?>
<head>
<style>
    #locationSelect {
        width: 150px;
        height: 32px;
        padding: 8px;
        font-size: 14px;
        border-radius: 6px;
        opacity: 0.7;
    }

    .showbtn {
    height: 31px;
    padding: 7px;
    font-size: 14px;
    border-radius: 4px;
    background-color: #009900;
    border: none;
    color: white;
    position: relative;
    top: -2px; /* Adjust this value to move the button up */
    opacity: 0.7;
}
.book-button {
    height: 30px;
    padding: 7px;
    font-size: 14px;
    border-radius: 4px;
    background-color: #2E6E9E;
    border: none;
    color: white;
    position: relative;
    top: -2px; /* Adjust this value to move the button up */
}

    .specify-location {
        font-size: 18px;
        margin-left: 470px;
        margin-top: -10px; /* Adjust this value to move the button up */
    }
</style>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['location']) && !empty($_POST['location'])) {
        $selectedLocation = $_POST['location'];
        $sql = "SELECT * FROM shop WHERE location = '$selectedLocation'";
    } else {
        // If no specific location is selected, retrieve all shops
        $sql = "SELECT * FROM shop";
    }
} else {
    // Default query when the page is loaded initially
    $sql = "SELECT * FROM shop";
}
$result = $conn->query($sql);
$brand = "";
$custid= $_SESSION['custid'];
if (!isset($_SESSION['watchid'])) {
    ?>
    <div class="account-in">
        <div class="container">
            <div class="caccount-top">
                <form method="POST" action="">
                <h3>Shops List
                        <span class="specify-location">Specify Location</span>
                        <!-- Dropdown Select -->
                        <select name="location" id="locationSelect">
                            <option value="" selected disabled>Select</option>
                            <?php
                            // Fetch places from the shop table
                            $locationQuery = "SELECT DISTINCT location FROM shop";
                            $locationResult = mysqli_query($conn, $locationQuery);

                            if ($locationResult) {
                                while ($locationData = mysqli_fetch_assoc($locationResult)) {
                                    $location = $locationData['location'];
                                    echo "<option value='$location'>$location</option>";
                                }
                            }
                            ?>
                        </select>
                        <button type="submit" class="showbtn">Show</button>
                    </h3>
                </form>
                <table class="table">
                    <tr>
                        <th>Owner Name</th>
                        <th>Shop Name</th>
                        <th>Location</th>
                        <th>*Contact</th>
                        <th>GST No</th>
                        <th>*Email</th>
                        <th></th>
                    </tr>
                    <?php
                   if($result){
                   while ($data = mysqli_fetch_assoc($result)) {
                    // print_r($data); // You can uncomment this line for debugging purposes
                    $name = $data['name'];
                    $sname = $data['shop_name'];
                    $location = $data['location'];
                    $contact = $data['contact'];
                    $reg = $data['shop_regno'];
                    $gst = $data['gst'];
                    $email = $data['email'];
                    $offer = $data['offer'];
                
                    echo "<tr><td>" . $name . "</td><td>" . $sname . "</td><td>" . $location . "</td><td><a href='tel:" . $contact . "'>" . $contact . "</a></td><td>" . $gst . "</td><td><a href='mailto:" . $email . "'>" . $email . "</a></td><td>";
                    echo "<td>" . $offer . "</td></tr>";
                }
            }
                    ?>
                </table>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <?php
    exit();
}
$watchid= $_SESSION['watchid'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['book'])) {
    // Use mysqli_real_escape_string to prevent SQL injection
    $shopid = mysqli_real_escape_string($conn, $_POST['shopid']);
    // Set the shopid in the session
    $_SESSION['shopid'] = $shopid;
    // Redirect to addbook.php
    header("location: addbook.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>

<head>
<title>Watches View Shops Customer</title>
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
<style>
    #locationSelect {
        width: 150px;
        height: 32px;
        padding: 8px;
        font-size: 14px;
        border-radius: 6px;
        opacity: 0.7;
    }

    .showbtn {
    height: 31px;
    padding: 7px;
    font-size: 14px;
    border-radius: 4px;
    background-color: #009900;
    border: none;
    color: white;
    position: relative;
    top: -2px; /* Adjust this value to move the button up */
    opacity: 0.7;
}
.book-button {
    height: 30px;
    padding: 7px;
    font-size: 14px;
    border-radius: 4px;
    background-color: #2E6E9E;
    border: none;
    color: white;
    position: relative;
    top: -2px; /* Adjust this value to move the button up */
}

    .specify-location {
        font-size: 18px;
        margin-left: 470px;
        margin-top: -10px; /* Adjust this value to move the button up */
    }
</style>
</head>

<body>

    <div class="account-in">
        <div class="container">
            <div class="caccount-top">
                <form method="POST" action="">
                <h3>Shops List
                        <span class="specify-location">Specify Location</span>
                        <!-- Dropdown Select -->
                        <select name="location" id="locationSelect">
                            <option value="" selected disabled>Select</option>
                            <?php
                            // Fetch places from the shop table
                            $locationQuery = "SELECT DISTINCT location FROM shop";
                            $locationResult = mysqli_query($conn, $locationQuery);

                            if ($locationResult) {
                                while ($locationData = mysqli_fetch_assoc($locationResult)) {
                                    $location = $locationData['location'];
                                    echo "<option value='$location'>$location</option>";
                                }
                            }
                            ?>
                        </select>
                        <button type="submit" class="showbtn">Show</button>
                    </h3>
                </form>
                <table class="table">
                    <tr>
                        <th>Owner Name</th>
                        <th>Shop Name</th>
                        <th>Location</th>
                        <th>*Contact</th>
                        <th>GST No</th>
                        <th>*Email</th>
                        <th>Book</th>
                        <th></th>
                    </tr>
                    <?php
                   if($result){
                   while ($data = mysqli_fetch_assoc($result)) {
                    // print_r($data); // You can uncomment this line for debugging purposes
                    $name = $data['name'];
                    $sname = $data['shop_name'];
                    $location = $data['location'];
                    $contact = $data['contact'];
                    $reg = $data['shop_regno'];
                    $gst = $data['gst'];
                    $email = $data['email'];
                    $offer = $data['offer'];
                
                    echo "<tr><td>" . $name . "</td><td>" . $sname . "</td><td>" . $location . "</td><td><a href='tel:" . $contact . "'>" . $contact . "</a></td><td>" . $gst . "</td><td><a href='mailto:" . $email . "'>" . $email . "</a></td><td>";
                    echo "<form method='POST' action=''>";
                    echo "<input type='hidden' name='shopid' value='" . $data['shopid'] . "'>";
                    echo "<button class='book-button' name='book'>Book</button></td>";
                    echo "</form>";
                    echo "<td>" . $offer . "</td></tr>";
                }
            }
                    ?>
                </table>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>
</body>
</html>
