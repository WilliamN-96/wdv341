<?php

$frontLanguages = ["PHP", "HTML","JavaScript"];
$yourName = "Will Nelson";
$number1 = 17;
$number2 = 24;
$total = $number1 + $number2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>

        let frontLang = [<?php
            foreach($frontLanguages as $language){
                echo '"'.$language.'", ';
            }
        ?>];

        console.log(frontLang);

    </script>
</head>
<body>
    <h1>PHP Basics</h1>
    <?php
     echo 
     "<h2>$yourName</h2>";
    ?>

    <?php 
    
    echo "<p>
    First number is: $number1.

    Second number is: $number2.

    Their sum is: $total.
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
        //Changed it to the other array method.
        document.write(frontLang);
    </script>
</body>
</html>