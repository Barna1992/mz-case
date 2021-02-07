<?php
require('./config/db.php');
$conn = mysqli_connect('localhost', 'root', 'segaiolo', 'agenzia_immobiliare');

// Check connection
if(!$conn){
	die("Errore, non posso connettermi al database. " . mysqli_connect_error());
}
?>
