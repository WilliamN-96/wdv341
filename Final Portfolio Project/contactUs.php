
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="css/recipeLobby.css" type="text/css">
  <link rel="stylesheet" href="css/recipeLobby.scss" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body id="background">
<div class="container border border-2 border-dark p-3">
    <h1>Contact Us</h1>
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
            </div><!--Close nav bar class-->
        </div><!--Close collapse-->
    </div>
</nav><!--Close nav tag-->
<div class="row g5">
  <div class="col-sm">
<?php 
if(isset($_POST['submit'])){

  //assigning key=>values to input
$error = [];

$contactName = $_POST['userName'];
$emailName = $_POST['userEmail'];
$contactOption = $_POST['selectReason'];
$contactMessage = $_POST['contactComment'];
$date = date("n/j/y");

//Email response to user.
$inEmail = $emailName;
	
$message = "<p>Dear $contactName,</p>\n
<p>Thank you for filling out the contact form.</p>
<p>we will make sure to reply to you as soon as we am able.</p> \n
<p>Sincerely, Recipe Lobby Support</p>";

$message = wordwrap($message, 70, "\r\n");

$to = $inEmail;
$subject = "Thank you!";
$header = "From: info@wknelson.net" . "\r\n";

//validation if the message was sent.
if(mail($to,$subject,$message,$header)){
  echo "<h2>Message sent.</h2>";
}else{
  echo "<h2 style='color:#a60707;'>There was an error. Message failed to send.</h2>";
}

echo "<h2>Form has been submitted! thnak you for contacting us!</h2>"
?>
<?php 

$toMe = "info@wknelson.net";
$subjectMe = "Respose";
$headerMe = "From: $inEmail";
$messageMe = "The message: $contactMessage";
$messageDate = "Sent on: $date";

mail($toMe, $subjectMe, $headerMe, $messageMe, $messageDate);


?>
<?php 
}else{
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <label for="user-name" class="form-label mt-3">Name:</label><!--username-->
      <input
          type="text"
          class="form-control"
          name="userName"
          id="userName"
          required
        >
        <label for="contact-email" class="form-label mt-3">Email:</label><!--email-->

        <input
            type="email"
            class="form-control"
            name="contactEmail"
            id="contactEmail"
            aria-describedby="emailHelpId"
            placeholder="abc@mail.com"
            required
        >

        <label for="select-reason" class="form-label mt-3">Why are you contacting us?</label>
        <select class="form-control" name="selectReason" id="selectReason" required>
          <option id="selectOne" value="default">Select One</option>
          <option id="Issues" value="Issues">Issues</option>
          <option id="general" value="General-Comment">Recipe Questions</option>
          <option id="other" vlaue="other">Other</option>
        </select>

        <label for="contact-comment" class="form-label mt-3">Comment:</label><!--textarea-->
        <textarea class="form-control" name="contactComment" id="contactComment" rows="7" cols="75" required></textarea>

        <input type="submit" id="submit" name="submit" value="Submit">
        <input type="reset" id="resetContact" value="Reset">
</form>
</div><!--close form column-->
<?php
}
?>
<div class="col-sm">
      <img src="images/contact-us.png" alt="contactUs">
    </div><!--close img col div-->
    <em>This site was made for academic purposes. Some of the images from pixabay and pexels.</em>
<footer>Recipe Lobby &#169 <?php echo date("Y"); ?></footer>

</div><!--Close Row-->
</div><!--Close container-->
</body>
</html>