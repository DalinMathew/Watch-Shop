<?php
ob_start(); // Start output buffering
session_start();
include("connection.php");
include("sheader.html");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form submitted, process the data
    /*if (isset($_POST['delete'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_POST['watchid']);

        // Delete from shop table
        $watch_delete_query = "DELETE FROM watch WHERE watchid='$id'";
        mysqli_query($conn, $watch_delete_query);
    }*/
    if (isset($_POST['edit'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $watchid = mysqli_real_escape_string($conn, $_POST['watchid']);
        $_SESSION['watchid']=$watchid;
        $shopid= $_SESSION['shopid'];
        $_SESSION['shopid']=$shopid;
        header("location: stockedit.php");
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
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="js/jquery.easydropdown.js"></script>
   
    <link href="css/watch.css" rel="stylesheet" type="text/css" />
   
</head>
<body>

<div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Stock</h3>
            <table class="table">
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Edit</th>
                </tr>
                <?php
                $shopid= $_SESSION['shopid'];
                $_SESSION['shopid']=$shopid;
                $sql = "SELECT * FROM stock where shopid='$shopid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['watchid'];
                        $brand = $row['brand'];
                        $model = $row['model'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        
                        echo "<tr>";
                        echo "<td>$brand</td>";
                        echo "<td>$model</td>";
                        echo "<td>$price</td>";
                        echo "<td>$quantity</td>";
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='watchid' value='$id'>";
        echo "<button class='edt-btn' type='submit' name='edit' data-watchid='$id'>Edit</button>";
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

include("footer.html")
   ?>

</body>
</html>
