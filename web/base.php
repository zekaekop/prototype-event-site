<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php');

if (!isset($_SESSION['user'])) {
    header("Location: logout.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAS</title>

    <link rel="stylesheet" href="static/base.css">
    <link rel="stylesheet" href="static/bootstrap.min.css">
</head>
<body>

    <?php
        # The purpose of this is to hide the navbar and footer when displaying the login or register pages
        if ($_SERVER['PHP_SELF'] != '/prototype/prototype-event-site/account/login.php' &&
            $_SERVER['PHP_SELF'] != '/prototype/prototype-event-site/account/register.php') {
            # NOTE: The guest logout AUTH code is written in navbar
            include("navbar.php");
            include("footer.php");
        }
    ?>
    
</body>
</html>