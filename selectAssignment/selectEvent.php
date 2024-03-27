<?php

//selectEvent.php will pull a single result/row from our database table using a SELECT query with WHERE Clause

//1. connect to the database
//2. create SQL query
//3. prepare your PDO statement
//4. Bind variables to the PDO STatement
//5. execute the pdo statement - runs the query against the database
//6. process the results from the query


try{

require 'dbConnect.php';

//$eventID = 1;

$sql = "SELECT *, DATE_FORMAT(events_date, '%W %M %e %Y' ) as eventsFormatDate FROM wdv341_events";

$stmt = $conn->prepare($sql);       //prepare your PDO Prepared Statement

//bind variable to PDO statement
//$stmt->bindParam(":eventID", $eventID);        //assign the value of the variable to the placeholder

$stmt->execute();           //result of the query is stored in the $stmt variable/object
                            //result looks and acts like a database

$stmt->setFetchMode(PDO::FETCH_ASSOC);      // return values as an ACCOC array

}

catch(PDOException $e){
    {
        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

        error_log($e->getMessage());        //Delivers a developer defined message to the PHP log files to  C:\xampp
        error_log($e->getLine());
        error_log(var_dump(debug_backtrace()));

        //Clean up any variables or connections that have been left hanging by this error.

        //header("Location: files/505_error_response_page.php");  //sends control to a User friendly page
        echo "<h1>$message</h1>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{
            border:2px solid black;
        }
        tr:nth-child(even){
            background-color:lightblue;
        }
        tr:nth-child(odd){
            background-color:pink;
        }
    </style>
</head>
<body>
    <h1>WDV 341 Intro to PHP</h1>
    <h2>SELECT Demonstration Page</h2>
    <h2>SelectEvents from the WDV341 Database</h2>

    <div>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Event Description</th>
                <th>Event Presenter</th>
                <th>Event Date</th>
            </tr>
        <?php 
            while($row = $stmt->fetch()){
                
                echo "<tr>";
                echo "<td>".$row['events_name']."</td>" . "<td>".$row["events_description"]."</td>" . "<td>".$row["events_presenter"] ."</td>" . "<td>" .$row["eventsFormatDate"] . "</td>";
                echo "</tr>";

            }        
        ?>
        <tabel>
    </div>
</body>
</html>