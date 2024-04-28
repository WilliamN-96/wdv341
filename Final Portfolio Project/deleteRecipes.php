<?php 
    try{
       

        $recipeID = $_GET['recipeID'];

        require "dataConnectRecipe.php";

        $sql = "DELETE FROM recipe_information WHERE recipe_id = :recipeID";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":recipeID", $recipeID);

        $stmt->execute();

    }
    catch(PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
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
  <div class="row g-5">

      <h2>Change Successful</h2>
    <p>You deleted the following recipe: <?php echo $recipeID;?></p>
    <p><a href="adminRecipeView.php">Return to recipe view.</a></p>


    <footer> Recipe Lobby &#169 <span id="year"></span></footer>
</div><!--close row-->
</div><!--Close container-->
</body>
<script>
  let date = new Date()
  let yearSet = date.getFullYear();
  document.getElementById("year").innerHTML = yearSet;
</script>
</html>