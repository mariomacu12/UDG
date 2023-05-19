<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
   
      $target_directory = "uploads/"; // carpeta que va contener todos los archivos
      $file_name = $_FILES['file']['name']; // nombre del archivo que llego en el request
      $target_file_path = $target_directory . basename($_FILES['file']['name']); //url (ubicacion unica del archivo)
      $tmp_path = $_FILES['file']['tmp_name']; // ubicacion donde el servidor guarda el archivo temporalmente
   
      // comprobamos si la carpeta "uploads" existe, si no existe se crea una carpeta nueva
      print_r($target_directory);
      echo "---------------";
      print_r($target_file_path);
      

      // asegurandose que exista la carpeta donde se va guardar
      if (!file_exists($target_directory)){
         mkdir($target_directory, 0777);
      }
      // guardando el archivo y checando que si se guardo
            if(move_uploaded_file($temp_path, $target_file_path)){
               echo "The file has been uploaded successfully.";
            } else {
                echo "Sorry, there was an error uploading your file.";
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