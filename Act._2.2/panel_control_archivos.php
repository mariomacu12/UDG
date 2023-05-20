<?php session_start();

if (!isset($_SESSION['usuario_id'])){
    header('Location: inicio_sesion.php');
    
    } else {
        require 'vistas/panel_control_archivos.vista.php';

        try {
            $conexion = new PDO('mysql:host=localhost;dbname=Curso_UDG', 'root', '');
        
            $statement = $conexion->prepare('SELECT * FROM archivos WHERE usuario_id = :usuario_id');
            $statement->execute(array(
                    ':usuario_id' => $_SESSION['usuario_id'],
                
                ));
        
                $resultado = $statement->fetch();

                print_r($resultado);
                    
                if ($resultado) {
                echo "<ul>";
                 foreach ($resultado as $valor) {
                echo "<li>$valor</li>";
                }
                echo "<ul>";
               
    
                }  else {
                    echo "este usuario no tiene archivos";
                }
        
        
          
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    }












?>