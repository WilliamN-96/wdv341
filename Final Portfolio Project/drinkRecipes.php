<?php 
// - 1. connect to the database
// - 2. create SQL query
// - 3. prepare your PDO statement
// - 4. Bind variables to the PDO STatement
// - 5. execute the pdo statement - runs the query against the database
// 6. process the results from the query


try{
    require 'dataConnectRecipe.php';

    $sql = "SELECT * FROM recipe_information WHERE recipe_type = 'Drink' ORDER BY recipe_name";

    $stmt = $conn->prepare($sql);       //prepare your PDO Prepared Statement

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
  <title>Drink Recipes</title>
  <link rel="stylesheet" href="css/recipeLobby.css" type="text/css">
  <link rel="stylesheet" href="css/recipeLobby.scss" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body id="background">
  <div class="container border border-2 border-dark p-3">
    <h1>Our Drinks</h1>
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
  <div class="row g-5 mt-5">
  <?php 
  while ($row = $stmt->fetch()){
  ?>
  <div class="col-md-4 mt-3">
    <div class="card" style="width:18rem;">
      <img src="images/<?php echo $row['recipe_image']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['recipe_name']; ?></h5>
        <p class="card-text"><?php echo $row['recipe_description']; ?></p>
      </div>
    </div>
</div><!--Close Card div-->
<?php 
}?>  
</div><!--Close row div-->
<em>This site was made for academic purposes. Some of the images from pixabay and pexels.</em>
  <div>
  <footer>Recipe Lobby &#169 <?php echo date("Y"); ?></footer>
    
  </div><!--Close container-->
</body>
</html>