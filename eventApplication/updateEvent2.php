<?php

$errEventName = ""; //set a default value to this variable

$recId = $_GET['eventID'];

if(isset($_POST['submit'])){
    //if the submit button has been sent to the server then the user SUBMITTED the form for processing
    
    
    $display = "confirmation";

    $validForm = true;      //assume the form data is all good

    $eventName = $_POST['eventName'];   //get form data
    $eventDesc = $_POST['eventDesc'];
    //validations

    //validate eventNme - cannot be blank
    if(empty(trim($eventName))){
        //bad data = invalid form, display error, show form
        $validForm = false;
        $errEventName = "Event Name Required";
        $display = "form";
        
    }

    if(empty(trim($eventName))){
        //bad data = invalid form, display error, show form
        $validForm = false;
        $errEventDesc = "Event Description Required";
        $display = "form";
        
    }

    //if the for data is Valid then Update the database

    if($validForm){

        try{
        require "dbConnect.php";

        $sql = "UPDATE wdv341_events SET events_name = :eventName, events_description = :eventDesc WHERE events_id = :eventID";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":eventName", $eventName);
        $stmt->bindParam(":eventDesc", $eventDesc);
        $stmt->bindParam(":eventID", $recId);

        $stmt->execute();
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

        $display = "confirmation";      //will display the confirmation message
    }
    

}
else{
    //SELECT the data from the database
    //show the database content on the form
    //display the form
    $display = "form";

    try{

    require "dbConnect.php";

    $sql = "SELECT events_id, events_name, events_description FROM wdv341_events WHERE events_id = :eventID";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":eventID", $recId);

    $stmt->execute();
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
    $row = $stmt->fetch();
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
    <h1>WDV341 Intro PHP</h1>
    <h2>UPDATE Event Information</h2>

    <?php if($display == "form"){
      //display form      ?>
        
        <div class="updateForm">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?eventID=' . $recId;?>">

        <p>
        <label for="eventName">Event Name:</label>
        <input type="text" name="eventName" id="eventName" size="40" value="<?php 
            if(isset($row['events_name'])){
                echo $row['events_name'];
            }
            if(isset($eventName)){
                //this is input from the submitted form - need to put theis information back on the form
            } 
            //if you display the for then echo the form data
            //else display the value submitted on the form   
        ?>">
        <span class="errMsg"><?php echo $errEventName ?></span>
        </p>

        <p>
            <label for="eventDesc">Event Description:</label>
            <input type="text" name="eventDesc" id="eventDesc" size="100" value="<?php 
            if(isset($row['events_description'])){
                echo $row['events_description'];
            }
            if(isset($eventDesc)){
                echo $eventDesc;
            } 
           
        ?>">
        <span class="errMsg"><?php if(isset($errEventDesc)){echo $errEventDesc;}; ?></span>
        </p>

        <p>
        <input type="submit" name="submit" value="Input Event">
        <input type="reset" value="Reset">
        </p>
        </div>

       <?php }else{ //display confirm method?>
 
        <div class="confirmationMessage">
        <h3>Update Successful</h3>
        <p>Return to <a href="selectEvents.php">Select Events</a></p>
        </div>

    <?php } ?>
    
</form>
</body>
</html>