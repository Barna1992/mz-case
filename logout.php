<?php

session_start();

if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);
    unset($_SESSION['session_user']);
    unset($_SESSION['session_user_last_name']);
    unset($_SESSION['session_user_first_name']);
}
header('Location: login.php');
exit;

?>