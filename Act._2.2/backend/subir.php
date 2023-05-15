<?php 

$conn = mysqli_connect('localhost', 'root', '', 'galeria');

if(isset($_POST['guardar'])){
 $imagen = $_FILES['imagen']['name'];
 $titulo = $_POST['titulo'];
 $temp = $_FILES['imagen']['tmp_name'];

 if(isset($imagen)){
    $consulta = "INSERT INTO fotos(imagen, titulo) VALUES ('$imagen', '$titulo')";
    $resultado = mysqli_query($conn, $consulta);

    
 if($resultado){
    move_uploaded_file($temp, 'backend/fotos' . $imagen);
    $Mensaje = "tu imagen ha sido cargada con exito";
    header('Location:../index.subir.php');
}

 }
}


?>