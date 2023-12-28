<?php
session_start();
ob_start(); // Start output buffering
include("connection.php");
include("sheader.html");
$shopid = $_SESSION['shopid'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['edit'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $shopid = mysqli_real_escape_string($conn, $_POST['shopid']);
        // Redirect to watchedit.php with the watchid parameter
        $shopid = $_SESSION['shopid'];
        $_SESSION['shopid']=$shopid;
        header("location: shopprofileedit.php");
        exit(); // Make sure to exit after a header redirect
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Watches List</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/megamenu.js"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="js/jquery.easydropdown.js"></script>

    <link href="css/watch.css" rel="stylesheet" type="text/css" />
    <style>
    .edit-text {
        position: absolute;
        top: 0;
        right:150px;
        margin-top: 4px; /* Adjust the margin as needed */
        text-transform: uppercase;
        font-weight: bold; /* Optionally make the text bold */
        color: #000; /* Adjust the color as needed */
    }
    </style>
</head>
<body>

<div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Profile</h3>
            <table class="table">
                
                <?php
                $shopid = $_SESSION['shopid'];
                $sql = "SELECT * FROM shop where shopid=$shopid";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Error: " . $conn->error); // Display the error message
                }
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $owner = $row['name'];
                        $shop = $row['shop_name'];
                        $location = $row['location'];
                        $contact = $row['contact'];
                        $reg = $row['shop_regno'];
                        $gst = $row['gst'];
                        $email = $row['email'];
                        $offer = $row['offer'];
                        echo "<tr><th>Owner Name</th><td>$owner</td></tr>";
                        echo "<tr><th>Shop Name</th><td>$shop</td></tr>";
                        echo "<tr><th>Location</th><td>$location</td></tr>";
                        echo "<tr><th>Contact</th><td>$contact</td></tr>";
                        echo "<tr><th>Shope Reg No</th><td>$reg</td></tr>";
                        echo "<tr><th>GST No</th><td>$gst</td></tr>";
                        echo "<tr><th>Email</th><td>$email</td></tr>";
                        echo "<tr><th>Offer</th><td>$offer</td></tr>";
                        echo "<tr><th></th>";
        echo "<td><form method='POST' action=''>";
        $shopid = $_SESSION['shopid'];
        echo "<input type='hidden' name='watchid' value='$shopid'>";
        echo "<button class='edt-btn' type='submit' name='edit' data-watchid='$shopid'>Edit</button>";
        echo "</form>";
        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>No Watches found.</td></tr>";
                }
                ?>
                </form>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
            </div>

<?php
include("footer.html");
?>