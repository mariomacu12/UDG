<?php session_start();
// checar si hay sesion seteada 
# Si hay sesion redirigimos al contenido.
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
    die();
	
}

    // Jalar datos del formulario de inicio_sesion (inicio_sesion.php)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = (strtolower($_POST['usuario']));
	$password = $_POST['password'];
  
	

	// Nos conectamos a la base de datos
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=Curso_UDG', 'root', '');
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
        $statement->execute(array(
                ':usuario' => $usuario,
                ':password' => $password
            ));
		
			$resultado = $statement->fetch();
			$user_id = $resultado['id'];
	
		if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		$_SESSION['ususario_id'] = $user_id;
		header('Location: index.php');
		
	} 

	

	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	
}

require 'vistas/inicio_sesion.vista.php';
?>