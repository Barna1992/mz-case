<!doctype html>
<html class="fixed">
<?php
    include('./head.html');
    include('./connection.php');
?>

<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="assets/images/logo.png" height="54" alt="Porto Admin" />
        </a>
        <?php
        if (isset($_POST['register'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $first_name = $_POST['first_name'] ?? '';
            $last_name = $_POST['last_name'] ?? '';

            $isUsernameValid = true;
            $pwdLenght = mb_strlen($password);
        }

        ?>
        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
            </div>
            <?php
            if (isset($_POST['register'])) {
                if (empty($username) || empty($password) || empty($first_name) || empty($last_name)) {
                    $msg = 'Compila tutti i campi';
                } elseif (false === $isUsernameValid) {
                    $msg = 'Lo username non è valido. Sono ammessi solamente caratteri 
                    alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                    Lunghezza massima 20 caratteri';
                } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
                    $msg = 'Lunghezza minima password 8 caratteri.
                    Lunghezza massima 20 caratteri';
                } elseif ($_POST['pwd'] !== $password) {
                    $msg = 'Le due password non corrispondono';
                } else {
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    $sql = "
                SELECT id
                FROM AgenziaUtenti
                WHERE username = '" . $username . "'
                ";

                    $result = mysqli_query($conn, $sql);

                    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);;

                    if (count($user) > 0) {
                        $msg = 'Username già in uso';
                    } else {
                        $sql = "
                    INSERT INTO AgenziaUtenti (username, first_name, last_name, password)
                    VALUES ('" . $username . "', '" . $first_name . "', '" . $last_name . "', '" . $password_hash . "')
                    ";
                        if (mysqli_query($conn, $sql)) {
                            header('Location: login.php');
                        } else {
                            echo 'query error: ' . mysqli_error($conn);
                        }
                    }
                }
            }?>
            <p class="text-danger" style="text-align:center"><?php echo $msg; ?></p>
            <div class="panel-body">
                <form method="post" action="#">
                    <div class="form-group mb-lg">
                        <label>Nome</label>
                        <input name="first_name" type="text" class="form-control input-lg" />
                    </div>
                    <div class="form-group mb-lg">
                        <label>Cognome</label>
                        <input name="last_name" type="text" class="form-control input-lg" />
                    </div>

                    <div class="form-group mb-lg">
                        <label>E-mail Address</label>
                        <input name="username" type="email" class="form-control input-lg" />
                    </div>

                    <div class="form-group mb-none">
                        <div class="row">
                            <div class="col-sm-6 mb-lg">
                                <label>Password</label>
                                <input name="pwd" type="password" class="form-control input-lg" />
                            </div>
                            <div class="col-sm-6 mb-lg">
                                <label>Password Confirmation</label>
                                <input name="password" type="password" class="form-control input-lg" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" name="register" class="btn btn-primary hidden-xs">Registrati</button>
                            <button type="submit" name="register" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Registrati</button>
                        </div>
                    </div>

                    <p class="text-center">Hai già un account? <a href="login.php">Accedi!</a>

                </form>
            </div>
        </div>

    </div>
</section>
<!-- end: page -->

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
