<?php

try {
    $connectionString = "mysql:host=localhost;dbname=cps630database";
    $user = "root";
    $pass = "";
    $pdo = new PDO($connectionString, $user, $pass);
} catch (PDOException $e) {
    die($e->getMessage());
}

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