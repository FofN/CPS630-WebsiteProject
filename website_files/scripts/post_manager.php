<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["btnAddToCart"])) {

        // If the arrays aren't created, create them
        if (!isset($_SESSION["arrDestin"])) {

            // Type
            $_SESSION["arrTypeOfOrder"] = array();

            // Trip/Delivery Table
            $_SESSION["arrSource"] = array();
            $_SESSION["arrDestin"] = array();
            $_SESSION["arrDistance"] = array();
            $_SESSION["arrCar"] = array();
            $_SESSION["arrPrice"] = array();

            // Order
            $_SESSION["arrDateTime"] = array();
            $_SESSION["arrItems"] = array();

        }

        // Append the inputted information to the arrays

        // Type
        $_SESSION["arrTypeOfOrder"][] = 0;

        // Trip/Delivery Table
        $_SESSION["arrSource"][] = $_POST["txtOrigin"];
        $_SESSION["arrDestin"][] = $_POST["txtDestin"];
        $_SESSION["arrDistance"][] = $_POST["distance"];
        $_SESSION["arrPrice"][] = $_POST["price"];
        $_SESSION["arrCar"][] = $_POST["dropCars"];

        // Order
        $_SESSION["arrDateTime"][] = $_POST["txtDateTime"];
        $_SESSION["arrItems"][] = "";

        $message = "Added to Cart!";
        echo "<script>alert('$message');</script>";

    } elseif (isset($_POST["btnClearCart"])) {

        session_destroy();
        header("Refresh:0");

    } elseif (isset($_POST["btnConfirmPayment"])) {

        $message = "Purchase Confirmed!";
        echo "<script>alert('$message');</script>";

        // SEND SHOPPING CART ITEMS TO DATABASE

        // If info is being saved, we INSERT the info into the table
        for ($i = 0; $i < count($_SESSION["arrTypeOfOrder"]); $i++) {

            $currentDate = date("YYYY-mm-dd H:i:sa");
            $dateDone = $_SESSION["arrDateTime"][$i];
            $price = $_SESSION["arrPrice"][$i];
            $user = "CurrentUser";
            $type = $_SESSION["arrTypeOfOrder"][$i];
            $origin = $_SESSION["arrSource"][$i];
            $destin = $_SESSION["arrDestin"][$i];
            $distance = $_SESSION["arrDistance"][$i];
            $carID = 1;

            $sql = "INSERT INTO trips (trip_id, source_code, destin_code, distance, car_id, price) VALUES (NULL, :sc, :dc, :d, :ci, :p);";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":sc", $origin);
            $statement->bindValue(":dc", $destin);
            $statement->bindValue(":d", $distance);
            $statement->bindValue(":ci", $carID);
            $statement->bindValue(":p", $price);
            $statement->execute();

            $sql = 'SELECT MAX(trip_id) AS largest_id FROM trips;';
            $result = $pdo->query($sql);
            $row = $result->fetch();
            $tripID = $row["largest_id"];

            if ($_SESSION["arrTypeOfOrder"][$i] == 0) {
                $sql = "INSERT INTO orders (order_id, datetime_issued, datetime_done, price, user_id, trip_id, flower_id) VALUES (NULL, :dti, :dtd, :p, :ui, :ti, :fi);";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(":dti", $currentDate);
                $statement->bindValue(":dtd", $dateDone);
                $statement->bindValue(":p", $price);
                $statement->bindValue(":ui", $user);
                $statement->bindValue(":ti", $tripID);
                $statement->bindValue(":fi", "NULL");
                $statement->execute();
            } else {
                for ($j = 0; $j < count($_SESSION["arrItems"][$i]); $j++) {
                    $sql = "INSERT INTO orders (order_id, datetime_issued, datetime_done, price, user_id, trip_id, flower_id) VALUES (NULL, :dti, :dtd, :p, :ui, :ti, :fi);";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":dti", $currentDate);
                    $statement->bindValue(":dtd", $dateDone);
                    $statement->bindValue(":p", $price);
                    $statement->bindValue(":ui", $user);
                    $statement->bindValue(":ti", $tripID);
                    $statement->bindValue(":fi", $_SESSION["arrItems"][$i][$j]);
                    $statement->execute();
                }
            }
        }
        

        session_destroy();
        header("Refresh:0");
        
    } elseif (isset($_POST["btnChooseStore"])) {

        $selectedStore = $_POST["dropStores"];

    } elseif (isset($_POST["btnAddFlowersToCart"])) {

        // If the arrays aren't created, create them
        if (!isset($_SESSION["arrDestin"])) {

            // Type
            $_SESSION["arrTypeOfOrder"] = array();

            // Trip/Delivery Table
            $_SESSION["arrSource"] = array();
            $_SESSION["arrDestin"] = array();
            $_SESSION["arrDistance"] = array();
            $_SESSION["arrCar"] = array();
            $_SESSION["arrPrice"] = array();

            // Order
            $_SESSION["arrDateTime"] = array();
            $_SESSION["arrItems"] = array();

        }

        // Append the inputted information to the arrays

        // Type
        $_SESSION["arrTypeOfOrder"][] = 1;

        // Trip/Delivery Table
        $_SESSION["arrSource"][] = $_POST["txtOrigin"];
        $_SESSION["arrDestin"][] = $_POST["txtDestin"];
        $_SESSION["arrDistance"][] = $_POST["distance"];
        $_SESSION["arrPrice"][] = $_POST["totalprice"];
        $_SESSION["arrCar"][] = "Delivery Car";

        // Order
        $_SESSION["arrDateTime"][] = $_POST["txtDateTime"];
        $_SESSION["arrItems"][] = $_POST["flower"];

        $message = "Added to Cart!";
        echo "<script>alert('$message');</script>";

    } elseif (isset($_POST["btnSignUp"])) {
        $sql_query = "INSERT INTO users (user_id, name, phone_number, email, address, city_code, login_id, password, balance) VALUES (NULL, :n, :pn, :e, :add, :c, :l, :pw, 0);";
        $statement = $pdo->prepare($sql_query);
        $statement->bindValue(":n", $_POST["name"]);
        $statement->bindValue(":pn", $_POST["tel"]);
        $statement->bindValue(":e", $_POST["email"]);
        $statement->bindValue(":add", $_POST["address"]);
        $statement->bindValue(":c", $_POST["city"]);
        $statement->bindValue(":l", $_POST["login_id"]);
        $statement->bindValue(":pw", $_POST["pw"]);
        $statement->execute();
        echo "Signed up!";

    } elseif (isset($_POST["btnLogin"])) {
        $user = $_POST["login_id"];
        $pw = $_POST["pw"];
        $sql_retrieve = "SELECT * FROM users WHERE login_id=:us AND password=:pw";
        $retrieved_user = $pdo->prepare($sql_retrieve);
        $retrieved_user->bindValue(":us", $user);
        $retrieved_user->bindValue(":pw", $pw);
        $retrieved_user->execute(); 
        $row = $retrieved_user->fetch();
        if(!$row){
            echo "Try again, either username or password is wrong.";
        } else {
            echo "Logged in successfully.";
        $_SESSION['userLoggedIn'] = $user;
        }
    } elseif (isset($_POST["btnSearch"])) {
        $temp = explode(',',$_POST['txtSearch']);
        $searchedUserID = $temp[0];
        $searchedOrderID = $temp[1];
        // apply sql search queries and show in a table
    }

}

?>