<?php 

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

$arreglo = array("nombre" => $nombre, "apellido" => $apellido, "edad" => $edad);




if(file_exists('personas.json', 'w')){
$contenido = file_get_contents('personas.json');
$datos = json_decode($contenido);
array_push($datos, $arreglo);
file_put_contents('personas.json', json_encode($datos));
} else {
$datos = array();
array_push($datos, $arreglo);
$fopen = fopen("personas.json", "w");
fwrite($fopen, json_encode($datos));
fclose($fopen);

}


?>