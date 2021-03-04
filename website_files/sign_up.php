<!--
CPS630 - Project Iteration 1
Section 2 Members:
	Justin Maliwat	500899430
	Diwei Guan		500879852
	Deep Oza		500830262
-->
<?php
session_start();

include 'scripts/connect_to_database.php';
include 'scripts/post_manager.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buber Home</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="http://192.168.64.2/cps630/project1/proj1.css"/>
        <link rel="stylesheet" href="style.css"/>

    </head>

    <body>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
  
                <!-- Title of NavBar -->
                <a class="navbar-brand" href="main.html">
                    Buber
                </a>
  
                <!-- Navbar options left -->
                <div class="navbar-nav mr-auto">
  
                    <!-- Links -->
                    <a class="nav-link" aria-current="page" href="main.html">Home</a>
                    <a class="nav-link" href="about_us.html">About Us</a>
                    <a class="nav-link" href="contact_us.html">Contact Us</a>
                    <a class="nav-link" href="#">Reviews</a>
  
                    <!-- Serivces -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Types of Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="drive.php">Buber Drive</a>
                            <a class="dropdown-item" href="delivery.php">Buber Delivery</a>
                        </div>
                    </div>
                    
                </div>
  
                <!-- Navbar options right -->
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="shopping_cart.php">Shopping Cart</a>
                    <a class="nav-link active" href="sign_up.html">Sign Up</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


          <!-- Starting of the two forms-->
        <div class="hero" >
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn"onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn"onclick="register()">SignUp</button>
                </div>
                <!-- First form for login (username & password)-->
                <form id="login"class="input-group">
                    <input type="text" class="input-field" name="userId" placeholder="User Id" required>
                    <input type="text" class="input-field" name="pass" placeholder="Enter Password" required>
                    <label><input type="checkbox" /> Remember Password </label>
                    <button type="Submit" class="submit-btn">Login</button>
                </form>
                <!-- Second form for register (userId, Password, address, tel no )-->
                <form id="register" action="sign_up.php" class="input-group" method="POST">
                    <input type="text" class="input-field" name="login_id" placeholder="User Id" required>
                    <input type="text" class="input-field" name="name" placeholder="Name" required>
                    <input type="email" class="input-field" name="email" placeholder="Email Id" required>
                    <input type="text" class="input-field" name="tel" placeholder="Phone Number" required>
                    <input type="password" class="input-field" name="pw" placeholder="Enter Password" required>
                    <input type="text" class="input-field" name="address" placeholder="Address" required>
                    <input type="text" class="input-field" name="city" placeholder="City" required>
                    <label><input type="checkbox" required/> I Agree to Terms & Conditions </label>
                    <button type="submit" name="btnSignUp" class="submit-btn">Register</button>
                </form>
            </div>

        </div>



<!-- Letting the forms slide from "Log in" to "SignUp"-->
<script>
var x=document.getElementById("login");
var y=document.getElementById("register");
var z=document.getElementById("btn");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
}
</script> 

	</body>

    <!-- Optional JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>