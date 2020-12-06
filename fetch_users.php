<?php

include('./connection.php');

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
    $sql = "SELECT * FROM AgenziaMZ";
}

if (isset($_POST["user_type"])) {
    $user_type = implode("','", $_POST["user_type"]);
    if( $_POST["query"] != '' ) {
        $sql .= " AND (user_type IN ('".$user_type."'))";
    }
    else {
        $sql .= " WHERE (user_type IN ('".$user_type."'))";
    }
}

$sql .= " ORDER BY id DESC ";
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
									<div class="tm-box">
										<div class="tm-meta">
											<a href="user_details.php?id='. $utente['id'] . '" style="display: flex;justify-content: space-between;">
											<span style="color:#34495e">
												<i class="fa fa-send" style="margin-right:1em; color: #0088cc"></i>'. $utente['email'] . ' <br><i class="fa fa-phone" style="margin-right:1em; color: #0088cc"></i> ' . $utente['telephone'] . '
											</span>
											<span style="color:#34495e">
												<i class="fa fa-eur" style="margin-right:1em; color: #0088cc"></i>'. $utente['prezzo'] . ' <br><i class="fa fa-map-marker" style="margin-right:1em; color: #0088cc"></i> ' . $utente['immobile_vendita_paese'] . '
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
