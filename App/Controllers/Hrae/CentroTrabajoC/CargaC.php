<?php
require '../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['archivo'])) {
        $file = $_FILES['archivo'];
        $nombreArchivo = $file['name'];


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agregar datos
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Edad');
        $sheet->setCellValue('C1', 'Correo electrónico');

        $sheet->setCellValue('A2', 'Juan');
        $sheet->setCellValue('B2', 25);
        $sheet->setCellValue('C2', 'juan@example.com');

        $sheet->setCellValue('A3', 'María');
        $sheet->setCellValue('B3', 30);
        $sheet->setCellValue('C3', 'maria@example.com');

        // Crear el escritor (Writer) para XLSX
        $writer = new Xlsx($spreadsheet);

        // Configurar encabezados para forzar la descarga
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="datos_generados.xlsx"');
        header('Cache-Control: max-age=0');

        // Salida directa del archivo a la salida estándar
        $writer->save('php://output');

        //echo "Archivo recibido y guardado correctamente." . $nombreArchivo;
    } else {
        echo "No se recibió ningún archivo."; ///No se recibió ningún archivo
    }
} else {
    echo "No se recibió una solicitud POST."; ///No se recibió una solicitud POST
}



/*

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$filename = 'datos_postgresql.xlsx';

// Crear un objeto Writer para guardar el archivo Excel en la salida directa
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

*/