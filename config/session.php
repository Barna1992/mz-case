<?php
session_start();

if (isset($_SESSION['session_id'])) {
	$session_user_email = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
	$session_user_first_name = htmlspecialchars($_SESSION['session_user_first_name'], ENT_QUOTES, 'UTF-8');
	$session_user_last_name = htmlspecialchars($_SESSION['session_user_last_name'], ENT_QUOTES, 'UTF-8');
	$session_id = htmlspecialchars($_SESSION['session_id']);

} else {
	header('Location: login.php');
}
?>