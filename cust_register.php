<!DOCTYPE HTML>
<html>
<head>
<title>Watches Customer Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/shopassword.js"></script>
</head>
<body>
    <?php
        include("connection.php");
        include("header.html");
    ?>
   
    <div class="account-in">
        <div class="container">
            <form method="POST" action=""> 
                <div class="register-top-grid">
                    <h2>CUSTOMER REGISTRATION</h2>
                    <div>
                        <span>Name</span>
                        <input type="text" name="cname" pattern="[A-Za-z]+" required> 
                    </div>
                    <div>
                        <span>Place</span>
                        <input type="text" name="place" required> 
                    </div>
                    <div>
                        <span>Phone Number</span>
                        <input type="text" name="phone" pattern="[0-9]{10}" maxlength="12" required> 
                    </div>
                    <div class="clearfix"> </div>
                        <a class="news-letter" href="#"></a>
                </div>
                <div class="register-bottom-grid">
                    <h2>LOGIN INFORMATION</h2>
                    <div>
                        <span>Email</span>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <span>Password</span>
                        <input type="password" name="password" id="password" required>
                        <br><input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <div class="register-but">
                    <input type="submit" value="Submit" name="submit">
                    <div class="clearfix"> </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['cname'];
            $place = $_POST['place'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "insert into customer(name, place, phone, email) values('$name', '$place', '$phone', '$email')";
            mysqli_query($conn, $sql);
            
            $sql = "insert into login(email, password, type) values('$email', '$password', 'customer')";
            mysqli_query($conn, $sql);

            // Display the success modal
			echo "<script>alert(\"Registration Successfull\");</script>";

        }

        include("footer.html");
    ?>
</body>
</html>