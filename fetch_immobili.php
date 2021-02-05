<?php
require("./config/session.php");
require("./config/connection.php");

$output = '';
$user_type = $_POST["user_type"];

$sql = "SELECT * FROM AgenziaImmobili INNER JOIN AgenziaClienti ON 
AgenziaClienti.id_cliente=AgenziaImmobili.id_cliente WHERE user_type='". $user_type ."'";


if(isset($_POST["action"])) {

    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["maximum_price"])) {
        $sql .= " AND ( prezzo BETWEEN " . $_POST["minimum_price"] . " AND " . $_POST["maximum_price"] . ") ";
    }

    if (isset($_POST["minimum_metratura"], $_POST["maximum_metratura"])  && !empty($_POST["maximum_metratura"])) {
        $sql .= " AND (metratura BETWEEN " . $_POST["minimum_metratura"] . " AND " . $_POST["maximum_metratura"] . ")";
    }

    if (isset($_POST["minimum_locali"], $_POST["maximum_locali"])  && !empty($_POST["maximum_locali"])) {
        $sql .= " AND (locali BETWEEN " . $_POST["minimum_locali"] . " AND " . $_POST["maximum_locali"] . ")";
    }

    if (isset($_POST["classe_energetica"])) {
        $classe_energetica = implode("','", $_POST["classe_energetica"]);
        $sql .= " AND (classe_energetica IN ('".$classe_energetica."'))";
    }

    if (isset($_POST["immobile_vendita_paese"])) {
        $immobile_vendita_paese = implode("','", $_POST["immobile_vendita_paese"]);
        $sql .= " AND (immobile_vendita_paese IN ('".$immobile_vendita_paese."'))";
    }

    if (isset($_POST["arredamento"])) {
        $arredamento = implode("','", $_POST["arredamento"]);
        $sql .= " AND (arredamento IN ('".$arredamento."'))";
    }

    if (isset($_POST["info_aggiuntive"])) {
        foreach ($_POST["info_aggiuntive"] as $info) {
        $sql .= " AND (".$info."=1)";
        }
    }


    $sql .= " ORDER BY id_immobile DESC";
}

$result = mysqli_query($conn, str_replace("*", "COUNT(*) as count", $sql));
$conteggio = mysqli_fetch_all($result, MYSQLI_ASSOC);
$output .= '
    <div>
        <p class="summary-text">Conteggio immobili: ' . $conteggio[0]['count'] . '</p>    
    </div>
';


$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    foreach($result as $immobile){
        if($immobile['disponibile']) {
            $titolo = strtoupper(htmlspecialchars($immobile['type_house']));
        }
        else {
            $titolo = '<strike>'.strtoupper(htmlspecialchars($immobile['type_house'])).'</strike>';
        }
        $localita = $immobile['immobile_ricerca_paesi'];
        if ($user_type == 'vende') {
            $localita=$immobile['immobile_vendita_paese'];
        }
        $output .= '
                                    <li>
                                        <a href="immobile_details.php?id=' . $immobile["id_immobile"] . '">
                                            <div class="result-data">
                                                <div class="row">
                                                <div class="col-md-8">
                                                <p class="h3 title text-primary"> ' . $titolo . ' </p>
                                                </div>
                                                <div class="col-md-4">
                                                <p class="h3 title text-primary" style="color:red !important"> ' . htmlspecialchars($immobile['prezzo']) . '&euro;</p>
                                                </div></div>
                                                <div class="fa-hover description"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;'. $localita . ' </div>
                                                <div class="fa-hover description"><i class="fa fa-superscript"></i>&nbsp;&nbsp;&nbsp;'. htmlspecialchars($immobile['metratura']). ' m<sup>2</sup> </div>
                                                <div class="fa-hover description"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;'. htmlspecialchars($immobile['locali']). ' </div>
                                                <div class="fa-hover description"><i class="fa  fa-photo"></i>&nbsp;&nbsp;&nbsp;'. htmlspecialchars($immobile['arredamento']). ' </div>
                                            </div>
                                        </a>
                                    </li>
    ';
    }
    echo $output;
}
else
{
    echo '
        <div>
        <p class="summary-text">Nessun immobile presente nel database</p>    
        </div>
        ';

}
?>
