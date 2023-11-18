<?php 
    
    $hostname = "localhost";
    $dbname="auth-sys";
    $user = "root";
    $passw ="";

    $conn = new PDO("mysql:host=$hostname;dbname=$dbname;",$user,$passw);

    if(!$conn){
        echo "connection is wrong" ;
    }
?>