<?php
session_start();

// estos codigos muestran los errores
ini_set('display_errors', 1);
error_reporting(E_ALL);




	$datosSesion = $_SESSION;

	// Convertir el array en formato en string
	$json = json_encode($datosSesion); 

	if($json){

	$nombreArchivo = 'datos.json';
	$rutaCarpeta = $_SERVER['DOCUMENT_ROOT']."/json/";
	$permisos = 0777;
	
	}
   // Establecer los permisos de escritura en la carpeta
if (is_dir($rutaCarpeta)) {
    chmod($rutaCarpeta, $permisos);

	$nombreArchivo = 'datos.json';
	file_put_contents($nombreArchivo, $json);
    echo 'Permisos establecidos correctamente en la carpeta.';
} else {
    echo 'La carpeta no existe.';
}



	

	

	

?>
	


	?>


	





