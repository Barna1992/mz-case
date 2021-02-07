<?php
require("./config/session.php");
require("./config/connection.php");

$output = '';

if( $_POST["query"] != '')
{
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $sql = "
      SELECT * FROM AgenziaMZ 
      WHERE whole_name LIKE '%".$search."%'
     ";
}
else
{
    $sql = "SELECT * FROM AgenziaMZ WHERE user_type='". $_POST["user_type"] ."'";
}

if (isset($_POST["action"])) {
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["maximum_price"])) {
        $sql .= " AND ( prezzo BETWEEN " . $_POST["minimum_price"] . " AND " . $_POST["maximum_price"] . ") ";
    }

    if (isset($_POST["minimum_camere"], $_POST["maximum_camere"])  && !empty($_POST["maximum_camere"])) {
        $sql .= " AND (camere BETWEEN " . $_POST["minimum_camere"] . " AND " . $_POST["maximum_camere"] . ")";
    }

    if (isset($_POST["minimum_bagni"], $_POST["maximum_bagni"])  && !empty($_POST["maximum_bagni"])) {
        $sql .= " AND (bagni BETWEEN " . $_POST["minimum_bagni"] . " AND " . $_POST["maximum_bagni"] . ")";
    }

    if (isset($_POST["immobile_vendita_paese"])) {
        $immobile_vendita_paese = implode("','", $_POST["immobile_vendita_paese"]);
        $sql .= " AND (immobile_vendita_paese IN ('".$immobile_vendita_paese."'))";
    }


    if (isset($_POST["paesi_scelti"]) && $_POST["paesi_scelti"]) {
        $sql .= " AND (immobile_ricerca_paesi LIKE '%".$_POST["paesi_scelti"]."%')";
    }

    if (isset($_POST["info_aggiuntive"])) {
        foreach ($_POST["info_aggiuntive"] as $info) {
            $sql .= " AND (".$info."=1)";
        }
    }


}

if (isset($_POST["ordering"])) {
    if($_POST["ordering"]=='datainserimento') {
        $sql .= " ORDER BY id DESC ";
    }
    else {
        $sql .= " ORDER BY whole_name ASC ";
    }
}
else {
    $sql .= " ORDER BY id DESC ";
}

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{

    foreach($result as $utente){
        $output .= '
        						<li style="border-bottom: none">
									<div class="tm-info">
										<div class="tm-icon"><i class="fa fa-user"></i></div>
										<time class="tm-datetime">
											<div class="tm-datetime-date">Nominativo:</div>
											<div class="tm-datetime-time">' . strtoupper(htmlspecialchars($utente['first_name']) . "<br>" . strtoupper($utente['last_name'])) . '</div>
									</time>
									</div>
									<div class="tm-box" style="margin-left: 3vw;">
										<div class="tm-meta">
											<a href="user_details.php?id='. $utente['id'] . '" style="display: flex;justify-content: space-between;">
											<span style="color:#34495e">
												<i class="fa fa-send" style="margin-right:1em; color: #0088cc"></i>'. $utente['email'] . ' <br><i class="fa fa-phone" style="margin-right:1em; color: #0088cc"></i> ' . $utente['telephone'] . '
											</span>
											<span style="color:#34495e">
												<i class="fa fa-eur" style="margin-right:1em; color: #0088cc"></i>'. number_format(floatval($utente['prezzo']), 0, ',', '.') . ' <br><i class="fa fa-map-marker" style="margin-right:1em; color: #0088cc"></i> ' . $utente['immobile_ricerca_paesi'] . '
											</span>											
											</a>
										</div>
									</div>
								</li>
    ';
    }
    echo $output;
}

else
{
    echo 'Nessun utente presente nel database';
}
?>
