<?php 
/*
  function requireForm($inValue){
    global $validForm;
    if(empty($inValue)){
      //if empty false
      $validForm = false;
    }
  }
  

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validForm = true;
    $usernName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];

  }else{
    $validForm = false;
  }
*/

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validForm = true;
    $inUserName = $_POST['userName'];
    $inUserValue = $_POST['userValue'];   //Should be blank
    $inUserEmail = $_POST['userEmail'];
    $date = date("m-d-Y");

      if(!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)){
        exit("Please provide a valid email.");
      }
    
    if(!empty($userValue)){
      return;
    }else{

      
      //valid submission process form data

        //1. connect to the database
        //2. create SQL query
        //3. prepare your PDO statement
        //4. Bind variables to the PDO STatement
        //5. execute the pdo statement - runs the query against the database
        //6. process the results from the query

        try{
        require 'dataConnectSignUp.php';

        $sql='INSERT INTO sign_up_information(sign_up_name, sign_up_email, sign_up_date) VALUES (:userName, :userEmail, :inDate)';

          $stmt = $conn->prepare($sql); //PDO preparation
        
          $stmt->bindParam(':userName', $inUserName);
          $stmt->bindParam(':userEmail', $inUserEmail);
          $stmt->bindParam(':inDate', $date);

          $stmt->execute();
        }catch(PDOException $e){
          
          $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
  
          error_log($e->getMessage());        //Delivers a developer defined message to the PHP log files to  C:\xampp
          error_log($e->getLine());
          error_log(var_dump(debug_backtrace()));
  
          //Clean up any variables or connections that have been left hanging by this error.
  
          //header("Location: files/505_error_response_page.php");  //sends control to a User friendly page
          echo "<h1 style=color:whitesmoke;>$message</h1>";
      
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
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/recipeLobby.css" type="text/css">
  <link rel="stylesheet" href="css/recipeLobby.scss" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body id="background">
  <div class="container border border-2 border-dark p-3">
    <h1>Sign Up</h1>
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
      if($validForm){
        echo "<h2>Thank you for signing up!</h2>";
      
    ?>

    <?php }else{?>
      <h2>Sign up for our newsletter</h2>
    <form class="signUp" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      <div class="mb-3">
      <label for="userName" class="form-label">User Name:</label>
      <input type="text"
              class="form-control"
              name="userName"
              id="userName"
              required
              >
            </div>

        <div class="mb-3" id="userValue" style="display:none;">
          <label for="userValue" class="userValue">User Value:</label>
          <input
            type="text"
            class="form-control"
            id="userValue"
          >
        </div>
  
        <div class="mb-3">
        <label for="userEmail" class="form-label">Email:</label>
        <input
          type="email"
          class="form-control"
          name="userEmail"
          id="userEmail"
          aria-describedby="emailHelpId"
          placeholder="abc@mail.com"
          required
          >
          </div>
          
    <input type="submit" id="submitSignUp" value="Submit">
    <input type="reset" id="resetSignUp" value="Reset">
  </form><!--Close form-->
</div><!--Close form col div-->
<?php };?>


  <div class="col-sm">
      <img src="images/hyacinth.jpg" alt="welcomeFlower">
    </div><!--close img col div-->

    <em>This site was made for academic purposes. Some of the images from pixabay and pexels.</em>
  <footer>Recipe Lobby &#169 <?php echo date("Y"); ?></footer>
    
  </div><!--Close Row-->
  </div><!--Close container-->
</body>
</html>