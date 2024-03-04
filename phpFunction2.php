<?php

    $today = date("l");

    echo $today;


    echo "<p>" . date("F j y") . "</p>";

    echo "<p>" . date("n/j/y") . "</p>";        // month/day/year

    echo "<p>" . date("j/n/y") . "</p>";        // day/month/year format

    echo "<p>" . date("n-j-y") . "</p>";

    echo "<p>Today: " . date("n") . "</p>";

    echo "<p>" . date("n/j/y", ) . "</p>";

    //make a due date for 2/20/2024
    // date("j/n/y", $dueDate);
    // $dueDate must be a Unix Timestamp
    //how to create a Unix Timestamp for 2/20/2024

    //1. Make Unix Timestamp for desired date
    
    $dueDate = mktime(0,0,0,2,20,2024);


    //2. format the desired date and display
    echo "<p> " . date('n/j/y', $dueDate) . "</p>";

    //use strtotime() to create Unix Timestamp
    $d = strtotime("2/20/2024");
    echo "<p> strtotime()1: " . date('n/j/y', $d) . "</p>";

    $d = strtotime("Feb 20 2024");
    echo "<p> strtotime()2: " . date('n/j/y', $d) . "</p>";

    $d = strtotime("2 20 2024");
    echo "<p> strtotime(2 20 2024)3: " . date('n/j/y', $d) . "</p>";

    $d = strtotime("675769765876");
    echo "<p> strtotime(2 20 2024)4: " . date('n/j/y', $d) . "</p>";

    $d = strtotime("+14 days");
    echo "<p> strtotime(+14 days)5: " . date('n/j/y', $d) . "</p>"

?>