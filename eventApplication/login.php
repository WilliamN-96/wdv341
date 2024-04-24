<?php
session_start();
/*
			
//1. connect to the database
//2. create SQL query
//3. prepare your statement
//4. Bind variables to the PDO STatement
//5. execute the pdo statement - runs the query against the database
//6. process the results from the query
			
			
if(admin user){
    Admin screen
}else{
error message invalid username or password
}
will allow access to valid users

if (form_submitted){
process form data
}else{

display form
}

*/


$display = "";
$errMsg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $inUserName = $_POST['inUserName'];
    $inPassword = $_POST['inPassword'];

    require 'dbConnect.php';

    $sql = "SELECT COUNT(*) from wdv341_event_user_table WHERE event_user_name = :user AND  event_user_password = :password";

    $stmt = $conn->prepare($sql);   

    $stmt->bindParam(':user',$inUserName);
    $stmt->bindParam(':password',$inPassword);

    $stmt->execute();

    $rowCount = $stmt->fetchColumn();       //get the number of rows located by the query

    if($rowCount == 1){
        $display = "admin";
        //display the admin page content
        $_SESSION['memberStatus'] ="member";
    }else{
        $display = "error";
        $errMsg = "Invalid username or password";
        //display form 
    }

    //did I find 1 or more valid rows for this username/password?

    /*
        if valid
            display admin page
        else
            display an error
    */
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
    <h1>Login Page</h1>

    <?php 
        if($display == "admin"){
            //admin content
    ?>
    <h3>Admin Page</h3>
            <ol>
                <li><a href="inputEvent.php">Insert New Events</a></li>
                <li><a href="selectEvents.php">Display Events</a></li>
            </ol>
            <p><a href="logout.php">Log Out</a></p>
    <?php
        }else{
            //display form and error messages
        ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <p class="errMsg"><?php echo $errMsg; ?></p>
    <p>
    <label for="inUserName">Username: </label>
    <input type="text" name="inUserName" id="inUserName">
    </p>

    <p>
        <label for="inPassword">Password: </label>
        <input type="text" name="inPassword" id="inPassword">
    </p>

    <p>
        <input type="submit" name="submit">
        <input type="reset">
    </p>

    <?php
        }
    ?>
</form>
</body>
</html>