<?php
   $server="localhost";
    $username="james";
    $password="james";
    $database="client";

    //create connection

$con = new mysqli($server, $username, $password, $database);

if(!$con){
    die("Connection failed" . mysqli_connect_error());
}


?>
