<?php
ob_start(); // Start output buffering
include("connection.php");
include("aheader.html");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form submitted, process the data
    if (isset($_POST['delete'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_POST['watchid']);

        // Delete from shop table
        $watch_delete_query = "DELETE FROM watch WHERE watchid='$id'";
        mysqli_query($conn, $watch_delete_query);
    }
    if (isset($_POST['edit'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $_POST['watchid']);
        // Redirect to watchedit.php with the watchid parameter
        header("location: watchedit.php?watchid=$id");
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
            <h3>Watches List</h3>
            <div class="add-text"><a href="addwatch.php">ADD watch</a></div>
            <?php
$sql = "SELECT count(*) as count FROM suggest";
$res = mysqli_query($conn, $sql);

if ($res) {
    $row = mysqli_fetch_assoc($res);
    $count = $row['count'];

    if ($count > 0) {
        echo "<div class='edit-text'><a href='viewsuggest.php'>Edits😀</a></div>";
    } else {
        echo "<div class='edit-text'><a href='viewsuggest.php'>Edits</a></div>";
    }
} else {
    // Handle the case where the query fails
    echo "Error executing query: " . mysqli_error($conn);
}
?>

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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $sql = "SELECT * FROM watch";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['watchid'];
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
                        echo "<td><button class='view-image-btn' data-image='$image' data-watchid='$id'>View</button></td>";
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
        echo "<input type='hidden' name='watchid' value='$id'>";
        echo "<button class='edt-btn' type='submit' name='edit' data-watchid='$id'>Edit</button>";
        echo "</form>";
        echo "</td>";

        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='watchid' value='$id'>";
        echo "<button class='dlt-btn' type='submit' name='delete' data-watchid='$id'>Delete</button>";
        echo "</form>";
        echo "</td></tr>";

        echo "<div class='image-modal' id='image-modal-$id'>";
        echo "<div class='modal-content'>";
        echo "<span class='close' data-watchid='$id'>&times;</span>";
        echo "<img id='modal-image-$id' src='' alt='Watch Image'>";
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
