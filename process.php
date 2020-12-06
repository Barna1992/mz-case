<?php
include('./connection.php');

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
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $whole_name = $first_name . ' ' . $last_name;
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $user_type = mysqli_real_escape_string($conn, $_POST["user_type"]);
    $birthdate = '2020-01-01';
    $type_house = mysqli_real_escape_string($conn, $_POST["type_house"]);
    $rif_num = mysqli_real_escape_string($conn, $_POST["rif_num"]);
    $immobile_vendita_paese = mysqli_real_escape_string($conn, $_POST["immobile_vendita_paese"]);
    if (isset($_POST["immobile_ricerca_paesi"])) {
        $immobile_vendita_paese = NULL;
    }
    $list = array();
    foreach ($_POST["immobile_ricerca_paesi"] as $key => $value) {
        $list[] = "$value";
    }
    $immobile_ricerca_paesi = implode(", ", $list);
    $metratura = mysqli_real_escape_string($conn, $_POST["metratura"]);
    $anno = mysqli_real_escape_string($conn, $_POST["anno"]);
    $prezzo = mysqli_real_escape_string($conn, $_POST["prezzo"]);
    $provvigione = mysqli_real_escape_string($conn, $_POST["provvigione"]);
    $locali = mysqli_real_escape_string($conn, $_POST["locali"]);
    $camere = mysqli_real_escape_string($conn, $_POST["camere"]);
    $bagni = mysqli_real_escape_string($conn, $_POST["bagni"]);
    $classe_energetica = mysqli_real_escape_string($conn, $_POST["classe_energetica"]);
    $description = '';
    if (isset($_POST["description"])) {
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
    }
    $arredamento = mysqli_real_escape_string($conn, $_POST["arredamento"]);
    $pauto = '';
    if (isset($_POST["pauto"])) {
        $pauto = mysqli_real_escape_string($conn, $_POST["pauto"]);
    }
    $garage = '';
    if (isset($_POST["garage"])) {
        $garage = mysqli_real_escape_string($conn, $_POST["garage"]);
    }
    $giardino = '';
    if (isset($_POST["giardino"])) {
        $giardino = mysqli_real_escape_string($conn, $_POST["giardino"]);
    }
    $balcone = '';
    if (isset($_POST["balcone"])) {
        $balcone = mysqli_real_escape_string($conn, $_POST["balcone"]);
    }
    $terrazzo = '';
    if (isset($_POST["terrazzo"])) {
        $terrazzo = mysqli_real_escape_string($conn, $_POST["terrazzo"]);
    }
    $pauto = convertCheckBox($pauto);
    $garage = convertCheckBox($garage);
    $giardino = convertCheckBox($giardino);
    $terrazzo = convertCheckBox($terrazzo);
    $balcone = convertCheckBox($balcone);
    $disponibile = 1;

    if ( !isset($_POST["id"]) ) {
        $sql = "INSERT INTO AgenziaMZ (first_name, last_name, whole_name, birthdate, email, telephone, user_type,
                       type_house, rif_num, immobile_vendita_paese, immobile_ricerca_paesi,
 metratura, anno, prezzo, provvigione, locali, camere, bagni, classe_energetica, description, arredamento, pauto,
  garage, giardino, balcone, terrazzo, disponibile) VALUES (
'$first_name', '$last_name', '$whole_name', '$birthdate', '$email', '$telephone','$user_type',
'$type_house', '$rif_num', '$immobile_vendita_paese', '$immobile_ricerca_paesi', '$metratura', '$anno', 
 '$prezzo', '$provvigione', '$locali', '$camere', '$bagni', '$classe_energetica', '$description', '$arredamento',
  '$pauto','$garage','$giardino', '$balcone', '$terrazzo','$disponibile')";
    }
    else {
        $id =$_POST["id"];
        $sql = "UPDATE AgenziaMZ SET first_name='$first_name', last_name='$last_name',
        whole_name='$whole_name', birthdate='$birthdate', email='$email', telephone='$telephone', user_type='$user_type',
        type_house='".$type_house."', rif_num='".$rif_num."', immobile_vendita_paese='".$immobile_vendita_paese."',
        immobile_ricerca_paesi='".$immobile_ricerca_paesi."', metratura='".$metratura."', anno='".$anno."', 
        prezzo='".$prezzo."', provvigione='".$provvigione."', locali='".$locali."', camere='".$camere."', 
        bagni='".$bagni."', classe_energetica='".$classe_energetica."', description='".$description."',
        arredamento='".$arredamento."', pauto=".$pauto.", garage=".$garage.", giardino=".$giardino.", balcone=".$balcone.",
        terrazzo=".$terrazzo.", disponibile=".$disponibile." 
                     WHERE id='$id'";
    }
    echo $sql;
}
    if(mysqli_query($conn, $sql)) {
        if ( !isset($_POST["id"]) ) {
            $last_id = $conn->insert_id;
            header('Location: index.php');
        } else {
            $last_id = $_POST["id"];
            header('Location: user_details.php?id='. $last_id);
        }

    }
    else {
        echo 'query error: '.mysqli_error($conn);
    }

?>
