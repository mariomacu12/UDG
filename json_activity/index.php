<?php 
// agrego la vista de login
require './vistas/login.vista.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
	$password = $_POST['password'];
   
    // Nos conectamos a la base de datos
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=Curso_UDG', 'root', '');
        $statement = $conexion->prepare('SELECT id,usuario,email,fecha_nacimiento FROM usuarios WHERE usuario = :usuario AND pass = :password');
        $statement->execute(array( ':usuario' => $usuario, ':password' => $password ));
        $resultado = $statement->fetch();
        print_r($resultado);
		
        // Existe?
        if ($resultado) {
            $json = json_encode($resultado);

            // mi carpeta de usuarios
            $target_directory = $_SERVER['DOCUMENT_ROOT']."/usuarios/";
            // archivo para el json
            $archivo_path = $target_directory.'usuarios.json';

            // creando la carpeta de usuarios
            if (!file_exists($target_directory)){
                mkdir($target_directory, 0777);
             }

            // escribiendo el archivo
            file_put_contents($archivo_path, $json);
            
            // mandando a que se vean los datos
            header('Location: datos_usuario.php');
        } else {
                echo 'Ups usuario desconocido';
        }
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}
  
}
?>