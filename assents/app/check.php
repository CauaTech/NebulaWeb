<?php 
session_start();
if (!isset($_SESSION['login'])) {
	session_destroy();
	header('Location:'.$flow.'?account_error');
}
if (isset($_GET['logout'])) {
	session_destroy();
	header('Location:'.$flow);
}


?>