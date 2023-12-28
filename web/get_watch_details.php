<?php
include("connection.php");

// Get the watch ID from the AJAX request
$watchId = $_GET['watch_id'];

// Fetch additional details from the database
$sql = "SELECT * FROM watch WHERE watch_id = $watchId";
$res = mysqli_query($conn, $sql);

if ($res) {
    $details = mysqli_fetch_assoc($res);
    echo json_encode($details);
} else {
    echo json_encode(['error' => 'Unable to fetch details', 'sql_error' => mysqli_error($conn)]);
}
?>
