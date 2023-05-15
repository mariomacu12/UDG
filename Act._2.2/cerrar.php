<?php session_start();

session_destroy();
$_SESSION = array();

header('Location: inicio_sesion.php');
die();

?>