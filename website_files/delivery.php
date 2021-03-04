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
                            <a class="dropdown-item active" href="delivery.php">Buber Delivery</a>
                        </div>
                    </div>
                    
                </div>
  
                <!-- Navbar options right -->
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="shopping_cart.php">Shopping Cart</a>
                    <a class="nav-link" href="sign_up.html">Sign Up</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Menu Start -->
        <div class="container-fluid">
            
            <div class="row justify-content-center bg-secondary">
                <div class="col-4 text-center bg-white">
                    
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=<?php include 'scripts/apikey.php';?>&callback=showMap&libraries=places&v=weekly"
                        async
                        ></script>
                    <div id="map" style="width:auto; height:300px;"></div>

                    <form id="formChooseStore" action="delivery.php" method="POST">
                    
                        <!-- Choose Store -->
                        <label for="dropStores"><strong>Select Store</strong></label>
                        <br>

                        <select id="dropStores" name="dropStores" form="formChooseStore">

                            <option selected disabled>Select Store</option>

                            <!-- Get Stores From Database -->
                            <?php
                            // Check if the database is connected
                            if (isset($pdo)) {
                                $sql = "SELECT DISTINCT store_code FROM flowers ORDER BY flower_id";
                                $result = $pdo->query($sql);
                                while ($row = $result->fetch()) {
                                    if (isset($selectedStore) && $row["store_code"] == $selectedStore) {
                                        echo '<option selected="selected">' . $row["store_code"] . "</option>";
                                    } else {
                                        echo "<option>" . $row["store_code"] . "</option>";
                                    }
                                }
                            }
                            ?>

                        </select>
                        <input type="submit" name="btnChooseStore" form="formChooseStore">
                        <br>
                        <br>

                    </form>

                    <form id="formAddFlowerToCart" action="delivery.php" method="POST">

                        <!-- Origin -->
                        <label for="txtOrigin"><strong>Origin</strong></label>
                        <br>

                        <input id="txtOrigin" name="txtOrigin" class="controls" type="text" form="formAddFlowerToCart" value="<?php echo (isset($selectedStore))?$selectedStore:'';?>" readonly>
                        <br>
                        <br>

                        <!-- Destination -->
                        <label for="txtDestin"><strong>Destination</strong></label>
                        <br>

                        <input id="txtDestin" name="txtDestin" class="controls" type="text" form="formAddFlowerToCart">
                        <br>
                        <br>
                        
                        <!-- Date Time -->
                        <label for="txtDateTime"><strong>Date and Time</strong></label>
                        <br>

                        <input id="txtDateTime" name="txtDateTime" type="datetime-local" form="formAddFlowerToCart">
                        <br>
                        <br>

                        <button type="submit" id="btnAddFlowersToCart" name="btnAddFlowersToCart" class="btn btn-secondary m-2">Add Items to Cart</button>

                    </form>

                </div>

                <div class="row col-4" ondrop="drop(event)" ondragover="allowDrop(event)">

                <?php

                // Check if the database is connected
                if (isset($pdo)) {
                    if (isset($selectedStore)) {
                        $sql = "SELECT * FROM flowers WHERE store_code = '$selectedStore'";
                        $result = $pdo->query($sql);
                        while ($row = $result->fetch()) {
                            
                            echo '<div class="store-item col-2 text-center bg-white border border-secondary ml-3 my-3 align-self-start" id="' . $row["flower_id"] . '" value="' . $row["price"] . '" draggable="true" ondragstart="drag(event)">';
                            echo '<img class="store-item-img" src=' . $row["image_link"] . ' draggable="false"><br>';
                            echo '<span>' . $row["flower_name"] . '</span><br>';
                            echo '<span id="store-item-price">$' . $row["price"] . ' CDN</span><br>';
                            echo "</div>";
                            
                        }
                    } else {
                        echo '<span>Please select a store</span>';
                    }
                    
                }

                ?>

                </div>

                <div class="d-flex flex-column col-4">
                    <div class="text-center">
                        <p id="totalprice">Total Price: $0</p>
                    </div>
                    <div class="w-100 h-100 row bg-white text-center border" id="cart" ondrop="drop(event)" ondragover="allowDrop(event)">
                        
                    </div>
                </div>

            </div>
        </div>
        <!-- Menu End -->

        <!-- Footer Start -->
        <footer class="absolute-bottom container-fluid">
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
        function allowDrop(ev) { 
            ev.preventDefault();
        }
        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }
        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));

            var items = document.getElementById("cart").children;
            var total = 0;
            for (i = 0; i < items.length; i++) {
                total += parseFloat(items[i].getAttribute("value"));
            }
            document.getElementById("totalprice").innerHTML = "Total Price: $" + total;
        }
    </script>
</html>