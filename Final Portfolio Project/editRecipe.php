<?php 
$errEventName = ""; //set a default value to this variable

$recipeId = $_GET['recipeID'];

if(isset($_POST['submit'])){
    //if the submit button has been sent to the server then the user SUBMITTED the form for processing
    
    
    $display = "confirmation";

    $validForm = true;      //assume the form data is all good

    $recipeName = $_POST['recipeName'];   //get form data
    $recipeDesc = $_POST['recipeDesc'];
    //validations

    //validate eventNme - cannot be blank
    if(empty(trim($recipeName))){
        //bad data = invalid form, display error, show form
        $validForm = false;
        $errEventName = "Event Name Required";
        $display = "form";
        
    }

    if(empty(trim($recipeName))){
        //bad data = invalid form, display error, show form
        $validForm = false;
        $errEventDesc = "Event Description Required";
        $display = "form";
        
    }

    //if the for data is Valid then Update the database

    if($validForm){

        try{
        require "dataConnectRecipe.php";

        $sql = "UPDATE recipe_information SET recipe_name = :recipeName, recipe_description = :recipeDesc WHERE recipe_id = :recipeID";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":recipeName", $recipeName);
        $stmt->bindParam(":recipeDesc", $recipeDesc);
        $stmt->bindParam(":recipeID", $recipeId);

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

    require "dataConnectRecipe.php";

    $sql = "SELECT recipe_id, recipe_name, recipe_description FROM recipe_information WHERE recipe_id = :recipeID";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":recipeID", $recipeId);

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
  <title>Newsletter</title>
  <link rel="stylesheet" href="css/recipeLobby.css" type="text/css">
  <link rel="stylesheet" href="css/recipeLobby.scss" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
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

    <h1>Edit Recipe Name and Description</h1>

    <div class="col-sm">

    <?php if($display == "form"){ ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?recipeID=' . $recipeId;?>" method="post">
        <p>
        <br><label for="recipeName">Recipe Name:</label>
        <br><input type="text" name="recipeName" id="recipeName" size=40 value=<?php 
        if(isset($row['recipe_name'])){
            echo $row['recipe_name'];
        }
        if(isset($recipeName)){
            //this is input from the submitted form - need to put theis information back on the form
        } 
        //if you display the for then echo the form data
        //else display the value submitted on the form   ?>>
        </p>

        <p>
        <br><label for="recipeDesc">Recipe Description:</label>
        <br><textarea name="recipeDesc" id="recipeDesc" style="height:500px; width:500px;" value=<?php 
        if(isset($row['recipe_description'])){
            echo $row['recipe_description'];
        }
        if(isset($recipeDesc)){
            //this is input from the submitted form - need to put theis information back on the form
        } 
        //if you display the for then echo the form data
        //else display the value submitted on the form   ?>></textarea>
        </p>

        <input type="submit"  name= "submit" value="Submit Changes">
        <input type="reset" value="Reset">

        <?php }else{?>
          <div class="confirmationMessage">
        <h3>Change Successful</h3>
        <p>Return to <a href="adminRecipeView.php">Select Recipe</a></p>
        </div>
          <?php }?>
    </form>
    </div><!--close form column-->
    <footer> Recipe Lobby &#169 <span id="year"></span></footer>
</div><!--close row-->
</div><!--close container-->
</body>
<script>
  let date = new Date()
  let yearSet = date.getFullYear();
  document.getElementById("year").innerHTML = yearSet;
</script>
</html>