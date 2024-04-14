<?php 

    //validation function

    function requiredField($inValue){
        global $validForm;
        if(empty($inValue)){
           
            //it is empty
            $validForm = false;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //form has been submitted.
        $validForm = true;
        $eventName = $_POST['eventName'];
        $eventValue = $_POST['eventValue'];
        $eventDescription = $_POST['eventDescription'];
        //echo $eventName;
        //echo $eventDescription;
    
    //server side data validation

    //if any field fails validation - set $validForm to false
    //validation - event name and description are required
        requiredField($eventName);
        requiredField($eventDescription);

        if(!empty($eventValue)){
            header('Location: inputEvent.php');
            die();
        }else{

        if($validForm){

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
    }
    
    }else{
            $validForm = false;
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .honeypotValue{
            display:none;
        }
    </style>
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
                <input type="text" name="eventName" id="eventName">

            </p>

            <p class="honeypotValue">
                <label for="eventValue">Event Label:</label>
                <input type="text" name="eventValue" id="eventValue">
            </p>

            <p>

                <label for="eventDescription">Event Description:</label>
                <input tpye="text" name="eventDescription" id="eventDescription">

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