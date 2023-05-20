<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// leemos el usuario guardado en el json
$target_directory = $_SERVER['DOCUMENT_ROOT']."/usuarios/";
$archivo_path = $target_directory.'usuarios.json';
$json = file_get_contents($archivo_path);

// convertimos el json a un arreglo
$json_array = json_decode($json, true);

// leemos los datos
$nombre = $json_array['usuario'];
$email = $json_array['email'];
$fecha_nacimiento = $json_array['fecha_nacimiento'];

function crearPDF($nombre, $email, $fecha_nacimiento){
    echo 'PDF';

    $pdf = new TCPDF();
    $pdf->AddPage();
    // $pdf->Write(1, "Ejemplo documento PDF", '', false, 'C');
    $pdf->Write(2, "Datos del Usuario", '', false, 'C', true);
    $pdf->Write(4, "", '', false, 'C', true);
    $pdf->Write(1, "Nombre: ".$nombre, '', false, 'L', true);
    $pdf->Write(1, "E-mail: ".$email, '', false, 'L', true);
    $pdf->Write(1, "Fecha de Nacimiento: ".$fecha_nacimiento, '', false, 'L', true);
    $pdf->Close();
    ob_end_clean();
    $pdf->Output('Usuario.pdf','I');
}
function crearWord($nombre, $email, $fecha_nacimiento){
    echo 'Word';
}
function crearExcel($nombre, $email, $fecha_nacimiento){
    echo 'Excel';
}

if (isset($_POST['btnPDF'])) {
    crearPDF($nombre, $email, $fecha_nacimiento);
}
if (isset($_POST['btnWord'])) {
    crearWord($nombre, $email, $fecha_nacimiento);
}
if (isset($_POST['btnExcel'])) {
    crearExcel($nombre, $email, $fecha_nacimiento);
}

// lo pongo abajo para leer las variables creadas aqui
require './vistas/datos_usuario.vista.php';
?>