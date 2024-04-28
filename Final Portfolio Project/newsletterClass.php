<?php 


try{
    require "dataConnectSignUp.php";

//this will be the newsletter interface to send emails to the corresponding users.

$sql = "SELECT * FROM sign_up_information ORDER BY sign_up_name";

$stmt = $conn->prepare($sql);

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

$newsletterObject = new stdClass():

$newsletterObject->subID = $row['sign_up_id'];
$newsletterObject->subName = $row['sign_up_name'];
$newsletterObject->subEmail = $row['sign_up_email'];

?>