<?php 

session_start();
//are you a valid user? If yes, then go to work, ELSE - deny access, send to home, etc.
/*
if($_SESSION['memberStatus'] == 'member'){
    //We know you have signed on and you have access to this page.
}else{
    //You are not a valid use and we are sending you away
    header("Location: login.php");
}
*/
if(!$_SESSION['memberStatus'] == 'member'){
    header("Location: login.php");
}

    //1. connect to the database
    //2. create SQL query
    //3. prepare your PDO statement
    //4. Bind variables to the PDO STatement
    //5. execute the pdo statement - runs the query against the database
    //6. process the results from the query

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //form has been submitted.
        $validForm = true;
        $eventName = $_POST['eventName'];
        $eventDescription = $_POST['eventDescription'];
        //echo $eventName;
        //echo $eventDescription;
    }
    else{
        //display the form
        $validForm = false;
    }

    try{

        require 'dbConnect.php';
        
        $sql="INSERT INTO wdv341_events(events_name, events_description) VALUES (:eventsName, :eventsDesc)";
        
        $stmt = $conn->prepare($sql);       //prepare your PDO Prepared Statement
        
        //bind variable to PDO statement
        //$stmt->bindParam(':eventsName', $eventName);    
        $stmt->bindParam(':eventsName', $eventName);
        $stmt->bindParam(':eventsDesc', $eventDescription);    
        
        $stmt->execute();           //result of the query is stored in the $stmt variable/object
                                    //result looks and acts like a database
        
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
</head>
<body>
    <h1>WDV 341 Intro PHP</h1>
    <h2>Input Event Data into the daatabase</h2>

    <?php

        /*

        if(Submittef the form){
            Diplsay a confirmation message
        }
        else{
            need to see the form to get the event data disply the form html
        }


        */

        if($validForm){
            ?>

            <h3>Thank you, everything worked</h3>

            <?php
        }
        else{
            
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <p>

                <label for="eventName">Event Name:</label>
                <input tpye="text" name="eventName" id="eventName">

            </p>

            <p>

                <label for="eventDescription">Event Description:</label>
                <input tpye="text" name="eventDescription" id="eventDEscription">

            </p>

            <p>

                <input type="submit" name="submit" value="Submit">
                <input type="reset">

            </p>

            </form>
            <?php
        }
        ?>


</body>
</html>