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
include 'scripts/login_manager.php';

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Buber Drive</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="proj1.css"/>
        <script src="./map.js"></script>
        <script src="./scripts/pricing.js"></script>
    </head>

    <body>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
  
                <!-- Title of NavBar -->
                <a class="navbar-brand" href="main.php">
                    Buber
                </a>
  
                <!-- Navbar options left -->
                <div class="navbar-nav mr-auto">
  
                    <!-- Links -->
                    <a class="nav-link" aria-current="page" href="main.php">Home</a>
                    <a class="nav-link" href="about_us.html">About Us</a>
                    <a class="nav-link" href="contact_us.html">Contact Us</a>
                    <a class="nav-link" href="#">Reviews</a>
  
                    <!-- Serivces -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Types of Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item active" href="drive.php">Buber Drive</a>
                            <a class="dropdown-item" href="delivery.php">Buber Delivery</a>
                        </div>
                    </div>
                    
                </div>
  
                <!-- Navbar options right -->
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="shopping_cart.php">Shopping Cart</a>
                    <a class="nav-link" href="sign_up.php">Sign Up</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Menu Start -->
        <div class="container-fluid">
            <form id="formDrive" action="drive.php" method="POST">
                <div class="row justify-content-center bg-secondary">

                    <!-- Form Information -->
                    <div class="col-2 text-center bg-white my-auto">

                        <!-- Car Type -->
                        <label for="dropCars"><strong>Car Type</strong></label>
                        <br>

                        <select id="dropCars" name="dropCars" form="formDrive">

                            <option selected disabled>Select Car Type</option>

                            <!-- Get Car Models From Database -->
                            <?php
                            // Check if the database is connected
                            if (isset($pdo)) {
                                $sql = "SELECT * FROM cars ORDER BY car_id";
                                $result = $pdo->query($sql);
                                while ($row = $result->fetch()) {
                                    echo "<option>" . $row["car_model"] . "</option>";
                                }
                            }
                            ?>

                        </select>
                        <br>
                        <br>

                        <!-- Origin -->
                        <label for="txtOrigin"><strong>Origin</strong></label>
                        <br>

                        <input id="txtOrigin" name="txtOrigin" class="controls" type="text" form="formDrive">
                        <br>
                        <br>

                        <!-- Destination -->
                        <label for="txtDestin"><strong>Destination</strong></label>
                        <br>

                        <input id="txtDestin" name="txtDestin" class="controls" type="text" form="formDrive">
                        <br>
                        <br>
                        
                        <!-- Date Time -->
                        <label for="txtDateTime"><strong>Date and Time</strong></label>
                        <br>

                        <input id="txtDateTime" name="txtDateTime" type="datetime-local" form="formDrive">
                        <br>
                        <br>
                        <label for="distance"><strong>Distance</strong></label>
                        <br>
                        <input id="distance" name="distance" type="text" form="formDrive" readonly>
                        <br>
                        <br>
                        <label for="price"><strong>Price</strong></label>
                        <br>
                        <input id="price" name="price" type="text" form="formDrive" value="0" readonly>
                        <br>
                        <div>
                            <button type="submit" id="btnAddToCart" name="btnAddToCart" class="btn btn-secondary m-2">Add to Cart</button>
                            <button type="reset" id="btnClear" name="btnClear" class="btn btn-danger m-2">Clear</button>
                        </div>

                    </div>

                    <!-- Geo Location -->
                    <div class="col-7 text-center bg-white">
                        <script
                        src="https://maps.googleapis.com/maps/api/js?key=<?php include 'scripts/apikey.php';?>&callback=showMap&libraries=places&v=weekly"
                        async
                        ></script>
                        <div id="map"></div> 
                    </div>
                </div>
            </form>
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

    <script>
        $("#distance").on("change", "input", function() {
            alert( "Handler for .change() called." );
            document.getElementById("price").value = pricePerKm * document.getElementById("distance").value;
        });
    </script>
</html>