<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>🏠 Gestionale Agenzia Immobiliare</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

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
<?php
    session_start();

    if (isset($_SESSION['session_id'])) {
        $session_user_email = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
        $session_user_first_name = htmlspecialchars($_SESSION['session_user_first_name'], ENT_QUOTES, 'UTF-8');
        $session_user_last_name = htmlspecialchars($_SESSION['session_user_last_name'], ENT_QUOTES, 'UTF-8');
        $session_id = htmlspecialchars($_SESSION['session_id']);
    } else {
        header('Location: login.php');
}?>