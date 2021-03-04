<!--
CPS630 - Project I and II
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
        <title>Buber Drive</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="proj1.css"/>
        <script src="./map.js"></script>
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
                    <a class="nav-link active" href="shopping_cart.php">Shopping Cart</a>
                    <a class="nav-link" href="sign_up.php">Sign Up</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Menu Start -->
        <div class="container-fluid">
            <div class="row justify-content-center bg-white">

                <!-- Shopping Cart -->
                <div class="col-7 text-center bg-white pt-2 pb-4">

                    <!-- PHP Database -->
                    <?php
                        if (isset($_SESSION["arrDestin"]) && count($_SESSION["arrDestin"]) > 0) {
                            echo "<h2>Shopping Cart</h2>";
                            echo '<table style="border-width:5px; width: 100%;">';

                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Car</th>";
                            echo "<th>Origin</th>";
                            echo "<th>Destination</th>";
                            echo "<th>Distance (km)</th>";
                            echo "<th>Price</th>";
                            echo "</tr>";

                            for ($i = 0; $i < count($_SESSION["arrDestin"]); $i++) {
                                echo "<tr>";
                                echo "<td>" . $i+1 . "</td>";
                                echo "<td>" . $_SESSION["arrCar"][$i] . "</td>";
                                echo "<td>" . $_SESSION["arrSource"][$i] . "</td>";
                                echo "<td>" . $_SESSION["arrDestin"][$i] . "</td>";
                                echo "<td>" . $_SESSION["arrDistance"][$i] . "</td>";
                                echo "<td>" . "Unfinished" . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "Shopping Cart Empty";
                        }
                    ?>

                </div>

                <!-- Confirm Payment Tab -->
                <div class="col-2 text-center bg-white my-auto">
                    <form id="formConfirmPayment" action="shopping_cart.php" method="POST">
                        <button type="submit" id="btnConfirmPayment" name="btnConfirmPayment" class="btn btn-secondary m-2">Confirm Purchase</button>
                        <button type="submit" id="btnClearCart" name="btnClearCart" class="btn btn-danger m-2">Empty Cart</button>
                    </form>
                </div>

            </div>
        </div>
        <!-- Menu End -->

        <!-- Footer Start -->
        <footer class="fixed-bottom container-fluid">
            <div class="row justify-content-center bg-dark text-white">
                <div class="col-9 p-5">
                    <span>Footer</span>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

    </body>

    <!-- Optional JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>