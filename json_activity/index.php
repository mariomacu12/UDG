<?php 
// agrego la vista de login
require './vistas/login.vista.php';
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

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
            
            $nombre = $resultado['usuario'];
            $email = $resultado['email'];
            $fecha_nacimiento = $resultado['fecha_nacimiento'];

            // Escribiendo pdf
            $archivo_path = $target_directory.'usuarios.pdf';
            $pdf = new TCPDF();
            $pdf->AddPage();
            $pdf->Write(2, "Datos del Usuario", '', false, 'C', true);
            $pdf->Write(4, "", '', false, 'C', true);
            $pdf->Write(1, "Nombre: ".$nombre, '', false, 'L', true);
            $pdf->Write(1, "E-mail: ".$email, '', false, 'L', true);
            $pdf->Write(1, "Fecha de Nacimiento: ".$fecha_nacimiento, '', false, 'L', true);
            $pdf->Close();
            ob_end_clean();
            $pdf->Output($archivo_path,'F');

            // Escribiendo word
            $archivo_path = $target_directory.'usuarios.docx';
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            $section->addText('Datos del Usuario');
            $section->addText('');
            $section->addText('');
            $section->addText('Nombre:'.$nombre);
            $section->addText('Email:'.$email);
            $section->addText('Fecha de Nacimiento:'.$fecha_nacimiento);
            $writer = IOFactory::createWriter($phpWord, 'Word2007');
            ob_end_clean();
            $writer->save($archivo_path);

            // Escribiendo excel
            $archivo_path = $target_directory.'usuarios.xlsx';
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
            $writer->save($archivo_path);

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