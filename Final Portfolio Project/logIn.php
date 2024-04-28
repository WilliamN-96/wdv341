<?php 

session_start();
//1. connect to the database
//2. create SQL query
//3. prepare your statement
//4. Bind variables to the PDO STatement
//5. execute the pdo statement - runs the query against the database
//6. process the results from the query

$display = "";
$errMsg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $userName = $_POST['userName'];
  $userPassword = $_POST['userPassword'];

  require 'dataConnectUser.php';

  $sql = "SELECT COUNT(*) from user_information WHERE user_name = :userName AND  user_password = :userPassword";

    $stmt = $conn->prepare($sql);   

    $stmt->bindParam(':userName',$userName);
    $stmt->bindParam(':userPassword',$userPassword);
    
    $stmt->execute();

    $rowCount = $stmt->fetchColumn();       //get the number of rows located by the query

    if($rowCount == 1){
        $display = "admin";
        //display the admin page content
        $_SESSION["memberStatus"] = "admin";
    }else{
        $display = "error";
        $errMsg = "<h3>Invalid username or password</h3>";
        //display form 
    }

    


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="css/recipeLobby.css" type="text/css">
  <link rel="stylesheet" href="css/recipeLobby.scss" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body id="background">
  <div class="container border border-2 border-dark p-3">
    <h1>Log In</h1>
    
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
<div class="row g-5 mt-3">
  <div class="col-sm">
    <?php
      if($display == "admin"){
    ?>
    <div class="adminPage">
      <h2>Admin Page</h2>
      <ul>
        <br><li><a href="newsLetter.php">Send newsletters</a></li>
        <br><li><a href="adminRecipeView.php">Alter Recipes</a></li>
      </ul>
        <a name="log-out" id="log-out" href="logOut.php" role="button"><button>Log Out</button></a>
      </div><!--Close admin page div-->

    <?php }else{

      echo "$errMsg";
      ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      <div class="mb-3">
      <label for="userName">User Name:</label>
      <input
          type="text"
          class="form-control"
          name="userName"
          id="userName"
          required
        >
        </div><!--close username-->

        <div class="honeyPot" style="display:none;">
          <label for="email" class="form-label">Email:</label>
          <input type="text" class="form-control" name="userEmail" id="userEmail">
        </div><!--Close honeypot div-->

      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input
          type="password"
          class="form-control"
          name="userPassword"
          id="userPassword"
          required
        >
      </div><!--password close-->
      <input
        name="logInButton"
        id="logInButton"
        type="submit"
        value="Log In"
      />
      <input type="reset" id="resetContact" value="Reset">
      
    </form>
</div><!--close form col div-->
    <div class="col-sm">
      <img src="images/hyacinth.jpg" alt="welcomeFlower">
    </div><!--close img col div-->
    <em>This site was made for academic purposes. Some of the images from pixabay and pexels.</em>
    <footer>Recipe Lobby &#169 <?php echo date("Y"); ?></footer>
  </div><!--Close container-->
</div><!--Close row-->
  <?php }?>
</body>
</html>