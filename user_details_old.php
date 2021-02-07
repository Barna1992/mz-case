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

        <section role="main" class="content-body" style="margin-left:0px">
            <?php if($utente): ?>
            <header class="page-header" style="left:0px">
                <h2>Profilo utente: <?php echo $utente['first_name'] .' '. $utente['last_name']; ?></h2>
            </header>
            <?php else: ?>
                <header class="page-header" style="left:0px">
                    <h2>Utente inesistente</h2>
                </header>
            <?php endif ?>
            <div class="tab-content">
            <div id="user_details" class="tab-pane active">

                <form class="form-horizontal" method="get">
                    <fieldset>
                        <div class="form-group">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <h3 class="mb-xlg">
                                    <?php if(!$utente['disponibile']) {
                                        echo '<strike><p>Informazioni Generali</p></strike>
                                                  <p class="text-danger">NON DISPONIBILE</p>';
                                    }
                                    else {
                                        echo 'Informazioni Generali';
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-top: 20px;">
                                <input type="button" onclick="location.href='index.php'" value="Indietro" class="btn btn-default"/>
                                <input type="button" onclick="location.href='user_update.php?id=<?php echo $_GET['id']; ?>'" value="Modifica" class="btn btn-default"/>
                                <input type="button" onclick="deleteWarning()" type="button" class="btn btn-danger" value="Elimina">
                            </div>
                        </div>
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
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
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
                                <p style="font-size: 16px; font-weight: bold">Riferimenti inviati:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <p style="font-size: 14px;"><?php echo $utente['rif_num_inviato']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Riferimenti visitati:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <p style="font-size: 14px;"><?php echo $utente['rif_num_visitato']; ?></p>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Metratura:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                <p style="font-size: 14px;">-->
<!--                                --><?php //if( $utente['metratura'] ) {
//                                    echo $utente['metratura'] . 'm<sup>2</sup>';
//                                } else {
//                                    echo '-';
//                                } ?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Anno:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                <p style="font-size: 14px;">-->
<!--                                --><?php //if( $utente['anno'] ) {
//                                    echo $utente['anno'];
//                                } else {
//                                    echo '-';
//                                } ?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Prezzo:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <p style="font-size: 14px;">
                                <?php if( $utente['prezzo'] ) {
                                    echo number_format($utente['prezzo'], 0, ',', '.');
                                } else {
                                    echo '-';
                                } ?>
                                </p>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Provvigione:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                <p style="font-size: 14px;">-->
<!--                                --><?php //if( $utente['provvigione'] ) {
//                                    echo $utente['provvigione'];
//                                } else {
//                                    echo '-';
//                                } ?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Numero di locali:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                <p style="font-size: 14px;">--><?php //echo $utente['locali'] ?><!--</p>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Numero di camere:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <p style="font-size: 14px;"><?php echo $utente['camere']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Numero di bagni:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <p style="font-size: 14px;"><?php echo $utente['bagni']; ?></p>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Classe Energetica:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                <p style="font-size: 14px;">-->
<!--                                --><?php //if( $utente['classe_energetica'] ) {
//                                    echo $utente['classe_energetica'];
//                                } else {
//                                    echo '-';
//                                } ?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
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
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Arredamento:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                <p style="font-size: 14px;">-->
<!--                                --><?php //if( $utente['arredamento'] ) {
//                                    echo $utente['arredamento'];
//                                } else {
//                                    echo '-';
//                                } ?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Posto Auto:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <?php if( $utente['pauto'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Garage:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <?php if( $utente['garage'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Giardino:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <?php if( $utente['giardino'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php } ?>
                            </div>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">-->
<!--                                <p style="font-size: 16px; font-weight: bold">Balcone:</p>-->
<!--                            </div>-->
<!--                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">-->
<!--                                --><?php //if( $utente['balcone'] ) { ?>
<!--                                    <i class="fa  fa-check" style="color:green"></i>-->
<!--                                --><?php //} else { ?>
<!--                                    <i class="fa  fa-times" style="color:red"></i>-->
<!--                                --><?php //}  ?>
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Terrazzo:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <?php if( $utente['terrazzo'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php } ?>
                            </div>
                        </div>
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
                        <div class="form-group">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <p style="font-size: 16px; font-weight: bold">Data di registrazione:</p>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <p style="font-size: 14px;"><?php echo $utente['reg_date']; ?></p>
                            </div>
                        </div>
                    </fieldset>
            </div>
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
