<?php

    require("extras/mysql.php"); //connect to the database

    $destination = $_GET["d"]; //get the destination id

    /**
     * use mysqli to retrive destination link from database
     */
    $geturl = "select * from urls where name = '$destination'";
    $urlresult = mysqli_query($connect, $geturl) or die(mysqli_error());

    $urldetails = mysqli_fetch_array($urlresult);

    if(mysqli_num_rows($urlresult) == 1) {

        header("Refresh: 5; " . $urldetails['url']); 

    }
        
    ?>

    <!-- document body starts here -->
<!DOCTYPE html>
<html>
    <head>
        <title>Redirecting</title> <!-- document title -->

        <link rel="stylesheet" href="extras/styles.css"> <!-- assign stylesheet file -->
    </head>
    <!-- end head of document -->

        <div id="loader" onload="loader()"></div>

        <!-- import all .js scripts here -->
        <script type="text/javascript" src="extras/scripts.js" defer></script>
    </body>
</html>