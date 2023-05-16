<?php 

$conexion = mysqli_connect('localhost', 'root', '', 'galeria');

if(isset($_POST['guardar'])){
   $target_directory = "uploads/";
   $file = $_FILES['file']['name'];
   $target_file = $target_directory . basename($archivo);
   $temp = $_FILES['file']['tmp_name'];

 if(isset($file)){
    $consulta = "INSERT INTO archivos (archivo, directorio, titulo) VALUES ('$file', $target_file, '$titulo')";
    $resultado = mysqli_query($conexion, $consulta);

    
 if($resultado){
    move_uploaded_file($temp, 'backend/fotos' . $imagen);
   
}

 }
}


?>