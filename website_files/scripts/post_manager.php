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
        }
    }

}

?>