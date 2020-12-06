<?php
    require('./config/db.php');
    $conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    // Check connection
    if(!$conn){
        die("Errore, non posso connettermi al database. " . mysqli_connect_error());
    }
?>