<?php

    $dbserver = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $database = "linkshort";

    $connect = new mysqli($dbserver, $dbuser, $dbpassword, $database); //connect the database

    // if(!$connect) {
    //     echo "no connection";
    // } else {
    //     echo "connection!!!!!";
    // }

?>