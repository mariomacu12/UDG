<?php
date_default_timezone_set('America/Mexico_City');
$tiempo = 90*60*24*60+time();

setcookie( 'ultimo_inicio', date("G:i - m/d/y"), $tiempo);


if (isset($_COOKIE['ultimo_inicio']) ) {
	$visita = $_COOKIE['ultimo_inicio'];

} else {
	echo "nada";
}

?>

<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario'])) {

	
	

require 'vistas/contenido.vista.php';

	
} else {
	header('Location: inicio_sesion.php');
	die();
}
?>