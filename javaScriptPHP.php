<?php 
    //MVC - Model:data  View:HTML content   Control:Business logic/processing
    //Model/data at the top of the application
    //Controler business logic/processing (most of the PHP code)
    //View - html section

    //array - a group/list/collection/table/array of values with the same name.

    //Use a PHP array to build a JavaScript array.

    $carArray = array("Ford", "Kia", "Chevrolet");      //numerically index array

    $carArray2 = array("car1"=>"Ford", "car2"=>"Kia", "car3"=>"Chevrolet");      //Associative

    //echo $carArray[1]; //Should be Kia

    //echo $carArray2["car2"]; //Should be Kia

    $fruits = ["Apple","Peach","Banana","Pear"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
            let newCars = new Array("Ford", "Kia", "Chevrolet");

            let car = ["Ford", "Kia", "Chevrolet"];

            let fruits = [<?php //echo "'". $fruits[0]."'" . ", '".$fruits[1]."'"; 

                    foreach($fruits as $fruit){
                        echo "'".$fruit."',";
                        }
                    ?>];

                    console.log(fruits);
                    console.log(fruits[2]);

            let carsObject = {
                car1:"Ford",
                car2:"Kia",
                car3:"Chevrolet"
            };

            let car1 = {
                carName:"Ford",
                cartType:"Truck",
                carColor:"Red"
                //pieces of informatin related to the same topic/object.
            }

    </script>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Using PHP to display/output JavaScript</h2>
</body>
</html>