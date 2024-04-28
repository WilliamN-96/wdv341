<?php


    //logout for the application

    //close your connection object
    //close/clear your statement object

    //clear/destroy your session variables

    //return the user to the home page/login page/etc/
    //PHP redirect
    session_start();
    session_destroy();

    $conn = null;
    $stmt = null;

    //send user to the home page
    header("Location: logIn.php");

?>