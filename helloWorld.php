<?php

    $backgroundColor = "limegreen";      //in PHP all variables begin with a doller sign ($)
                                        //no keyword to define a variable

    /*
        MVC Model View Control
        Model - Data, database content, variables, data objects, JSON object

        Controller - Business logic, most of your code, processing code

        View - HTML/CSS/JavaScript - returned to the client, web page content to display

        Concept - keep as much model and controller logic OUT of the view.
    */

    $backgroundColor = "red";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Intro to PHP</title>
    <style>
        body {
            background-color:<?php echo $backgroundColor; ?>;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Hello World!</h2>
    <?php
        //this will display the hello world paragraph on the document object
        echo "<p>Hello World!</p>";

        /*
            multi line comment
        */

    ?>
    <script>
        document.write("<p>Welcome to <?php echo "PHP!" ?></p>");
    </script>
</body>
</html>