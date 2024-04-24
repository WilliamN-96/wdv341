<?php
//1. connect to the database
//2. create SQL query
//3. prepare your PDO statement
//4. Bind variables to the PDO STatement
//5. execute the pdo statement - runs the query against the database
//6. process the results from the query

session_start();
//are you a valid user? If yes, then go to work, ELSE - deny access, send to home, etc.

if($_SESSION['memberStatus'] == 'member'){
    //We know you have signed on and you have access to this page.
}else{
    //You are not a valid use and we are sending you away
    header("Location: login.php");
}

try{

    require 'dbConnect.php';

    $sql = "SELECT events_id, events_name, events_description, DATE_FORMAT(events_date, '%W %M %e %Y' ) as eventsFormatDate FROM wdv341_events";

    $stmt = $conn->prepare($sql);       //prepare your PDO Prepared Statement

    $stmt->execute();           //result of the query is stored in the $stmt variable/object
                            //result looks and acts like a database

    $stmt->setFetchMode(PDO::FETCH_ASSOC);      // return values as an ACCOC array

}

catch(PDOException $e){
    
        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

        error_log($e->getMessage());        //Delivers a developer defined message to the PHP log files to  C:\xampp
        error_log($e->getLine());
        error_log(var_dump(debug_backtrace()));

        //Clean up any variables or connections that have been left hanging by this error.

        //header("Location: files/505_error_response_page.php");  //sends control to a User friendly page
        echo "<h1>$message</h1>";
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .eventBlock {
            background-color:limegreen;
        }
    </style>
</head>
<body>

    <h1>WDV 341 Intro to PHP</h1>
    <h2>SELECT Demonstration Page</h2>
    <h2>SelectEvents from the WDV341 Database</h2>

    <div>
        <?php 
            while($row = $stmt->fetch()){
        
        ?>
            <div class="eventBlock">
                <p>Event Name: <?php echo $row["events_name"]; ?></p>
                <p>Event Description: <?php echo $row["events_description"]; ?></p>
                <p>Event Date: <?php echo $row["eventsFormatDate"]; ?></p>
                <p><a href="updateEvent2.php?eventID=<?php echo $row['events_id'];?>"><button>Edit Content</button></a></p>
                 <p><a href="deleteEvent.php?eventID=<?php echo $row['events_id']; ?>"><button>Delete Content</button></a></p>
            </div>
        <?php 
            }        
        ?>

    </div>
</body>
</html>