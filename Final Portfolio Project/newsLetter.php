<?php

  session_start();

  if($_SESSION['memberStatus'] == 'admin'){
    //We know you have signed on and you have access to this page.
}else{
    //You are not a valid use and we are sending you away
    header("Location: login.php");
}

try{
require 'dataConnectSignUp.php';
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Newsletter</title>
  <link rel="stylesheet" href="css/recipeLobby.css" type="text/css">
  <link rel="stylesheet" href="css/recipeLobby.scss" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <style>
    input[type=checkbox]{
    display:flex;
    position: relative;
}
  </style>
</head>
<body id="background">
  <div class="container border border-2 border-dark p-3">
    <nav class="navbar navbar-expand-sm navbar-light">
      <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
              aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarID">
              <div class="navbar-nav">
                  <a class="nav-link" aria-current="page" href="aboutUs.html">About Us</a>
                  <a class="nav-link" aria-current="page" href="foodRecipes.php">Foods</a>
                  <a class="nav-link" aria-current="page" href="drinkRecipes.php">Drinks</a>
                  <div class="dropdown">
                    <button class="moreBtn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                      More
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="nav-link" aria-current="page" href="signUp.php">Sign Up</a></li>
                      <li><a class="nav-link" aria-current="page" href="contactUs.php">Contact Us</a></li>
                    </ul>
                  </div><!--Close drop down button tag-->
                  <div id="logInPopup" class="logInButton">
                    <a href="logIn.php">
                      <button>Log In</button>
                    </a>
                  </div><!--Close popup-->
              </div><!--Close nav bar class-->
          </div><!--Close collapse-->
      </div>
  </nav><!--Close nav tag-->
<div class="row g-5">
  
<?php if(isset($_POST['submit'])){
  $error= [];
  $inSubEmail= $_POST['sign_up_email'];
  $inHeader= $_POST['subject'];
  $inMessage= $_POST['messageArea'];
  $date = date("n/j/Y");

  $to = $inSubEmail;
  $subject = $inHeader;
  $header = "From Recipe Lobby";
  $message = $inMessage;

  $message = wordwrap($message, 75, "\r\n");

  if(mail($to,$subject,$header,$message)){
    echo "<h2>The message has been sent to the chose recipients</h2>";
  }else{
    echo "<h2>Message failed to send.</h2>";
  }

}else{ ?>
    <h1>Newsletter Accounts</h1>
    
    <form class="col-sm needs-validation" style="float:left;" novalidate>
      
    <div class="subList">
      <label for="subscribers">Subscriber Emails:</label>
        <?php while($row = $stmt->fetch()){ ?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="accountsID" id="accountsID" value="<?php echo $row['sign_up_id']; ?>" required>
              <?php  echo $row['sign_up_email']; ?>
          <?php }?>
          </div><!--close checkbox div-->
        </div> 
        </div>

        <br><label for="subject">Subject:</label>
          <br><input class="form-text-input" type="text" name="subject" id="subject" size="40" required> 

        <br><label for="message">Message:</label>
          <br><textarea id="messageArea" name="messageArea" rows="7" cols="75" required></textarea>

          <p><input type="submit" value="Submit"> <input type="reset" value="Reset"></p>
     
      </form><!--Close form tag-->
      
  </div><!--close column tag-->
  <?php } ?>
  <footer> Recipe Lobby &#169 <span id="year"></span></footer>
</div><!--close row-->

</body>
<script>
  let date = new Date()
  let yearSet = date.getFullYear();
  document.getElementById("year").innerHTML = yearSet;
</script>
</html>