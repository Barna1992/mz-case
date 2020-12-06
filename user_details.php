<?php
    include('./connection.php');
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

        <section role="main" class="content-body">
            <?php if($utente): ?>
            <header class="page-header">
                <h2>Profilo utente: <?php echo $utente['first_name'] .' '. $utente['last_name']?></h2>
            </header>
            <?php else: ?>
                <header class="page-header">
                    <h2>Utente inesistente</h2>
                </header>
            <?php endif ?>
            <div class="tab-content">
            <div id="user_details" class="tab-pane active">

                <form class="form-horizontal" method="get">
                    <fieldset>
                        <div class="form-group">
                            <div class="col-md-9">
                                <h4 class="mb-xlg">
                                    <?php if(!$utente['disponibile']) {
                                        echo '<strike><p>Informazioni Generali</p></strike>
                                                  <p class="text-danger">NON DISPONIBILE</p>  
                                                 ';
                                    }
                                    else {
                                        echo 'Informazioni Generali';
                                    }
                                    ?>
                                </h4>
                            </div>
                            <div class="col-md-3">
                                <input type="button" onclick="location.href='user_update.php?id=<?php echo $_GET['id'] ?>'" value="Modifica" />
                                <input type="button" onclick="deleteWarning()" type="button" value="Elimina">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Nome:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['first_name'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Cognome:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['last_name'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                email:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['email'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Telefono:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['telephone'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-4">
                                    Località:
                                </div>
                                <div class="col-md-8">
                                    <?php if( $utente['immobile_vendita_paese'] ) {
                                        echo $utente['immobile_vendita_paese'];
                                    } else {
                                        echo '-';
                                    } ?>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Metratura:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['metratura'] ) {
                                    echo $utente['metratura'] . 'm<sup>2</sup>';
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Anno:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['anno'] ) {
                                    echo $utente['anno'];
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Prezzo:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['prezzo'] ) {
                                    echo $utente['prezzo'];
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Provvigione:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['provvigione'] ) {
                                    echo $utente['provvigione'];
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Numero di locali:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['locali'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Numero di camere:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['camere'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Numero di bagni:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['bagni'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Classe Energetica:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['classe_energetica'] ) {
                                    echo $utente['classe_energetica'];
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Descrizione ulteriore:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['description'] ) {
                                    echo $utente['description'];
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Arredamento:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['arredamento'] ) {
                                    echo $utente['arredamento'];
                                } else {
                                    echo '-';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Posto Auto:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['pauto'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Garage:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['garage'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Giardino:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['giardino'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Balcone:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['balcone'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Terrazzo:
                            </div>
                            <div class="col-md-8">
                                <?php if( $utente['terrazzo'] ) { ?>
                                    <i class="fa  fa-check" style="color:green"></i>
                                <?php } else { ?>
                                    <i class="fa  fa-times" style="color:red"></i>
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                Data di registrazione:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['reg_date'] ?>
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
    function deleteWarning() {
        var r = confirm("Sei sicuro di volere eliminare questo elemento?\n" +
            "In alternativa puoi archiviarlo andando in modifica e selezionando la voce 'non disponibile'. ");
        if ( r ) {
            var urlParams = new URLSearchParams(window.location.search);
            window.location.href = `generic_delete.php?id=${urlParams.get('id')}`;
        }
    }
</script>
</body>
</html>
