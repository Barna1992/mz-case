<?php
require("./config/session.php");
require("./config/connection.php");

function convertCheckBox($value) {
    if (empty($value)) {
        $value = 0;
    }
    else {
        $value = 1;
    }
    return $value;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST["immobile_id"]);
    $type_house = mysqli_real_escape_string($conn, $_POST["type_house"]);
    $rif_num = mysqli_real_escape_string($conn, $_POST["rif_num"]);
    $immobile_vendita_paese = mysqli_real_escape_string($conn, $_POST["immobile_vendita_paese"]);
    if (isset($_POST["immobile_ricerca_paesi"])) {
        $immobile_vendita_paese = NULL;
    }
    $immobile_ricerca_paesi = '';
    if (isset($_POST["immobile_ricerca_paesi"])) {
        $list = array();
        foreach ($_POST["immobile_ricerca_paesi"] as $key => $value) {
            $list[] = "$value";
        }
        $immobile_ricerca_paesi = implode(", ", $list);
    }
    $metratura = mysqli_real_escape_string($conn, $_POST["metratura"]);
    $prezzo = mysqli_real_escape_string($conn, $_POST["prezzo"]);
    $locali = mysqli_real_escape_string($conn, $_POST["locali"]);
    $classe_energetica = mysqli_real_escape_string($conn, $_POST["classe_energetica"]);
    $description = '';
    if (isset($_POST["description"])) {
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
    }
    $arredamento = mysqli_real_escape_string($conn, $_POST["arredamento"]);
    $garage = '';
    if (isset($_POST["garage"])) {
        $garage = mysqli_real_escape_string($conn, $_POST["garage"]);
    }
    $garage = convertCheckBox($garage);
    $giardino = '';
    if (isset($_POST["giardino"])) {
        $giardino = mysqli_real_escape_string($conn, $_POST["giardino"]);
    }
    $giardino = convertCheckBox($giardino);
    $balcone = '';
    if (isset($_POST["balcone"])) {
        $balcone = mysqli_real_escape_string($conn, $_POST["balcone"]);
    }
    $balcone = convertCheckBox($balcone);
    $terrazzo = '';
    if (isset($_POST["terrazzo"])) {
        $terrazzo = mysqli_real_escape_string($conn, $_POST["terrazzo"]);
    }
    $terrazzo = convertCheckBox($terrazzo);
    $disponibile=convertCheckBox($_POST["disponibile"]);
    $sql = "UPDATE AgenziaImmobili SET type_house='".$type_house."', rif_num='".$rif_num."', immobile_vendita_paese='".$immobile_vendita_paese."',
     immobile_ricerca_paesi='".$immobile_ricerca_paesi."', metratura='".$metratura."', 
    prezzo='".$prezzo."', locali='".$locali."', classe_energetica='".$classe_energetica."', description='".$description."',
     arredamento='".$arredamento."', garage=".$garage.", giardino=".$giardino.", balcone=".$balcone.",
      terrazzo=".$terrazzo.", disponibile=".$disponibile." WHERE id_immobile=".$id." ";
}

    if(mysqli_query($conn, $sql)) {
        header('Location: immobile_details.php?id='. $id);
    }
    else {
        echo 'query error: '.mysqli_error($conn);
    }

?>
