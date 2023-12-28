<?php
ob_start();
session_start();
include("connection.php");
include("sheader.html");
    $shopid= $_SESSION['shopid'];
// Assume you're getting shopid from the URL parameter
$shopid = isset($_REQUEST['shopid']) ? mysqli_real_escape_string($conn, $_REQUEST['shopid']) : '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form submitted, process the data
    if (isset($_POST['add'])) {
        $watchid = mysqli_real_escape_string($conn, $_POST['watchid']);
        $_SESSION['watchid']=$watchid;
        $shopid= $_SESSION['shopid'];
        $_SESSION['shopid']=$shopid;
        // Redirect to shopwatch.php with the watchid and shopid parameters
        header("location: addstock.php");
        exit();
    }
    if (isset($_POST['suggest'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $watchid = mysqli_real_escape_string($conn, $_POST['watchid']);
        // Redirect to suggest.php with the watchid and shopid parameters
        header("location: suggest.php?watchid=$watchid");
        exit();
    }
}
ob_end_flush();
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
    <script>
    // Using jQuery for simplicity, make sure to include jQuery library
    $(document).ready(function() {
    $('.view-image-btn, .edt-btn, .dlt-btn').on('click', function() {
        var watchId = $(this).data('watchid');
        var image = $(this).data('image');

        if (watchId) {
            $('#modal-image-' + watchId).attr('src', image);
            $('#image-modal-' + watchId).fadeIn();
        }
    });

    $('.close').on('click', function() {
        var watchId = $(this).data('watchid');
        if (watchId) {
            $('#image-modal-' + watchId).fadeOut();
        }
    });
});

    </script>
    <link href="css/watch.css" rel="stylesheet" type="text/css" />
    
</head>
<body>

<div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Watches List</h3>
            <div class="add-text"><?php echo "<a href='shopaddwatch.php?shopid=$shopid'>ADD watch</a>" ?></div>
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Colour</th>
                    <th>Type</th>
                    <th>Shape</th>
                    <th>Gender</th>
                    <th>Strap</th>
                    <th>Screen</th>
                    <th>Warrenty</th>
                    <th>Waterproof</th>
                    <th>Call</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Extra</th>
                    <th>Suggest</th>
                    <th>Stock</th>

                </tr>
                <?php
                $sql = "SELECT * FROM watch";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $watchid = $row['watchid'];
                        $brand = $row['brand'];
                        $colour = $row['colour'];
                        $type = $row['type'];
                        $shape = $row['shape'];
                        $gender = $row['gender'];
                        $strap = $row['strap'];
                        $screen = $row['screen'];
                        $warrenty = $row['warrenty'];
                        $water = $row['water'];
                        $call = $row['call_val'];
                        $model = $row['model'];
                        $price = $row['price'];
                        $image = $row['image'];
                        $extra = $row['extra'];

                        echo "<tr>";
                        echo "<td><button class='view-image-btn' data-image='$image' data-watchid='$watchid'>View</button></td>";
                        echo "<td>$brand</td>";
                        echo "<td>$colour</td>";
                        echo "<td>$type</td>";
                        echo "<td>$shape</td>";
                        echo "<td>$gender</td>";
                        echo "<td>$strap</td>";
                        echo "<td>$screen</td>";
                        echo "<td>$warrenty</td>";
                        echo "<td>$water</td>";
                        echo "<td>$call</td>";
                        echo "<td>$model</td>";
                        echo "<td>$price</td>";
                        echo "<td>$extra</td>";
                        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='watchid' value='$watchid'>";
        echo "<button class='dlt-btn' type='submit' name='suggest' data-watchid='$watchid'>Report</button>";
        echo "</form>";
        echo "</td>";

echo "<td>";
echo "<form method='POST' action=''>";  // Assuming the next page is shopwatch.php
echo "<input type='hidden' name='watchid' value='$watchid'>";
echo "<button class='edt-btn' type='submit' name='add' data-watchid='$watchid'>Add</button>";
echo "</form>";
echo "</td></tr>";


        echo "<div class='image-modal' id='image-modal-$watchid'>";
        echo "<div class='modal-content'>";
        echo "<span class='close' data-watchid='$watchid'>&times;</span>";
        echo "<img id='modal-image-$watchid' src='' alt='Watch Image'>";
        echo "</div>";
        echo "</div>";
                        
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
