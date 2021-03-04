<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["btnAddToCart"])) {

        // If the arrays aren't created, create them
        if (!isset($_SESSION["arrDestin"])) {

            // Trip/Delivery Table
            $_SESSION["arrSource"] = array();
            $_SESSION["arrDestin"] = array();
            $_SESSION["arrDistance"] = array();
            $_SESSION["arrCar"] = array();
            $_SESSION["arrPrice"] = array();

            // Order
            $_SESSION["arrDateTime"] = array();

        }

        // Append the inputted information to the arrays
        // Trip/Delivery Table
        $_SESSION["arrSource"][] = $_POST["txtOrigin"];
        $_SESSION["arrDestin"][] = $_POST["txtDestin"];
        echo $_POST["distance"];
        $_SESSION["arrDistance"][] = $_POST["distance"];
        //$_SESSION["arrPrice"][] = $_POST["dropTypes"];
        
        $_SESSION["arrCar"][] = $_POST["dropCars"];

        // Order
        //$_SESSION["arrDateTime"][] = $_POST["dropGenres"];

        $message = "Added to Cart!";
        echo "<script>alert('$message');</script>";

    } elseif (isset($_POST["btnClearCart"])) {

        session_destroy();
        header("Refresh:0");

    } elseif (isset($_POST["btnConfirmPayment"])) {

        $message = "Purchase Confirmed!";
        echo "<script>alert('$message');</script>";
        session_destroy();
        header("Refresh:0");
        
    } elseif (isset($_POST["btnChooseStore"])) {

        $selectedStore = $_POST["dropStores"];

    } elseif (isset($_POST["btnAddFlowersToCart"])) {

        // If the arrays aren't created, create them
        if (!isset($_SESSION["arrDestin"])) {

            // Trip/Delivery Table
            $_SESSION["arrSource"] = array();
            $_SESSION["arrDestin"] = array();
            $_SESSION["arrDistance"] = array();
            $_SESSION["arrCar"] = array();
            $_SESSION["arrPrice"] = array();

            // Order
            $_SESSION["arrDateTime"] = array();

        }

    }

}

?>