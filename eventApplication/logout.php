<?php
session_start();
    //logout for the application

    //close your connection object
    //close/clear your statement object

    //clear/destroy your session variables

    session_unset();
    session_destroy();

    //return the user to the home page/login page/etc/
    //PHP redirect

    $conn = null;
    $stmt = null;

    //send user to the home page
    header("Location: login.php");

?>