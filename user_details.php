<?php
    include('./connection.php');
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM AgenziaClienti WHERE id_cliente = $id";
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
                    <h4 class="mb-xlg">Informazioni Generali</h4>
                    <fieldset>
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
                                Tipologia di utente:
                            </div>
                            <div class="col-md-8">
                                <?php echo $utente['user_type'] ?>
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
                        <div class="form-group">
                            <div class="col-md-4">
                                Modulo privacy:
                            </div>
                            <div class="col-md-8">
                                <?php
                                $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';
                                $new_dir_path = $uploadDir . DIRECTORY_SEPARATOR . $_GET['id'] . DIRECTORY_SEPARATOR . 'privacy';
                                if(is_dir($new_dir_path)) { ?>
                                <i class="fa fa-file-pdf-o"></i><a href="<?php echo DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_GET['id'] . DIRECTORY_SEPARATOR . 'privacy' . DIRECTORY_SEPARATOR . $_GET['id'] . '_privacy.pdf'; ?>" download="newfilename">modulo privacy</a>
                                <?php } ?>
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

</body>
</html>
