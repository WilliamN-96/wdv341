<?php

$frontLanguages = array(" PHP ", " HTML ", " JavaScript ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        let yourName = "Will Nelson";
        let number1 = 17;
        let number2 = 24;
        let total;
        let frontLanguages1 = [" PHP", " HTML ", " JavaScript "];
    </script>
</head>
<body>
    <h1>PHP Basics</h1>
    <?php
     echo 
     "<h2><script>document.write(yourName);</script></h2>";
    ?>

    <?php 
    
    echo "<p>
    First number is: <script>document.write(number1);</script>.

    Second number is: <script>document.write(number2);</script>. 

    Their sum is: <script>document.write(total=number1+number2);</script>.
    </p>";
    
    ?>
    <p>
    <h2>PHP Array</h2>
    <?php

    //php loop for the array
        for($x=0; $x<count($frontLanguages); $x++){
        echo "<p>" . $frontLanguages[$x] . "</p>";
        }
    
    ?>
    </p>
    <h1>JavaScript Array</h1>
    <script>
        let convertArray = <?php echo json_encode($frontLanguages);?>

        document.write(convertArray);
    </script>
</body>
</html>