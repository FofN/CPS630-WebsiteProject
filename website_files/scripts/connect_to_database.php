<?php

try {
    $connectionString = "mysql:host=localhost;dbname=cps630database";
    $user = "root";
    $pass = "";
    $pdo = new PDO($connectionString, $user, $pass);
} catch (PDOException $e) {
    die($e->getMessage());
}

?>