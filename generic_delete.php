<?php

include('./connection.php');

$sql = "DELETE FROM AgenziaImmobili WHERE id_immobile='". $_GET["id"]."'";

if(mysqli_query($conn, $sql)) {
    header('Location: immobili_list.php');
}
else {
    echo 'query error: '.mysqli_error($conn);
}

?>
