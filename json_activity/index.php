<?php 
// agrego la vista de login
require './vistas/login.vista.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo 'RECIBI POST\n';
   echo json_encode($_POST);
}
?>