<?php
include '../librerias.php';
require_once '../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Fill;

header('Content-Type: text/html; charset=UTF-8');

$masivoFaltasM = new MasivoFaltasM();
$spreadsheet = new Spreadsheet();
$result = pg_query($connectionDBsPro, $masivoFaltasM->getTempFalta());

$sheet = $spreadsheet->getActiveSheet();

// Función para aplicar formato a los encabezados
function formatHeaderCell($sheet, $cell, $value) {
    $sheet->getStyle($cell)->getFont()->setBold(true);
    $sheet->getStyle($cell)->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE));
    $sheet->getStyle($cell)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('12501A'); // Verde brillante
    $sheet->setCellValue($cell, $value);
}

// Encabezados de columna con formato
formatHeaderCell($sheet, 'A1', 'CURP');
formatHeaderCell($sheet, 'B1', 'FECHA INICIO');
formatHeaderCell($sheet, 'C1', 'FECHA FIN');
formatHeaderCell($sheet, 'D1', 'FECHA REGISTRO');
formatHeaderCell($sheet, 'E1', 'CODIGO CERTIFICACION');
formatHeaderCell($sheet, 'F1', 'OBSERVACIONES');
formatHeaderCell($sheet, 'G1', 'ESTATUS');
formatHeaderCell($sheet, 'H1', 'OBSERVACIONES ESTATUS');

$row = 2;

// Iterar sobre los resultados de la consulta y escribir en el libro
while ($row_data = pg_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $row_data['curp']);
    $sheet->setCellValue('B' . $row, $row_data['fecha_desde']);
    $sheet->setCellValue('C' . $row, $row_data['fecha_hasta']);
    $sheet->setCellValue('D' . $row, $row_data['fecha_registro']);
    $sheet->setCellValue('E' . $row, $row_data['codigo_certificacion']);
    $sheet->setCellValue('F' . $row, $row_data['observaciones']);
    $sheet->setCellValue('G' . $row, $row_data['estatus']);
    $sheet->setCellValue('H' . $row, $row_data['observaciones_estatus']);
    $row++;
}

// Configurar el nombre del archivo para descarga
$filename = 'Faltas_respuesta_' . date('Ymd') . '.xlsx';

// Crear el writer para el archivo Excel y guardarlo en la salida
$writer = new Xlsx($spreadsheet);

// Definir las cabeceras para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;