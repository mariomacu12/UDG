<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
   
      $target_directory = $_SERVER['DOCUMENT_ROOT']."/uploads/"; // carpeta que va contener todos los archivos
      $target_file_path = $target_directory . basename($_FILES['file']['name']); //url (ubicacion unica del archivo)
      $tmp_path = $_FILES['file']['tmp_name']; // ubicacion donde el servidor guarda el archivo temporalmente
      // \n salto de linea
      // echo "ERROR ".$_FILES['file']['error']; // checando si hubo un error, ver codigos en: https://www.php.net/manual/en/features.file-upload.errors.php
      echo $tmp_path;

      // asegurandose que exista la carpeta donde se va guardar
      if (!file_exists($target_directory)){
         echo "CREANDO carpeta destino\n";
         mkdir($target_directory, 0777);
         
      }
      
      // guardando el archivo y checando que si se guardo
      if(move_uploaded_file($tmp_path, $target_file_path)){
         echo "\nThe file has been uploaded successfully.\n";
      } else {
            echo "\nSorry, there was an error uploading your file.\n";
      }
            
            










     

   
   //  if(isset($file)){
   //     $consulta = "INSERT INTO archivos (archivo, directorio, titulo) VALUES ('$file', $target_file, '$titulo')";
   //     $resultado = mysqli_query($conn, $consulta);
   
       
   //  if($resultado){
   //     move_uploaded_file($temp, 'backend/fotos' . $imagen);
   //     $Mensaje = "tu imagen ha sido cargada con exito";
   //     header('Location:../index.subir.php');
   // }
   
   //  }
}


?>