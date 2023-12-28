<?php
include("connection.php");
include('sheader.html');
session_start();
$shopid = $_SESSION['shopid'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form submitted, process the data
    if (isset($_POST['approve'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $bookingid = mysqli_real_escape_string($conn, $_POST['bookingid']);
        $_SESSION['bookingid'] = $bookingid;
        $shopid = $_SESSION['shopid'];
        $_SESSION['shopid'] = $shopid;
        $custid = $_SESSION['custid'];
        $_SESSION['custid'] = $custid;
        header("location: bookedit.php");
        exit(); // Make sure to exit after a header redirect
    }
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
    <script>
        $(document).ready(function () {
            $(".megamenu").megamenu();
        });
    </script>
    <script src="js/jquery.easydropdown.js"></script>

    <link href="css/watch.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="account-in">
        <div class="container">
            <div class="caccount-top">
                <h3>Bookings</h3>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    $sql = "SELECT bookingid, brand, model, price, quantity, date, status, custid FROM booking WHERE status='Pending' OR status='Approved'";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $bookingid = $row['bookingid'];
                        $brand = $row['brand'];
                        $model = $row['model'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $date = $row['date'];
                        $status = $row['status'];
                        $custid = $row['custid'];

                        $sqlCustomer = "SELECT name, phone FROM customer WHERE custid='$custid'";
                        $resultCustomer = $conn->query($sqlCustomer);

                        while ($rowCustomer = $resultCustomer->fetch_assoc()) {
                            $name = $rowCustomer['name'];
                            $phone = $rowCustomer['phone'];

                            echo "<tr>";
                            echo "<td>$name</td>";
                            echo "<td><a href='tel:$phone'>$phone</a></td>";
                            echo "<td>$brand</td>";
                            echo "<td>$model</td>";
                            echo "<td>$price</td>";
                            echo "<td>$quantity</td>";
                            echo "<td>$date</td>";
                            echo "<td>$status</td>";
                            echo "<td>";
                            echo "<form method='POST' action=''>";
                            echo "<input type='hidden' name='bookingid' value='$bookingid'>";
                            echo "<button class='dlt-btn' type='submit' name='approve' data-bookingid='$bookingid'>Change</button>";
                            echo "</form>";
                            echo "</td></tr>";
                        }
                    }

                    if ($result->num_rows == 0) {
                        echo "<tr><td colspan='10'>No Bookings found.</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <?php
    include('footer.html');
    ?>
</body>

</html>
