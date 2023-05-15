<?php session_start();
// checar si hay sesion seteada, si hay redirigimos a index.php
if($_SESSION['usuario']){
    header('Location: index.php');
    die();
}

// Jalar datos del formulario de registro (regsitarte.vista.php)
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    
    $usuario = $_POST['usuario'];
	$email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
	$password = $_POST['password'];

    




    try {
        $conexion = new PDO('mysql:host=localhost;dbname=Curso_UDG', 'root', '');

        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, email, fecha_nacimiento, pass) VALUES (null, :usuario,  :email, :fecha_nacimiento, :pass)');
	    $statement->execute(array(
				':usuario' => $usuario,
                ':email' => $email,
                ':fecha_nacimiento' => $fecha_nacimiento,
				':pass' => $password
			));

		// Despues de registrar al usuario redirigimos para que inicie sesion.
		header('Location: inicio_sesion.php');

    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
    

	
	}



require 'vistas/registrate.vista.php';
?>
