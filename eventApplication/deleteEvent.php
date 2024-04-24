<?php 

//1. connect to the database
//2. create SQL query
//3. prepare your PDO statement
//4. Bind variables to the PDO STatement
//5. execute the pdo statement - runs the query against the database
//6. process the results from the query

    //get the eventID for the selected event

    try{

    $eventID = $_GET['eventID']; //get the value

    require 'dbConnect.php';

    $sql = "DELETE FROM wdv341_events WHERE events_id = :eventID";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":eventID", $eventID);

    $stmt->execute();
}
catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Event Application Example</h1>
    <p>You have selected Event ID: <?php echo $eventID; ?> </p>
    <p>Your event has been deleted.</p>
    <p><a href="selectEvents.php">Return to events list</a></p>
</body>
</html>