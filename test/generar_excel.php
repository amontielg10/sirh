<?php
//require 'ruta/donde/esta/PhpSpreadsheet/src/Bootstrap.php';
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();

// ... Configurar el contenido del archivo Excel ...

$host = 'localhost';
$port = '5432';
$dbname = 'sirh';
$user = 'postgres';
$password = 'pg2024';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo json_encode(array('error' => 'Error de conexión a la base de datos.'));
    exit;
}

// Consulta SQL para obtener datos desde PostgreSQL
$sql = "SELECT 
id_user, nick, nombre
FROM users";

// Ejecutar la consulta
$result = pg_query($conn, $sql);

// Verificar si hubo un error en la consulta
if (!$result) {
    echo json_encode(array('error' => 'Error al ejecutar la consulta.'));
    exit;
}

// Incluir PhpSpreadsheet
//require 'ruta/donde/esta/PhpSpreadsheet/src/Bootstrap.php';

// Crear un nuevo objeto Spreadsheet
$sheet = $spreadsheet->getActiveSheet();

// Encabezados de columna
$sheet->setCellValue('A1', 'id_user');
$sheet->setCellValue('B1', 'nick');
$sheet->setCellValue('C1', 'nombre');

// Contador para las filas
$row = 2;

// Iterar sobre los resultados de la consulta
while ($row_data = pg_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $row_data['id_user']);
    $sheet->setCellValue('B' . $row, $row_data['nick']);
    $sheet->setCellValue('C' . $row, $row_data['nombre']);
    $row++;
}

// Configurar el nombre del archivo para descarga
$filename = 'datos_excel_' . date('Ymd') . '.xlsx';

// Crear el writer para el archivo Excel y guardarlo en la salida
$writer = new Xlsx($spreadsheet);

// Definir las cabeceras para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="$filename"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;


/*
// Archivo: descargar_archivo.php

// Conexión a la base de datos PostgreSQL
$host = 'localhost';
$port = '5432';
$dbname = 'sirh';
$user = 'postgres';
$password = 'pg2024';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo json_encode(array('error' => 'Error de conexión a la base de datos.'));
    exit;
}

// Consulta SQL para obtener datos desde PostgreSQL
$sql = "SELECT 
id_user, nick, nombre
FROM users";

// Ejecutar la consulta
$result = pg_query($conn, $sql);

// Verificar si hubo un error en la consulta
if (!$result) {
    echo json_encode(array('error' => 'Error al ejecutar la consulta.'));
    exit;
}

// Incluir PhpSpreadsheet
//require 'ruta/donde/esta/PhpSpreadsheet/src/Bootstrap.php';
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados de columna
$sheet->setCellValue('A1', 'id_user');
$sheet->setCellValue('B1', 'nick');
$sheet->setCellValue('C1', 'nombre');

// Contador para las filas
$row = 2;

// Iterar sobre los resultados de la consulta
while ($row_data = pg_fetch_assoc($result)) {
    $sheet->setCellValue('A' . $row, $row_data['id_user']);
    $sheet->setCellValue('B' . $row, $row_data['nick']);
    $sheet->setCellValue('C' . $row, $row_data['nombre']);
    $row++;
}

// Configurar el nombre del archivo para descarga
$filename = 'datos_excel_' . date('Ymd') . '.xlsx';

// Configurar cabeceras para la descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Crear un objeto Writer para Excel y descargar el archivo
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Cerrar la conexión a PostgreSQL
pg_close($conn);
?>
*/