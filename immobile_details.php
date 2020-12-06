<?php
include('./connection.php');
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM AgenziaImmobili INNER JOIN AgenziaClienti ON AgenziaClienti.id_cliente=AgenziaImmobili.id_cliente
 WHERE id_immobile = $id";
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

        <section role="main" class="content-body">
            <?php if($immobile): ?>
                <header class="page-header">
                    <h2>Appartamento riferito a <?php echo $immobile['first_name'] .' '. $immobile['last_name']?></h2>
                </header>
            <?php else: ?>
                <header class="page-header">
                    <h2>Appartamento inesistente</h2>
                </header>
            <?php endif ?>
            <div class="tab-content">
                <div id="user_details" class="tab-pane active">

                    <form class="form-horizontal" method="get">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-9">
                                    <h4 class="mb-xlg">
                                        <?php if(!$immobile['disponibile']) {
                                            echo '<strike><p>Informazioni Appartamento</p></strike>
                                                  <p class="text-danger">NON DISPONIBILE</p>  
                                                 ';
                                            }
                                            else {
                                                echo 'Informazioni Appartamento';
                                            }
                                        ?>
                                    </h4>
                                </div>
                                <div class="col-md-3">
                                    <input type="button" onclick="location.href='immobile_update.php?id=<?php echo $_GET['id'] ?>'" value="Modifica" />
                                    <a type="button" onclick="deleteWarning()" href='generic_delete.php?id=<?php echo $_GET['id'] ?>'>
                                        <input type="button" value="Elimina" />
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php if($immobile['user_type'] == 'vende') { ?>
                                    <div class="col-md-4">
                                        Località:
                                    </div>
                                    <div class="col-md-8">
                                        <?php echo $immobile['immobile_vendita_paese'] ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-md-4">
                                        Località di interesse:
                                    </div>
                                    <div class="col-md-8">
                                        <?php echo $immobile['immobile_ricerca_paesi'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Metratura:
                                </div>
                                <div class="col-md-8">
                                    <?php echo $immobile['metratura'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Prezzo:
                                </div>
                                <div class="col-md-8">
                                    <?php echo $immobile['prezzo'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Numero di locali:
                                </div>
                                <div class="col-md-8">
                                    <?php echo $immobile['locali'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Classe Energetica:
                                </div>
                                <div class="col-md-8">
                                    <?php echo $immobile['classe_energetica'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Descrizione ulteriore:
                                </div>
                                <div class="col-md-8">
                                    <?php echo $immobile['description'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Arredamento:
                                </div>
                                <div class="col-md-8">
                                    <?php echo $immobile['arredamento'] ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Garage:
                                </div>
                                <div class="col-md-8">
                                    <?php if( $immobile['garage'] ) { ?>
                                    <i class="fa  fa-check-square-o"></i>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Giardino:
                                </div>
                                <div class="col-md-8">
                                    <?php if( $immobile['giardino'] ) { ?>
                                        <i class="fa  fa-check-square-o"></i>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Balcone:
                                </div>
                                <div class="col-md-8">
                                    <?php if( $immobile['balcone'] ) { ?>
                                        <i class="fa  fa-check-square-o"></i>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    Terrazzo:
                                </div>
                                <div class="col-md-8">
                                    <?php if( $immobile['terrazzo'] ) { ?>
                                        <i class="fa  fa-check-square-o"></i>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <?php if($immobile['user_type'] == 'vende') { ?>
                                    Proprietario:
                                    <?php } else { ?>
                                    Acquirente interessato:
                                    <?php } ?>
                                </div>
                                <div class="col-md-8">
                                    <a href="user_details.php?id=<?php echo $immobile["id_cliente"] ?>"><?php echo $immobile['first_name'] . ' '. $immobile['last_name'] ?></a>
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
        confirm("Attenzione, se elimini l'immobile corrente, verrà eliminato anche l'utente associato <?php echo $immobile['first_name'] . " " . $immobile['last_name'] ?> ");
    }
</script>

</body>
</html>
