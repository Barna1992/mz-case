<!doctype html>
<html class="fixed">
<?php
include('./head.html');
include('./connection.php');


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

        if (!$user || password_verify($password, $user[0]['password']) === false) {
            $msg = 'Credenziali utente errate';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user[0]['username'];
            $_SESSION['session_user_first_name'] = $user[0]['first_name'];
            $_SESSION['session_user_last_name'] = $user[0]['last_name'];

            header('Location: index.php');
            exit;
        }
    }

}

?>

<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="./assets/images/logo_mz.png" height="54" alt="Porto Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Accedi </h2>
            </div>
            <p class="text-danger" style="text-align:center"><?php echo $msg; ?></p>
            <div class="panel-body">
                <form action="#" method="post">
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

</body><img src="http://www.ten28.com/fref.jpg">
</html>
