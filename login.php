<?php
require("./config/connection.php");

session_start();

if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}

$msg = ''; 
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ( empty($username) ) {
        $msg = 'Inserisci lo username';
    } elseif ( empty($password) ) {
        $msg = 'Inserisci la password';
    } else {
        $sql = "
            SELECT username, password, first_name, last_name
            FROM AgenziaUtenti
            WHERE username = '".$username."'
        ";

        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($user && password_verify($password, $user[0]['password']) === true) {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user[0]['username'];
            $_SESSION['session_user_first_name'] = $user[0]['first_name'];
            $_SESSION['session_user_last_name'] = $user[0]['last_name'];

            header('Location: index.php');
            exit;
        } else {
            $msg = 'Credenziali utente errate';
        }
    }

}

?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>🏠 Gestionale Agenzia Immobiliare</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="./assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="./assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="./assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="./assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="./assets/vendor/morris/morris.css" />
    <link rel="stylesheet" href="./assets/vendor/dropzone/css/basic.css" />
    <link rel="stylesheet" href="./assets/vendor/dropzone/css/dropzone.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="./assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="./assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="./assets/vendor/modernizr/modernizr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .summary-text {
            text-align: center;
            margin-top: 20px;
            font-size: 20px;
        }
    </style>
</head>

<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="#" class="logo pull-left">
            <img src="./assets/images/logo_mz.png" height="54" alt="Mz-Case" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Accedi </h2>
            </div>
            <p class="text-danger" style="text-align:center"><?php echo $msg; ?></p>
            <div class="panel-body">
                <form action="./login.php" method="post">
                    <div class="form-group mb-lg">
                        <label>Username</label>
                        <div class="input-group input-group-icon">
                            <input name="username" type="text" class="form-control input-lg" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                        </div>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">

                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" name="login" class="btn btn-primary hidden-xs">Accedi</button>
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Accedi</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="./assets/vendor/jquery/jquery.js"></script>
<script src="./assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="./assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="./assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="./assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="./assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="./assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="./assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="./assets/javascripts/theme.init.js"></script>

</body>
</html>