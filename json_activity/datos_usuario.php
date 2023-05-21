<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    $pdf->Output($nombre.'.pdf','D');
}
function crearWord($nombre, $email, $fecha_nacimiento){
    echo 'Word';
}
function crearExcel($nombre, $email, $fecha_nacimiento){
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$nombre.'.xlsx"');

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Datos del Usuario');
    $sheet->setCellValue('A3', 'Nombre');
    $sheet->setCellValue('B3', $nombre);
    $sheet->setCellValue('A4', 'Email');
    $sheet->setCellValue('B4', $email);
    $sheet->setCellValue('A5', 'Fecha de Nacimiento');
    $sheet->setCellValue('B5', $fecha_nacimiento);
    $writer = new Xlsx($spreadsheet);
    ob_end_clean();
    $writer->save('php://output');
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