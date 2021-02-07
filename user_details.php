<?php
require("./config/session.php");
require("./config/connection.php");
?>
<!doctype html>
<html class="fixed search-results">
<?php
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM AgenziaMZ WHERE id = " . $id;
    $result = mysqli_query($conn, $sql);
    $utente = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}

include('./head.html');
?>
<body>
<section class="body">

    <?php include('./header.php'); ?>

    <div class="inner-wrapper">

        <section role="main" class="content-body" style="margin-left:0px; margin-top: 20px">
            <?php if($utente): ?>
            <header class="page-header" style="left:0px">
                <h2>Profilo utente: <?php echo $utente['first_name'] .' '. $utente['last_name']; ?></h2>
            </header>
            <?php else: ?>
                <header class="page-header" style="left:0px">
                    <h2>Utente inesistente</h2>
                </header>
            <?php endif ?>
            <div class="col-lg-offset-9 col-md-offset-9 col-sm-offset-9 col-xs-offset-9 col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-top: 20px;">
                <input type="button" onclick="location.href='index.php'" value="Indietro" class="btn btn-default"/>
                <input type="button" onclick="location.href='user_update.php?id=<?php echo $_GET['id']; ?>'" value="Modifica" class="btn btn-default"/>
                <input type="button" onclick="deleteWarning()" type="button" class="btn btn-danger" value="Elimina">
            </div>
            <hr class="dotted tall">

                <div class="col-md-8 col-lg-6 col-lg-offset-1">
                                <form class="form-horizontal" method="get">
                                    <h4 class="mb-xlg">Informazioni Generali</h4>
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Nome:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <p style="font-size: 14px;"><?php echo $utente['first_name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Cognome:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <p style="font-size: 14px;"><?php echo $utente['last_name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">email:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <p style="font-size: 14px;"><?php echo $utente['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Telefono:</p>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <p style="font-size: 14px;"><?php echo $utente['telephone']; ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Località:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <p style="font-size: 14px;">
                                                    <?php if( $utente['immobile_ricerca_paesi'] ) {
                                                        echo $utente['immobile_ricerca_paesi'];
                                                    } else {
                                                        echo '-';
                                                    } ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Tipologia:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <p style="font-size: 14px;">
                                                    <?php if( $utente['type_house'] ) {
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
                                                        $tipologia_lista = '';
                                                        foreach( $nomi as $nome ) {
                                                            if ( in_array($nome, $tipologia )) {
                                                                $tipologia_lista .=  $nomi_dict[$nome] . ',';
                                                            }
                                                        }
                                                        echo rtrim($tipologia_lista, ',');
                                                    } else {
                                                        echo '-';
                                                    } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr class="dotted tall">
                                    <h4 class="mb-xlg">Descrizione ulteriore</h4>
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Descrizione ulteriore:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <p style="font-size: 14px;">
                                                    <?php if( $utente['description'] ) {
                                                        echo nl2br($utente['description']);
                                                    } else {
                                                        echo '-';
                                                    } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr class="dotted tall">
                                    <h4 class="mb-xlg">Documentazione</h4>
                                    <fieldset class="mb-xl">
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Privacy:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <?php
                                                $uploadDir = './uploads';
                                                $new_dir_path = $uploadDir . DIRECTORY_SEPARATOR . $_GET['id'] . DIRECTORY_SEPARATOR . 'privacy';
                                                if ( is_dir($new_dir_path) ) {
                                                    $files = scandir($new_dir_path);
                                                    $firstFile = $new_dir_path . DIRECTORY_SEPARATOR . $files[2];

                                                    if( is_dir($new_dir_path)  ) { ?>
                                                        <i class="fa fa-file-pdf-o"></i><a href="<?php echo $firstFile; ?>" download="<?php echo $files[2]; ?>"><?php echo $files[2]; ?></a></i>
                                                        <i id="delete_privacy" class="fa fa-scissors" style="margin-left: 5px; color:red; font-weight: bold"></i>
                                                    <?php } else {
                                                        echo '-';
                                                    }
                                                } else {
                                                    echo '-';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <p style="font-size: 16px; font-weight: bold">Foglio di visita:</p>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <?php
                                                $uploadDir = './uploads';
                                                $new_dir_path = $uploadDir . DIRECTORY_SEPARATOR . $_GET['id'] . DIRECTORY_SEPARATOR . 'visita';
                                                if ( is_dir($new_dir_path) ) {
                                                    $files = scandir($new_dir_path);
                                                    $firstFile = $new_dir_path . DIRECTORY_SEPARATOR . $files[2];

                                                    if(is_dir($new_dir_path)) { ?>
                                                        <i class="fa fa-file-pdf-o"></i><a href="<?php echo $firstFile; ?>" download="<?php echo $files[2]; ?>"><?php echo $files[2]; ?></a>
                                                        <i id="delete_visita" class="fa fa-scissors" style="margin-left: 5px; color:red; font-weight: bold"></i>
                                                    <?php } else {
                                                        echo '-';
                                                    }
                                                } else {
                                                    echo '-';
                                                }?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                </div>
                <div class="col-md-12 col-lg-3">
                    <h4 class="mb-md">Altre informazioni</h4>
                    <ul class="simple-card-list mb-xlg">
                        <li class="primary">
                            <h3>
                                <?php if( $utente['prezzo'] ) {
                                    echo number_format($utente['prezzo'], 0, ',', '.') . ' &#8364';
                                } else {
                                    echo '-';
                                } ?>
                            </h3>
                            <p>Prezzo</p>
                        </li>
                        <li class="primary">
                            <h3>
                                <?php if( $utente['camere'] ) {
                                    echo number_format($utente['camere'], 0, ',', '.');
                                } else {
                                    echo '-';
                                } ?>
                            </h3>
                            <p>Camere</p>
                        </li>
                        <li class="primary">
                            <h3>
                                <?php if( $utente['bagni'] ) {
                                    echo number_format($utente['bagni'], 0, ',', '.') ;
                                } else {
                                    echo '-';
                                } ?>
                            </h3>
                            <p>Bagni</p>
                        </li>
                        <li class="primary">
                            <h3><?php echo $utente['rif_num_visitato'] ? $utente['rif_num_visitato'] : '-'; ?></h3>
                            <p>Riferimenti visitati</p>
                        </li>

                        <li class="primary">
                            <h3><?php echo $utente['rif_num_inviato'] ? $utente['rif_num_inviato'] : '-'; ?></h3>
                            <p>Riferimenti inviati</p>
                        </li>
                    </ul>

                    <h4 class="mb-md">Informazioni aggiuntive</h4>
                    <ul class="simple-bullet-list mb-xlg">
                        <li class="<?php
                                $classColor = $utente['pauto'] ? 'green' : 'red';
                                echo $classColor;
                            ?>">
                            <span class="title">Posto Auto</span>
                        </li>
                        <li class="<?php
                                $classColor = $utente['garage'] ? 'green' : 'red';
                                echo $classColor;
                            ?>">
                            <span class="title">Garage</span>
                        </li>
                        <li class="<?php
                                $classColor = $utente['giardino'] ? 'green' : 'red';
                                echo $classColor;
                            ?>">
                            <span class="title">Giardino</span>
                        </li>
                        <li class="<?php
                                $classColor = $utente['terrazzo'] ? 'green' : 'red';
                                echo $classColor;
                            ?>">
                            <span class="title">Terrazzo</span>
                        </li>
                    </ul>
                </div>
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
    $('#delete_privacy').click( () => {
        console.log('delete privacy')
        deletePrivacyWarning()
    });
    $('#delete_visita').click( () => {
        console.log('delete visita')
        deleteVisitaWarning()
    });
    const urlParams = new URLSearchParams(window.location.search);
    const uid = urlParams.get('id');
    function deleteWarning() {
        var r = confirm("Sei sicuro di volere eliminare questo elemento?\n" );
        if ( r ) {
            var urlParams = new URLSearchParams(window.location.search);
            window.location.href = `generic_delete.php?id=${urlParams.get('id')}`;
        }
    }
    function deletePrivacyWarning() {
        var r = confirm("Sei sicuro di volere eliminare l'allegato Privacy?\n" );
        if ( r ) {
            $.ajax(
                {
                    url:"delete_updated_file.php",
                    method:"POST",
                    data:{'id':uid, 'folder':'privacy'},
                    success: (() => {
                        window.location.reload();
                    })
                }
            )
        }
    }
    function deleteVisitaWarning() {
        var r = confirm("Sei sicuro di volere eliminare l'allegato Foglio di visita?\n" );
        if ( r ) {
            $.ajax(
                {
                    url:"delete_updated_file.php",
                    method:"POST",
                    data:{'id':uid, 'folder':'visita'},
                    success: ( () => {
                        window.location.reload();
                    })
                }
            )
        }
    }
</script>
</body>
</html>
