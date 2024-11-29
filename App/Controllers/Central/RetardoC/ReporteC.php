<?php
// Habilitar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos
$password = "630545";
$user = "postgres";
$dbname = "rhsist2";
$host = "localhost";
$port = "5432";
$options = "--client_encoding=UTF8";


$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die("Error de conexión a la base de datos: " . pg_last_error());
}

// Consulta a la tabla
$query = "SELECT rfc, fecha, tipo_falta FROM central.masivo_ctrl_temp_faltas_just";
$result = pg_query($conexion, $query);

if (!$result) {
    die("Error en la consulta: " . pg_last_error());
}

// Crear archivo Excel
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados
$sheet->setCellValue('A1', 'RFC');
$sheet->setCellValue('B1', 'Fecha');
$sheet->setCellValue('C1', 'Tipo de Falta');

// Agregar datos
$row = 2;
while ($data = pg_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $data['rfc']);
    $sheet->setCellValue('B' . $row, $data['fecha']);
    $sheet->setCellValue('C' . $row, $data['tipo_falta']);
    $row++;
}

// Crear archivo para descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
