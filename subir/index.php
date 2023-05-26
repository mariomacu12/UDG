<?php 
    require 'vistas/subir.vista.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $message = '';

        if($_FILES['archivo']['error'] == UPLOAD_ERR_OK){
            // Sin error

            // ubicacion temporal en el server
            $temp_name = $_FILES['archivo']['tmp_name'];
            $name  = basename($_FILES['archivo']['name']);

            // creando la carpeta de uploads si no existe
            $target_directory = $_SERVER['DOCUMENT_ROOT']."/uploads/";// mi carpeta de uploads
            if (!file_exists($target_directory)){
                mkdir($target_directory, 0777);
            }
            
            // movemos el archivo a la carpeta del server que elegimos
            if(move_uploaded_file($temp_name, $target_directory.$name)){
                echo $name." Cargado correctamente.";
            }else{
                // No se pudo mover
                echo 'Ocurrio un error al subir el archivo';
            }

        } else {
            echo 'Ocurrio un error al subir el archivo';
        }
    }
?>