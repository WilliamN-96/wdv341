<?php 

    //function that converts timestamp to the mm/dd/yyyy format.
    function usDate($intoday){
        $today= strtotime("3/14/2024");
        return date('n/j/y', $today);
    }

    //function that converts timestamp to the dd/mm/yyy format.
    function internationalDate($intoday){
        $today= strtotime("3/14/2024");
        return date('j/n/y',$today);
    }

    //function that counts the characters in the string.
    function stringCount($innewstring){

        echo trim($innewstring);

        echo mb_strlen($innewstring);

        echo strtolower($innewstring);

        if (strpos($innewstring, "DMACC"));{

        return $innewstring;
        
        }
    }
    function formatNumber1($innumber1){

        $output = '(' . substr($innumber1, 0, 3) . ')' . substr($innumber1, 3, 3). "-" . substr($innumber1, 6, 9);

        return $output;
    }
    
    
    function formatNumber2($innumber2){

        $currencyNumber = '$' . number_format($innumber2, 2);

        return $currencyNumber;

    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Example of functions in PHP</h1>

    <h2>This function takes the date input and displays it in a different format.</h2>
    <p>
        Formatting the timestamp into mm/dd/yyyy.
    </p>
    <p>The formatted date is: <?php echo usDate("3/14/2024"); ?></p>

    <p>
        Formatting timestamp into dd/mm/yyyy.
    </p>
    <p>The formated date is: <?php echo internationalDate("3/14/2024"); ?></p>

    <p>
        Count the number of characters in the String.
    </p>
    <p>the number of chracters in the string: <?php echo stringCount(" This is a String, DMACC is a college. "); ?></p>
    <p>
        This function formats a number passed to a phone number format.
    </p>
    <p>The formatted phone number: <?php echo "+1" . formatNumber1(1234567890); ?></p>
    <p>
        This function formats a number into US Currency.
    </p>
    <p>The formatted number: <?php echo formatNumber2(123456); ?></p>
</body>
</html>