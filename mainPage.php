<?php 
    

    include 'phpFunction2.php';      //bring an external file
    //literally copies the content of the external into the page at this point.
    //if it can' the file, the prgram continues. Missing content may cause future problems.

    require 'phpFunction2.php';       //does the same thing
    //if it can't find the file this will end the program! fatal error of file is not found.


?>