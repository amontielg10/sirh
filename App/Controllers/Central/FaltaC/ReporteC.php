<?php
require_once '../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Parámetros de conexión
$password = "630545";
$username = "postgres";
$dbname = "rhsist2";
$host = "localhost";
$port = "5432";
$options = "--client_encoding=UTF8";

try {
    $connectionDB = "host=$host port=$port dbname=$dbname user=$username password=$password options=$options";
    $connectionDBsPro = pg_pconnect($connectionDB);

    if (!$connectionDBsPro) {
        throw new Exception("Error connecting to the database.");
    }
} catch (Throwable $e) {
    die("Database connection error: " . $e->getMessage());
}

// Consulta SQL
$query = "SELECT rfc, fecha, observaciones, tipo, tipo_falta FROM central.masivo_ctrl_temp_faltas_just";
$result = pg_query($connectionDBsPro, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// Crear archivo Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Función para dar formato a los encabezados
function formatHeaderCell($sheet, $cell, $value)
{
    $sheet->getStyle($cell)->getFont()->setBold(true);
    $sheet->getStyle($cell)->getFont()->getColor()->setRGB('FFFFFF');
    $sheet->getStyle($cell)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('12501A');
    $sheet->setCellValue($cell, $value);
}

// Agregar encabezados
formatHeaderCell($sheet, 'A1', 'RFC');
formatHeaderCell($sheet, 'B1', 'FECHA');
formatHeaderCell($sheet, 'C1', 'OBSERVACIONES');
formatHeaderCell($sheet, 'D1', 'TIPO');
formatHeaderCell($sheet, 'E1', 'TIPO DE FALTA');

// Llenar los datos
$row = 2;
while ($row_data = pg_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $row_data['rfc']);
    $sheet->setCellValue('B' . $row, $row_data['fecha']);
    $sheet->setCellValue('C' . $row, $row_data['observaciones']);
    $sheet->setCellValue('D' . $row, $row_data['tipo']);
    $sheet->setCellValue('E' . $row, $row_data['tipo_falta']);
    $row++;
}

// Configurar la salida del archivo
$filename = 'REPORTE_FALTAS_JUSTIFICADAS.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Limpia cualquier salida previa
ob_end_clean();

try {
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} catch (Exception $e) {
    die("Error generating Excel file: " . $e->getMessage());
}
