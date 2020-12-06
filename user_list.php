<!doctype html>
<html class="fixed search-results">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Timeline | Okler Themes | Porto-Admin</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>

</head>
    <?php
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
            <header class="page-header">
                <h2>Utenti registrati</h2>
            </header>

            <div class="search-content">
                <div class="search-control-wrapper">
                    <form action="#">
                        <div class="col-md-9">
                        <div class="form-group">
                            <?php
                            $sql = "SELECT DISTINCT * FROM AgenziaClienti";
                            $result = mysqli_query($conn, $sql);

                            $utenti = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            mysqli_free_result($result);

                            mysqli_close($conn);
                            ?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_text" id="search_text" placeholder="Cerca utente">
                                <span class="input-group-btn">
											<button class="btn btn-primary" type="button">Cerca</button>
                                </span>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div style="margin-top: -10px; overflow-y: auto; overflow-x: hidden;">
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector user_type" value="vende"> vende</label>
                            </div>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector user_type" value="cerca"> cerca</label>
                            </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="tab-content timeline">
                    <div id="everything" class="tab-pane active tm-body" style="margin-top: 80px;">
                        <div class="tm-title">
                            <h3 class="h5 text-uppercase"><?php echo count($utenti) ?> Clienti registrati</h3>
                        </div>
                        <ol class="list-unstyled search-results-list tm-items" id="result">
                        </ol>
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


</body>
</html>
