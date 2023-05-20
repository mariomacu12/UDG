<?php
require 'vistas/registro.vista.php';

// recibiendo el post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // leo los datos
    $usuario = $_POST['usuario'];
	$email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
	$password = $_POST['password'];

    try {
        // guardo los datos en la BD
        $conexion = new PDO('mysql:host=localhost;dbname=Curso_UDG', 'root', '');
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, email, fecha_nacimiento, pass) VALUES (null, :usuario,  :email, :fecha_nacimiento, :pass)');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':email' => $email,
            ':fecha_nacimiento' => $fecha_nacimiento,
            ':pass' => $password
        ));

        // Despues de registrar al usuario redirigimos para que inicie sesion.
        header('Location: index.php');
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
}
?>
