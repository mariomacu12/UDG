<?php
// permitiendo acceso a la variable global $_SESSION
session_start();
// estos codigos muestran los errores
ini_set('display_errors', 1);
error_reporting(E_ALL);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
   
      $target_directory = $_SERVER['DOCUMENT_ROOT']."/uploads/"; // carpeta que va contener todos los archivos
      $target_file_path = $target_directory . basename($_FILES['file']['name']); //url (ubicacion unica del archivo)
      $tmp_path = $_FILES['file']['tmp_name']; // ubicacion donde el servidor guarda el archivo temporalmente
      $file_name = basename($_FILES['file']['name']);
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
      
         $id_user = $_SESSION['usuario_id'];
         
         try {
            $conexion = new PDO('mysql:host=localhost;dbname=Curso_UDG', 'root', '');
            echo "-----------\n";
            echo "user_id" . $id_user;
            echo "-----------\n";
            echo "target_file" . $target_file_path;
            echo "-----------\n";
            echo "file_name" . $file_name;


            $statement = $conexion->prepare('INSERT INTO archivos (id, archivo,  directorio, usuario_id) VALUES (null, :archivo, :directorio, :usuario_id)');
            $statement->execute(array(
                    
                     ':archivo' => $file_name,
                    ':directorio' => $target_file_path,
                    ':usuario_id' => $id_user, 
             ));
    
         //  Despues de registrar al usuario redirigimos para que inicie sesion.
          
    
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
      

      } else {
            echo "\nSorry, there was an error uploading your file.\n";
      }

     
}


?>