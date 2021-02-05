<?php
    require('./config/db.php');
    $host_name = HOST;
    $database = DATABASE;
    $user_name = USER;
    $password = PASSWORD; 
    $conn = new mysqli($host_name, $user_name, $password, $database);

    // Check connection
    if(!$conn){
        die("Errore, non posso connettermi al database. " . mysqli_connect_error());
    }
?>
