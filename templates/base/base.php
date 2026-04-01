<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php');

session_start();

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
        include("navbar.php");
    ?>
    
</body>
</html>