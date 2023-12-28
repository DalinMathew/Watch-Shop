<?php
session_start();
include("cheader.html");
include("connection.php");
    $watchid= $_SESSION['watchid'];
    $_SESSION['watchid']=$watchid;
    $sql = "SELECT * FROM watch WHERE watchid=$watchid";
    $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
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
                    }
                }

?>
   <div class="men">
   	<div class="container">
      <div class="col-md-9 single_top">
      	<div class="single_left">
      	  <div class="labout span_1_of_a1">
			<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="<?php echo $image;?>">
							<img src="<?php echo $image;?>" />
						</li>
						
					 </ul>
				  </div>
		          <div class="clearfix"></div>	
	    </div>
		<div class="cont1 span_2_of_a1 simpleCart_shelfItem">
				<h1><?php echo $brand," ",$model; ?></h1>
				<p class="quick">Type: <span><?php echo $type," Watch";?></span></p>
			    <div class="price_single">
                <span >Price: <?php echo $price,"/-"; ?></span>
				  <span class="amount item_price actual">*may change according to shopes</span><br><br>
				<p class="quick"> <?php echo $extra;?></p>
				</div>
			    <h2 class="quick">Colour: <?php echo $colour;?></h2><br>
                <h2 class="quick">Watch Shape: <?php echo $shape;?></h2><br>
                <h2 class="quick">Gender: <?php echo $gender;?></h2><br>
                <h2 class="quick">Strap Type:  <?php echo $strap;?></h2><br>
                <h2 class="quick">Screen Type: <?php echo $screen;?></h2><br>
                <h2 class="quick">Warrenty Info: <?php echo $warrenty;?></h2><br>
                <h2 class="quick">Water Resistant: <?php echo $water;?></h2><br>
                <h2 class="quick">Call Function: <?php echo $call;?></h2><br>
                
			    <a href="viewshop.php" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1">Buy Options</a>
			</div>
		    <div class="clearfix"> </div>
		</div>
        	
		</div>
	      
	      
     <div class="clearfix"> </div>
	</div>
   </div>
  
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
</body>
</html>		
        <?php
        include("footer.html");
        ?>