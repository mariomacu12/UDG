<?php
require 'vistas/registro.vista.php';

// recibiendo el post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
	$email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
	$password = $_POST['password'];

    $json = json_encode($_POST);

    // mi carpeta de usuarios
    $target_directory = $_SERVER['DOCUMENT_ROOT']."/usuarios/";
    // archivo para el json
    $archivo_path = $target_directory.'usuarios.json';

    // creando la carpeta de usuarios
    if (!file_exists($target_directory)){
        mkdir($target_directory, 0777);
     }

    // Si ya existen los usuarios, solo agrego este sin borrar los otros

    // escribiendo el archivo
    file_put_contents($archivo_path, $json);
}
?>
