<?php session_start();
// checar si hay sesion seteada, si hay redirigimos a contenido.php y matamos ejecicion de la pag

if (isset($_SESSION['usuario'])){
header('Location: contenido.php');

} else {
// redirigir al usuario al formulario de registro (regitrate.php)
header('Location: registrate.php ');
}
