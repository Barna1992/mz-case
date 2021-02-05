<?php
    $host_name = 'db5001475179.hosting-data.io';
    $database = 'dbs1240444';
    $user_name = 'dbu1417662';
    $password = 'sWvujx6hhwipco1q#'; 
    $conn = new mysqli($host_name, $user_name, $password, $database);


    // Check connection
    if(!$conn){
        console_log(mysqli_connect_error());
        die("Errore, non posso connettermi al database. " . mysqli_connect_error());
    }
?>
