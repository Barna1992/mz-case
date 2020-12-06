<?php
include('./connection.php');
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM AgenziaImmobili WHERE id_immobile = $id";
    $result = mysqli_query($conn, $sql);
    $immobile = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
<!doctype html>
<html class="fixed search-results">
<?php
include('./head.html');
include('./connection.php');
?>
<body>
<section class="body">

    <?php
    include('./header.php');
    ?>

    <div class="inner-wrapper">

        <?php
        include('./sidebar.html');
        ?>

        <form id="immobile_update_form" name="immobile_update_form" role="main" class="content-body" method="post" action="process_immobile_update.php">
            <?php if($immobile): ?>
                <header class="page-header">
                    <h2>Appartamento riferito a <?php echo $immobile['first_name'] .' '. $immobile['last_name']?></h2>
                </header>
            <?php else: ?>
                <header class="page-header">
                    <h2>Appartamento inesistente</h2>
                </header>
            <?php endif ?>
            <div id="w4-profile" class="tab-pane">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputSuccess">Tipologia</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="type_house" id="type_house" required>
                                <option value="appartamento">Appartamenti</option>
                                <option value="villa">Ville</option>
                                <option value="rustico">Rustici / cascine / case</option>
                                <option value="box">Box / posti auto</option>
                                <option value="terreno">Terreno</option>
                            </select>
                        </div>
                    </div>
                    <?php if( !empty($immobile['immobile_vendita_paese'])) { ?>
                    <div class="form-group" id="div_immobile_vendita_paese">
                        <label class="col-sm-3 control-label" for="immobile_vendita_paese">Paese</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="immobile_vendita_paese" id="immobile_vendita_paese" required>
                                <optgroup label="Borca">
                                    <option value="Borca">Borca</option>
                                </optgroup>
                                <optgroup label="Cortina">
                                    <option value="Alvera">Alverà</option>
                                    <option value="Cadin">Cadin</option>
                                    <option value="Cortina">Cortina</option>
                                    <option value="Fiammes">Fiammes</option>
                                    <option value="Pocol">Pocol</option>
                                    <option value="Zuel">Zuel</option>
                                </optgroup>
                                <optgroup label="San Vito">
                                    <option value="Dogana Vecchia">Dogana Vecchia</option>
                                    <option value="San Vito">San Vito</option>
                                    <option value="Serdes">Serdes</option>
                                </optgroup>
                                <optgroup label="Valle">
                                    <option value="Valle">Valle</option>
                                    <option value="Venas">Venas</option>
                                </optgroup>
                                <optgroup label="Vodo">
                                    <option value="Vodo">Vodo</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="form-group" id="div_immobile_ricerca_paese">
                        <label class="col-md-3 control-label" for="inputSuccess">Paesi di interesse:</label>
                        <div class="col-md-6">
                            <?php
                            $paesi = array('Borca', 'Alverà', 'Cadin', 'Cortina', 'Fiammes', 'Pocol', 'Zuel', 'Dogana Vecchia',
                                'San Vito', 'Serdes', 'Valle', 'Venas', 'Vodo');
                            sort($paesi);
                            foreach($paesi as $paese) {
                                echo '
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="'.$paese.'" name="immobile_ricerca_paesi[]" class="info-aggiuntive">
                                        '.$paese.'
                                    </label>
                                </div>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="rif_num">Rif Num</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="rif_num" id="rif_num" value="<?php echo $immobile['rif_num'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="metratura">Metratura</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="metratura" id="metratura" value="<?php echo $immobile['metratura'] ?>">
                        </div>
                        m<sup>2</sup>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="prezzo">Prezzo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="prezzo" id="prezzo" value="<?php echo $immobile['prezzo'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="locali">Numero di locali</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="locali" id="locali">
                                <option value="">----</option>
                                <?php
                                for($i = 1; $i <= 10; $i++) {
                                    echo $immobile['locali'];
                                    if( intval($i) == intval($immobile['locali'])){
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
                        <label class="col-sm-3 control-label" for="classe_energetica">Classe energetica</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="classe_energetica" id="classe_energetica">
                                <option value="">----</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                                <option value="f">F</option>
                                <option value="g">G</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="descrizione">Descrizione</label>
                        <div class="col-md-9">
                            <textarea form="immobile_update_form" class="form-control" rows="3" id="descrizione" name="descrizione" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;" ><?php echo $immobile['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="arredamento">Arredamento</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="arredamento" id="arredamento">
                                <option value="arredato">Arredato</option>
                                <option value="non arredato">Non arredato</option>
                                <option value="parzialmente arredato">Parzialmente arredato</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Informazioni aggiuntive</label>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="garage" name="garage" class="info-aggiuntive"
                                    <?php if($immobile['garage']) { echo 'checked'; }?>
                                    >
                                    Garage
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="giardino" name="giardino" class="info-aggiuntive"
                                        <?php if($immobile['giardino']) { echo 'checked'; }?>
                                    >
                                    Giardino
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="balcone" name="balcone" class="info-aggiuntive"
                                        <?php if($immobile['balcone']) { echo 'checked'; }?>
                                    >
                                    Balcone
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="terrazzo" name="terrazzo" class="info-aggiuntive"
                                        <?php if($immobile['terrazzo']) { echo 'checked'; }?>
                                    >
                                    Terrazzo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="disponibile" name="disponibile" class="info-aggiuntive"
                                        <?php if($immobile['disponibile']) { echo 'checked'; }?>
                                    >
                                    Disponibile
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <input type="hidden" class="form-control" name="immobile_id" id="immobile_id" value="<?php echo $_GET['id'] ?>">
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

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script>
    document.getElementById('type_house').value='<?php echo $immobile['type_house']?>';
    document.getElementById('locali').selectedIndex=<?php echo $immobile['locali']?>;
    document.getElementById('classe_energetica').value='<?php echo $immobile['classe_energetica']?>';
    document.getElementById('arredamento').value='<?php echo $immobile['arredamento']?>';
    <?php if( !empty($immobile['immobile_vendita_paese'])) { ?>
    document.getElementById('immobile_vendita_paese').value='<?php echo $immobile['immobile_vendita_paese']?>';
    <?php } else { ?>
    <?php } ?>
</script>
</body>
</html>
