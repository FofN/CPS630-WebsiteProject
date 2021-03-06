<?php

echo "Search Mode<br>";

session_start();

include 'scripts/connect_to_database.php';
include 'scripts/post_manager.php';
include 'scripts/login_manager.php';

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Buber Home</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="proj1.css"/>
    </head>

    <body>

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
  
                <!-- Title of NavBar -->
                <a class="navbar-brand" href="main.html">
                    Buber
                </a>
  
                <!-- Navbar options right -->
                <form class="navbar-nav ml-auto" id="formSearch">
                    <input id="txtSearch" name="txtSearch" type="text" form="formSearch" placeholder="userID,orderID">
                    <button type="submit" id="btnSearch" name="btnSearch" class="btn btn-secondary m-2">Search</button>
                </form>
            </div>
        </nav>

        <!-- Body Start -->
        <div class="container-fluid">
            <div class="row justify-content-center bg-white">
                <div class="col-9 text-center">
                </div>
            </div>
        </div>
        
        <!-- Body End -->

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