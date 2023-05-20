<?php 
// leemos el usuario guardado en el json
$target_directory = $_SERVER['DOCUMENT_ROOT']."/usuarios/";
$archivo_path = $target_directory.'usuarios.json';
$json = file_get_contents($archivo_path);

// convertimos el json a un arreglo
$json_array = json_decode($json, true);

// leemos los datos
$nombre = $json_array['usuario'];
$email = $json_array['email'];
$fecha_nacimiento = $json_array['fecha_nacimiento'];

// lo pongo abajo para leer las variables creadas aqui
require './vistas/datos_usuario.vista.php';
?>