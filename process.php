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
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $whole_name = $first_name . ' ' . $last_name;
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $telephone = mysqli_real_escape_string($conn, $_POST["telephone"]);
    $user_type = mysqli_real_escape_string($conn, $_POST["user_type"]);
    $birthdate = '2020-01-01';
    $rif_num = mysqli_real_escape_string($conn, $_POST["rif_num"]);
    $rif_num_visitato = mysqli_real_escape_string($conn, $_POST["rif_num_visitato"]);
    $rif_num_inviato = mysqli_real_escape_string($conn, $_POST["rif_num_inviato"]);
    $immobile_vendita_paese = mysqli_real_escape_string($conn, $_POST["immobile_vendita_paese"]);
    if (isset($_POST["immobile_ricerca_paesi"])) {
        $immobile_vendita_paese = NULL;
    }
    $list = array();
    $list_tipologia = array();
    $immobile_ricerca_paesi = '';
    if(isset($_POST["immobile_ricerca_paesi"]) && !empty($_POST["immobile_ricerca_paesi"])){
        foreach ($_POST["immobile_ricerca_paesi"] as $key => $value) {
            $list[] = "$value";
        }
        $immobile_ricerca_paesi = implode(",", $list);
    }
    $type_house = '';
    if (isset($_POST["type_house"]) && !empty($_POST["type_house"])) {
        foreach ($_POST["type_house"] as $key => $value) {
            $list_tipologia[] = "$value";
        }
        $type_house = implode(",", $list_tipologia);
    }
    $metratura = mysqli_real_escape_string($conn, $_POST["metratura"]);
    $anno = mysqli_real_escape_string($conn, $_POST["anno"]);
    $prezzo = str_replace(".", "", mysqli_real_escape_string($conn, $_POST["prezzo"]));
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
  garage, giardino, balcone, terrazzo, disponibile, rif_num_visitato, rif_num_inviato) VALUES (
'$first_name', '$last_name', '$whole_name', '$birthdate', '$email', '$telephone','$user_type',
'$type_house', '$rif_num', '$immobile_vendita_paese', '$immobile_ricerca_paesi', '$metratura', '$anno',
 '$prezzo', '$provvigione', '$locali', '$camere', '$bagni', '$classe_energetica', '$description', '$arredamento',
  '$pauto','$garage','$giardino', '$balcone', '$terrazzo','$disponibile', '$rif_num_visitato', '$rif_num_inviato')";
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
        terrazzo=".$terrazzo.", disponibile=".$disponibile.", rif_num_visitato='".$rif_num_visitato."',
        rif_num_inviato='".$rif_num_inviato."' WHERE id='$id'";
    }
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


    $uploadDir = './uploads';


    if(isset($_FILES['privacy_file'])){
        if (UPLOAD_ERR_OK === $_FILES['privacy_file']['error']) {
            $fileName = $_FILES['privacy_file']['name'];
            $new_dir_path = $uploadDir . DIRECTORY_SEPARATOR . $last_id . DIRECTORY_SEPARATOR . 'privacy';
            echo $new_dir_path;
            if (!file_exists($new_dir_path)) {
                mkdir($new_dir_path, 0777, true);
            }
            move_uploaded_file($_FILES['privacy_file']['tmp_name'], $new_dir_path . DIRECTORY_SEPARATOR . $fileName);
        }
    }


    if(isset($_FILES['visita_file'])){
        if (UPLOAD_ERR_OK === $_FILES['visita_file']['error']) {
            $fileName = $_FILES['visita_file']['name'];
            $new_dir_path = $uploadDir . DIRECTORY_SEPARATOR . $last_id . DIRECTORY_SEPARATOR . 'visita';
            echo $new_dir_path;
            if (!file_exists($new_dir_path)) {
                mkdir($new_dir_path, 0777, true);
            }
            move_uploaded_file($_FILES['visita_file']['tmp_name'], $new_dir_path . DIRECTORY_SEPARATOR . $fileName);
        }
    }

?>
