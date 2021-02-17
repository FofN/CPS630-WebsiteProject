<!--
CPS630 - Project Iteration 1
Section 2 Members:
	Justin Maliwat	500899430
	Diwei Guan		500879852
	Deep Oza		500830262
-->

<?php


?>

<!DOCTYPE html>

<html>
    <head>
        <title>Buber Drive</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost/CPS630/Project1/proj1.css"/>
    </head>

    <body>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">

                <!-- Title of NavBar -->
                <a class="navbar-brand" href="#">
                    Buber
                </a>

                <!-- Navbar options left -->
                <div class="navbar-nav mr-auto">

                    <!-- Links -->
                    <a class="nav-link" aria-current="page" href="main.html">Home</a>
                    <a class="nav-link" href="#">About Us</a>
                    <a class="nav-link" href="#">Contact Us</a>
                    <a class="nav-link" href="#">Reviews</a>

                    <!-- Serivces -->
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Types of Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item active" href="#">Buber Drive</a>
                            <a class="dropdown-item" href="#">Buber Eats</a>
                        </div>
                    </div>
                    
                </div>

                <!-- Navbar options right -->
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="#">Shopping Cart</a>
                    <a class="nav-link" href="#">Sign Up</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End-->

        <!-- Menu Start -->
        <div class="container-fluid">
            <form id="formDrive">
                <div class="row justify-content-center bg-secondary">

                    <!-- Form Information -->
                    <div class="col-2 text-center bg-white pt-2 pb-4">

                        <!-- Car Type -->
                        <label for="dropCars"><strong>Car Type</strong></label>
                        <br>

                        <select id="dropCars" name="dropCars" form="formDrive">
                            <option selected disabled>Select Car Type</option>
                            <option>Economy</option>
                            <option>Business</option>
                            <option>First Class</option>
                            <option>Luxury</option>
                        </select>
                        <br>
                        <br>

                        <!-- Origin -->
                        <label for="txtOrigin"><strong>Origin</strong></label>
                        <br>

                        <input id="txtOrigin" name="txtOrigin" type="text" form="formDrive">
                        <br>
                        <br>

                        <!-- Destination -->
                        <label for="txtDestin"><strong>Destination</strong></label>
                        <br>

                        <input id="txtDestin" name="txtDestin" type="text" form="formDrive">
                        <br>
                        <br>
                        
                        <!-- Date Time -->
                        <label for="txtDateTime"><strong>Date and Time</strong></label>
                        <br>

                        <input id="txtDateTime" name="txtDateTime" type="datetime-local">
                        <br>
                        <br>

                        <div>
                            <button type="submit" id="btnDriveOrder" name="btnDriveOrder" class="btn btn-secondary m-2">Book Ride</button>
                            <button type="reset" id="btnClear" name="btnClear" class="btn btn-danger m-2">Clear</button>
                        </div>

                    </div>

                    <!-- Geo Location -->
                    <div class="col-7 text-center bg-white">
                        <select id="dropCars" name="dropCars" form="formDrive">
                            <option selected disabled>Select Car</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    
                </div>
            </form>
        </div>
        <!-- Menu End -->

    </body>

    <!-- Optional JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>