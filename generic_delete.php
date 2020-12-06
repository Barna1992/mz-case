<?php

include('./connection.php');

$sql = "DELETE FROM AgenziaMZ WHERE id='". $_GET["id"]."'";

if(mysqli_query($conn, $sql)) {
    header('Location: index.php');
}
else {
    echo 'query error: '.mysqli_error($conn);
}

?>
