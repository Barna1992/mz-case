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


        <section role="main" class="content-body" style="margin-left:0px">
            <header class="page-header" style="left:0px">
                <h2>Clienti registrati</h2>
            </header>

            <div class="search-content">
                <div class="search-control-wrapper">
                    <form action="#">
                        <div class="col-md-7 col-md-offset-1">
                        <div class="form-group">
                            <?php
                            $sql = "SELECT DISTINCT * FROM AgenziaMZ";
                            $result = mysqli_query($conn, $sql);

                            $utenti = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            mysqli_free_result($result);

                            ?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_text" id="search_text" placeholder="Cerca per nome o cognome...">
                                <span class="input-group-btn">
											<button class="btn btn-primary" type="button">Cerca</button>
                                </span>
                            </div>
                        </div>
                        </div>
                    </form>

                </div>

                <div class="tab-content timeline">
                    <div id="everything" class="tab-pane active tm-body" style="margin-top: 80px;">
                        <div class="col-md-8">
                            <div class="tm-title">
                                <h3 class="h5 text-uppercase"><?php echo count($utenti) ?> Clienti registrati</h3>
                            </div>
                            <ol class="list-unstyled search-results-list tm-items" id="result">
                            </ol>
                            <br/>
                            <br/>
                            <br/>
                        </div>
                        <?php
                            include('./filter.php');
                        ?>
                    </div>
                </div>
            </div>
            <!-- end: page -->
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
<script src="assets/javascripts/forms/user_searchbar.js"></script>

<!-- Specific Page Vendor -->
<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>


<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script src="assets/javascripts/forms/user_searchbar.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



</body>
</html>
