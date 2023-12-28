<?php
session_start();
ob_start(); // Start output buffering
include("connection.php");
include("cheader.html");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['more'])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $watchid = mysqli_real_escape_string($conn, $_POST['watchid']);
        $_SESSION['watchid']=$watchid;
        $watchid= $_SESSION['watchid'];
        // Redirect to watchedit.php with the watchid parameter
        header("location: watchmore.php");
        exit(); // Make sure to exit after a header redirect
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['book'])) {
    // Use mysqli_real_escape_string to prevent SQL injection
    $watchid = mysqli_real_escape_string($conn, $_POST['watchid']);
    $_SESSION['watchid']=$watchid;
    $watchid= $_SESSION['watchid'];
    // Redirect to watchedit.php with the watchid parameter
    header("location: viewshop.php");
    exit(); // Make sure to exit after a header redirect
}
}
ob_end_flush(); // Flush the output buffer and send content to the browser
?>
<head>

    <style>
.watch-container {
    display: flex;
    flex-wrap: wrap;
}

.watch-details {
    flex: 0 0 calc(33.33% - 20px); /* Adjust the width as needed, considering margins */
    box-sizing: border-box;
    padding: 10px;
    text-align: center;
    overflow: hidden;
    border: 2px solid #34a3bf;
    border-radius: 10px;
    margin: 10px;
    box-sizing: border-box;
    max-width: calc(33.33% - 20px); /* Set max-width to avoid exceeding one-third of the container */
}

.watch-image img {
    width: 100%; /* Set a fixed width to maintain consistency */
    height: 200px; /* Set a fixed height for consistency */
    object-fit: contain;
    border-radius: 8px; /* Match the border-radius of the parent div */
    
}
/* Add this style to your existing CSS or in a new style block */
/* Add this style to your existing CSS or in a new style block */
.more-button {
    background-color:  #009900; 
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
.option-button {
    background-color:  #6495ED; 
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
// Assuming you have the $watchData array containing watch details
// Replace this with your actual data retrieval logic
$sql = "select * from watch";
$res = mysqli_query($conn, $sql);
$watchData = array();

if ($res) {
    while ($data = mysqli_fetch_assoc($res)) {
        $watchData[] = $data;
    }
}
?>

<div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Watch</h3>
        </div>

        <div class="watch-container">
            <?php foreach ($watchData as $data) { ?>
                <div class="watch-details">
                    <div class="watch-image">
                        <img src="<?php echo $data['image']; ?>" alt="Watch Image">
                    </div>
                    <div class="watch-info">
                        <h4><?php echo "<br>".$data['brand']; ?>
                        <?php echo $data['model']; ?></h4>
                        <p><?php echo $data['extra']; ?></p>

                        <p>Price: <?php echo $data['price']; ?></p>
                    </div>
                    <div class="watch-buttons">
                    
      <form method='POST' action=''>
       <input type='hidden' name='watchid' value='<?php echo $data['watchid']; ?>'>
        <?php
                    $custid= $_SESSION['custid'];
                    $_SESSION['custid']=$custid;
       echo "<button class='more-button' type='submit' name='more' data-watchid='{$data['watchid']}'>More</button>";
                     echo "<button class='option-button' name='book' data-watchid='{$data['watchid']}'>Book This</button>";
                     ?>
            </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include("footer.html");
?>
