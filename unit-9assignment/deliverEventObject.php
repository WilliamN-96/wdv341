<?php

//selectEvent.php will pull a single result/row from our database table using a SELECT query with WHERE Clause

//1. connect to the database
//2. create SQL query
//3. prepare your PDO statement
//4. Bind variables to the PDO STatement
//5. execute the pdo statement - runs the query against the database
//6. process the results from the query

require "eventClass.php";

$outputObj = new Event();


try{

require 'dbConnect.php';

$eventID = 1;

$sql = "SELECT *, DATE_FORMAT(events_date, '%W %M %e %Y' ) as eventsFormatDate FROM wdv341_events
WHERE events_id = :eventID";

$stmt = $conn->prepare($sql);       //prepare your PDO Prepared Statement

//bind variable to PDO statement
$stmt->bindParam(":eventID", $eventID);        //assign the value of the variable to the placeholder

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

$row = $stmt->fetch();

$outputObj->set_event_id($row['events_id']);
$outputObj->set_event_name($row['events_name']);
$outputObj->set_event_description($row['events_description']);
$outputObj->set_event_presenter($row['events_presenter']);
$outputObj->set_event_date($row['events_date']);
$outputObj->set_event_time($row['events_time']);


var_dump($outputObj);

$outputObjJSON = json_encode($outputObj);

echo "<p>".$outputObjJSON."</p>";

?>