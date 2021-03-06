<?php

if (isset($_SESSION['userLoggedIn'])) {
    echo 'Logged in as: ' . $_SESSION['userLoggedIn'];
}

?>