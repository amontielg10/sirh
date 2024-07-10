<?php
include '../librerias.php';
header('Content-Type: text/html; charset=UTF-8');

$response = 'ok';
$nombre_campo = 'archivo';





$query = "SELECT * FROM users";
$resultado = pg_query($connectionDBsPro, $query);

if (!$resultado) {
    die("Error en la consulta: " . pg_last_error());
}

// Obtener los datos como un array asociativo
$datos = pg_fetch_all($resultado);

// Cerrar la conexión
    

// Generar archivo Excel con PhpSpreadsheet
require_once '../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$columnas = array_keys($datos[0]);
$sheet->fromArray([$columnas], null, 'A1');

// Datos de la consulta
$sheet->fromArray($datos, null, 'A2');

// Nombre del archivo Excel
$archivo = 'archivo.xlsx';

// Guardar el archivo Excel en el servidor
$writer = new Xlsx($spreadsheet);
$writer->save($archivo);

// Enviar respuesta al cliente con el nombre del archivo generado
echo json_encode(['archivo' => $archivo]);




// Configurar las cabeceras para indicar que se devolverá un archivo Excel


/*
if (isset($_FILES[$nombre_campo])) {
    $archivo_nombre = $_FILES[$nombre_campo]['name'];
    $response = $archivo_nombre;
*/

/*
function consultarDatos($conexion)
{
    $consulta = "SELECT * FROM users";
    $resultado = pg_query($conexion, $consulta);

    // Verificar si hay resultados
    if (!$resultado) {
        echo "Error en la consulta.\n";
        exit;
    }

    // Obtener los datos como un array asociativo
    $datos = pg_fetch_all($resultado);

    return $datos;
}

// Crear un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Conectar a la base de datos PostgreSQL
$conexion = $connectionDBsPro;

// Obtener datos de la base de datos
$datos = consultarDatos($conexion);

// Escribir los datos en la hoja de cálculo
$fila = 1;
foreach ($datos as $dato) {
    $columna = 'A'; // Comienza desde la columna A
    foreach ($dato as $valor) {
        $sheet->setCellValue($columna . $fila, $valor);
        $columna++;
    }
    $fila++;
}

// Salida del archivo Excel
header('Content-Type: text/csv; charset=utf-8');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="datos.xlsx"');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
echo json_encode($writer);
/*
} else {
    $response = "No se ha recibido ningún archivo.";
}
*/
/*
$var = [
    'response' => $response,
];
echo json_encode($var);

*/