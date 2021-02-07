<?php
require("./config/session.php");
require("./config/connection.php");

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM AgenziaMZ WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $utente = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
<!doctype html>
<html class="fixed search-results">
<?php include('./head.html'); ?>
<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

<body>
<section class="body">

    <?php include('./header.php'); ?>

    <div class="inner-wrapper" >


        <form id="update_form" name="update_form" role="main" class="content-body" method="post" action="process.php" style="margin-left:0px" enctype="multipart/form-data">
            <?php if($utente): ?>
                <header class="page-header" style="left:0px">
                    <h2>Appartamento riferito a <?php echo $utente['first_name'] .' '. $utente['last_name']; ?></h2>
                </header>
            <?php else: ?>
                <header class="page-header" style="left:0px">
                    <h2>Appartamento inesistente</h2>
                </header>
            <?php endif ?>
            <div id="w4-profile" class="tab-pane">
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="first_name">Nome</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $utente['first_name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="last_name">Cognome</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $utente['last_name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="email">email</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $utente['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="telephone">Telefono</label>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo $utente['telephone']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputSuccess">Tipologia:</label>
                    <div class="col-md-6">
                        <?php
                        $tipologia = explode(",",$utente['type_house']);

                        $nomi = array('albergo', 'attivita','appartamenti', 'rustici', 'box', 'ville');
                        $nomi_dict = array(
                            "albergo" => "Albergo",
                            "appartamenti" => "Appartamenti",
                            "attivita" => "Attivit&agrave",
                            "rustici" => "Rustici / cascine / case",
                            "box" => "Box / posti auto",
                            "ville" => "Ville",
                        );

                        sort($nomi);
                        foreach($nomi as $nome) {
                            if(in_array($nome, $tipologia)) {
                                echo '
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="'.$nome.'" name="type_house[]" class="info-aggiuntive" checked>
                                        '.$nomi_dict[$nome].'
                                    </label>
                                </div>
                                ';
                            }
                            else {
                                echo '
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="'.$nome.'" name="type_house[]" class="info-aggiuntive">
                                        '.$nomi_dict[$nome].'
                                    </label>
                                </div>
                                ';
                            }
                        }
                        ?>
                    </div>
                </div>
                    <?php if( !empty($utente['immobile_vendita_paese'])) { ?>
                    <div class="form-group" id="div_immobile_vendita_paese">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="immobile_vendita_paese">Località</label>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <select class="form-control" name="immobile_vendita_paese" id="immobile_vendita_paese" required>
                                <option value="Borca">Borca</option>
                                <option value="Cortina">Cortina</option>
                                <option value="San Vito">San Vito</option>
                                <option value="Valle">Valle</option>
                                <option value="Vodo">Vodo</option>
                            </select>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="form-group" id="div_immobile_ricerca_paese">
                        <label class="col-md-3 control-label" for="inputSuccess">Paesi di interesse:</label>
                        <div class="col-md-6">
                            <?php
                            $paesi_scelti = explode(",",$utente['immobile_ricerca_paesi']);
                            $paesi = array('Borca', 'Cortina','San Vito', 'Valle', 'Vodo');

                            sort($paesi);
                            foreach($paesi as $paese) {
                                if(in_array($paese, $paesi_scelti)) {
                                    echo '
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="'.$paese.'" name="immobile_ricerca_paesi[]" class="info-aggiuntive" checked>
                                        '.$paese.'
                                    </label>
                                </div>
                                ';
                                }
                                else {
                                    echo '
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="'.$paese.'" name="immobile_ricerca_paesi[]" class="info-aggiuntive">
                                        '.$paese.'
                                    </label>
                                </div>
                                ';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="rif_num_inviato">Riferimenti inviati</label>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <input type="text" class="form-control" name="rif_num_inviato" id="rif_num_inviato" value="<?php echo $utente['rif_num_inviato']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="rif_num_visitato">Riferimenti visitati</label>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <input type="text" class="form-control" name="rif_num_visitato" id="rif_num_visitato" value="<?php echo $utente['rif_num_visitato']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="prezzo">Prezzo</label>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <input type="text" class="form-control" name="prezzo" id="prezzo" value="<?php
                                if ($utente['prezzo']) {
                                    echo number_format($utente['prezzo'], 0, ',', '.');
                                }
                                else {
                                    echo '';
                                }
                            ?>">
                        </div>
                        <span>&#8364;</span>
                    </div>

                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="camere">Numero di camere</label>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <select class="form-control" name="camere" id="camere">
                            <option value="">----</option>
                            <?php
                            for($i = 1; $i <= 10; $i++) {
                                echo $utente['camere'];
                                if( intval($i) == intval($utente['camere'])){
                                    echo '<option selected="selected" value="' . $i . '">' . $i . '</option>';
                                }
                                else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="bagni">Numero di bagni</label>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <select class="form-control" name="bagni" id="bagni">
                            <option value="">----</option>
                            <?php
                            for($i = 1; $i <= 10; $i++) {
                                echo $utente['bagni'];
                                if( intval($i) == intval($utente['bagni'])){
                                    echo '<option selected="selected" value="' . $i . '">' . $i . '</option>';
                                }
                                else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                    <div class="form-group">
                        <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="description">Descrizione</label>
                        <div class="col-md-9">
                            <textarea form="update_form" class="form-control" rows="3" id="description" name="description" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;" ><?php echo $utente['description'] ?></textarea>
                        </div>
                    </div>


<!--                faccio vedere i campi solo se non trovo la cartella privacy o la cartella visita-->
                <?php
                $uploadDir = './uploads';
                $new_dir_path_privacy = $uploadDir . DIRECTORY_SEPARATOR . $_GET['id'] . DIRECTORY_SEPARATOR . 'privacy';
                if (!is_dir($new_dir_path_privacy)) {?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Privacy</label>
                        <div class="col-md-6">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                                                    <span class="fileupload-exists">Cambia</span>
                                                                    <span class="fileupload-new">Seleziona File</span>
                                                                    <input type="file" name="privacy_file" accept="image/jpeg,image/gif,image/png,application/pdf">

                                                                </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Rimuovi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $uploadDir = './uploads';
                $new_dir_path_visita = $uploadDir . DIRECTORY_SEPARATOR . $_GET['id'] . DIRECTORY_SEPARATOR . 'visita';
                if (!is_dir($new_dir_path_visita)) {
                     ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Foglio di visita</label>
                        <div class="col-md-6">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                                                    <span class="fileupload-exists">Cambia</span>
                                                                    <span class="fileupload-new">Seleziona File</span>
                                                                    <input type="file" name="visita_file" accept="image/jpeg,image/gif,image/png,application/pdf">

                                                                </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Rimuovi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Informazioni aggiuntive</label>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="pauto" name="pauto" class="info-aggiuntive"
                                        <?php if($utente['pauto']) { echo 'checked'; }?>
                                    >
                                    Posto auto
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="garage" name="garage" class="info-aggiuntive"
                                    <?php if($utente['garage']) { echo 'checked'; }?>
                                    >
                                    Garage
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="giardino" name="giardino" class="info-aggiuntive"
                                        <?php if($utente['giardino']) { echo 'checked'; }?>
                                    >
                                    Giardino
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="terrazzo" name="terrazzo" class="info-aggiuntive"
                                        <?php if($utente['terrazzo']) { echo 'checked'; }?>
                                    >
                                    Terrazzo
                                </label>
                            </div>
                            <div class="checkbox" style="display: none">
                                <label>
                                    <input type="checkbox" value="disponibile" name="disponibile" class="info-aggiuntive"
                                        <?php if($utente['disponibile']) { echo 'checked'; }?>
                                    >
                                    Disponibile
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $_GET['id']; ?>">
            <div class="panel-footer">
                <ul class="pager">
                    <li class="finish pull-right salva-form">
                        <input type="submit" class="salva-form-hidden" value="Salva">
                    </li>
                </ul>
            </div>
        </form>
</section>
    </div>
</section>
<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Specific Page Vendor -->
<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script>
    <?php if( !empty($utente['immobile_vendita_paese'])) { ?>
    document.getElementById('immobile_vendita_paese').value='<?php echo $utente['immobile_vendita_paese']; ?>';
    <?php } else { } ?>
</script>
</body>
</html>
