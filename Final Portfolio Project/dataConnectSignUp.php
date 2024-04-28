<?php  /*
    File connects to the database for sign up insert
    */

    $servername = "localhost";
    $database = "wdv341";

    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        //set
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

    }

    catch(PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
      }

?>