<?php
    // Model - Data Definitions
    // Controller - business logic, processing, etc.
    // View - displayable area



    $studentName = "Mary Smith";        //global scope not in a function - data type: String

    $students = array("Wilma", "Betty", "Fredd", "Barney");

    $inventoryCount = array(10, 4, 27);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV 341 Intro PHP</h1>
    <h2>PHP Basics - Examples</h2>
    <h3>Hello: <?php echo $studentName; ?></h3>
    <?php echo $students[0]; ?>
    <p>
        <?php for($i=0; $i<count($students);$i++){
            //$studentName = $students[$i];
            //echo "<p>$students[$i]</p>";            // Notice the variables inside the quotes
            echo "<p>" .$students[$i]. "</p>";        //Same functionality - two formats
        } ?>
        </p>
    <p>
        <?php 
            foreach($students as $student){     //assign the value of the array to the variable
                echo "<p>$student</p>";
            }
        ?>
    </p>
    <div>
        <?php foreach($inventoryCount as $item){
            if($item < 10){
                echo "<p style='color:red'>" . $item . "</p>";
            }else{
            echo "<p>" . $item . "</p>";
            }
             //if $item is  <10 then appear red?
             // put a style = 'color:red' in the open p tag
             } ?>
        </div>
        <div>
        <?php 
        foreach($inventoryCount as $item){
                 echo "<p";
                    if($item<10){
                      echo " style='color:red'";
                      echo " class='maincontainer redBox blueBackground'";
                 }
                         echo">$item</p>";
             } 
            ?>
        </div>
        <div>
        <?php 
        foreach($inventoryCount as $item){
                 echo "<p";
                    if($item<10){
                      $cssAttribute = "style='color:red'";
                    }else{
                      $cssAttribute = "";
                 }
                         echo "<p $cssAttribute>$item</p>";
                }
              ?>
            </div>
</body>
</html>