<?php
session_start();
include("connection.php");
include('cheader.html');
?>
<head>
<style>
.dlt-btn{
background-color: #FF0000; /* Green */
    border: none;
    color: white;
    padding: 0px 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    border-radius: 4px;
    margin: 4px 2px;
    cursor: pointer;
}
    </style>
    </head>
    <?php
if (!isset($_SESSION['shopid'])) {
    ?>
    <div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Bookings</h3>
            <table class="table">
                <tr>
                    <th>Booking ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Shop</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                <?php
                $custid= $_SESSION['custid'];
                $_SESSION['custid']=$custid;
                $sql = "SELECT * FROM booking where custid='$custid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $status = $row['status'];
                    }
                }
                $sql = "SELECT * FROM booking where status='Pending' OR status='Approved'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $bookingid = $row['bookingid'];
                        $brand = $row['brand'];
                        $model = $row['model'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $date = $row['date'];
                        $status = $row['status'];
                        $shopid = $row['shopid'];
                        $sql = "SELECT shop_name FROM shop where shopid='$shopid'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        $shop = $row['shop_name'];
                            }
                        }
                        
                        echo "<tr>";
                        echo "<td>$bookingid</td>";
                        echo "<td>$brand</td>";
                        echo "<td>$model</td>";
                        echo "<td>$price</td>";
                        echo "<td>$quantity</td>";
                        echo "<td>$shop</td>";
                        echo "<td>$date</td>";
                        echo "<td>$status</td>";
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='bookingid' value='$bookingid'>";
        echo "<button class='dlt-btn' type='submit' name='delete' data-bookingid='$bookingid'>Delete</button>";
        echo "</form>";
        echo "</td></tr>";

       
                        
                    }
                } else {
                    echo "<tr><td colspan='16'>No Bookings found.</td></tr>";
                }
                ?>
                </form>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
            </div>
<?php
    exit();
}
$shopid = $_SESSION['shopid'];
$custid = $_SESSION['custid'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Form submitted, process the data
    if (isset($_POST['delete'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $bookingid = mysqli_real_escape_string($conn, $_POST['bookingid']);

        // Delete from shop table
        $delete_query = "DELETE FROM booking WHERE bookingid='$bookingid'";
        mysqli_query($conn, $delete_query);
    }
    /*if (isset($_POST['edit'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $bookingid = mysqli_real_escape_string($conn, $_POST['bookingid']);
        $_SESSION['bookingid']=$bookingid;
        $custid= $_SESSION['custid'];
        $_SESSION['custid']=$custid;
        $shopid= $_SESSION['shopid'];
        $_SESSION['shopid']=$shopid;
        header("location: bookedit.php");
        exit(); // Make sure to exit after a header redirect
    }*/
}
ob_end_flush(); // Flush the output buffer and send content to the browser
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
    .dlt-btn{
    background-color: #FF0000; /* Green */
        border: none;
        color: white;
        padding: 0px 6px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        border-radius: 4px;
        margin: 4px 2px;
        cursor: pointer;
}
        </style>
</head>
<body>

<div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Bookings</h3>
            <table class="table">
                <tr>
                    <th>Booking ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Shop</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                <?php
                $custid= $_SESSION['custid'];
                $_SESSION['custid']=$custid;
                $shopid= $_SESSION['shopid'];
                $_SESSION['shopid']=$shopid;
                $sql = "SELECT status FROM booking where custid='$custid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $status = $row['status'];
                    }
                }
                $sql = "SELECT status FROM booking WHERE custid='$custid'";
$resultStatus = $conn->query($sql);

if ($resultStatus->num_rows > 0) {
    while ($rowStatus = $resultStatus->fetch_assoc()) {
        $status = $rowStatus['status'];
    }
}

$sql = "SELECT * FROM booking WHERE status='Pending' OR status='Approved'";
$resultBookings = $conn->query($sql);

if ($resultBookings->num_rows > 0) {
    while ($rowBooking = $resultBookings->fetch_assoc()) {
        $bookingid = $rowBooking['bookingid'];
        $brand = $rowBooking['brand'];
        $model = $rowBooking['model'];
        $price = $rowBooking['price'];
        $quantity = $rowBooking['quantity'];
        $date = $rowBooking['date'];
        $status = $rowBooking['status'];
        $shopid = $rowBooking['shopid'];

        $sqlShop = "SELECT shop_name FROM shop WHERE shopid='$shopid'";
        $resultShop = $conn->query($sqlShop);

        if ($resultShop->num_rows > 0) {
            while ($rowShop = $resultShop->fetch_assoc()) {
                $shop = $rowShop['shop_name'];
            }
        }

        echo "<tr>";
        echo "<td>$bookingid</td>";
        echo "<td>$brand</td>";
        echo "<td>$model</td>";
        echo "<td>$price</td>";
        echo "<td>$quantity</td>";
        echo "<td>$shop</td>";
        echo "<td>$date</td>";
        echo "<td>$status</td>";
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='bookingid' value='$bookingid'>";
        echo "<button class='dlt-btn' type='submit' name='delete' data-bookingid='$bookingid'>Delete</button>";
        echo "</form>";
        echo "</td></tr>";
    }
} else {
    echo "<tr><td colspan='16'>No Bookings found.</td></tr>";
}
                ?>
                </form>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
            </div>

<?php
include('footer.html');
?>
