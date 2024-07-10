<?php
include '../librerias.php';

require_once '../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$fileExel = 'archivo'; ///NOMBRE DE ARCHIVO
$numColumnas = 12; ///COLUMNAS QUE TENDRA EL EXEL PARA CARGARLOS

if (isset($_FILES[$fileExel]) && $_FILES[$fileExel]['error'] === UPLOAD_ERR_OK) { ///VALIDACION DE ARCHIVO
    $archivo = $_FILES[$fileExel]['tmp_name']; ///ARCHIVO TEMPORAL


    $spreadsheet = IOFactory::load($archivo); ///MANIPULACION DE ARCHIVO
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


    $numero_filas = count($sheetData); ///NUMERO DE FILAS DEL ARCHIVO
    $numero_columnas = count($sheetData[1]); ///NUMERO DE COLUMNAS DEL ARCHIVO
    $totalFilas = 1; ///NUMERO TOTAL DE FILAS DE REGISTROS

    $truncate = "TRUNCATE TABLE public.masivo_ctrl_faltas_hraes RESTART IDENTITY;";
    $result = pg_query($connectionDBsPro, $truncate);

    //if ($numero_columnas == $numColumnas) {///VALIDAR EL NUMERO DE EL NUMERO DE COLUMNAS COINCIDA
    foreach ($sheetData as $row) {
        if ($totalFilas != 1) {///VALIDACION PARA NO EJECUTAR ENCABEZADO Y TEXTO
            $col_A = trim(pg_escape_string($row['A'])) ? trim(pg_escape_string($row['A'])) : null;//CLAVE DE CENTRO DE TRABAJO
            $col_B = trim(pg_escape_string($row['B'])) ? trim(pg_escape_string($row['B'])) : null;//NOMBRE
            $col_C = trim(pg_escape_string($row['C'])) ? trim(pg_escape_string($row['C'])) : null;//PAIS

            $truncate = "INSERT INTO masivo_ctrl_faltas_hraes (fecha_desde, fecha_hasta,fecha_registro) VALUES ('$col_A','$col_B','$col_C')";
            $result = pg_query($connectionDBsPro, $truncate);

            $totalFilas++;
            //    }
        }
    }
}

// Construir la consulta SQL para insertar datos en PostgreSQL
//$truncate = "TRUNCATE TABLE public.masivo_ctrl_faltas_hraes RESTART IDENTITY;";
//$query = "INSERT INTO public.masivo_ctrl_faltas_hraes (fecha_desde, fecha_hasta, fecha_registro) VALUES ('nombre', 'edad', 'email')";

// Ejecutar la consulta

/*
$fileExel = 'archivo';
if (isset($_FILES[$fileExel]) && $_FILES[$fileExel]['error'] === UPLOAD_ERR_OK) { ///VALIDACION DE ARCHIVO
    $archivo = $_FILES[$fileExel]['tmp_name']; ///ARCHIVO TEMPORAL

/*
    $spreadsheet = IOFactory::load($archivo); ///MANIPULACION DE ARCHIVO
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    
    $numero_filas = count($sheetData); ///NUMERO DE FILAS DEL ARCHIVO
    $numero_columnas = count($sheetData[1]); ///NUMERO DE COLUMNAS DEL ARCHIVO
    $totalFilas = 3; ///NUMERO TOTAL DE FILAS DE REGISTROS

    $truncate = "TRUNCATE TABLE public.masivo_ctrl_faltas_hraes RESTART IDENTITY;";
    $result = pg_query($connectionDBsPro, $truncate);
*/
/*
if ($numero_columnas == $numColumnas) {///VALIDAR EL NUMERO DE EL NUMERO DE COLUMNAS COINCIDA
    foreach ($sheetData as $row) {
        if ($totalFilas > 5) {///VALIDACION PARA NO EJECUTAR ENCABEZADO Y TEXTO
            $col_A = trim(pg_escape_string($row['A'])) ? trim(pg_escape_string($row['A'])) : null;//CLAVE DE CENTRO DE TRABAJO
            $col_B = trim(pg_escape_string($row['B'])) ? trim(pg_escape_string($row['B'])) : null;//NOMBRE
            $col_C = trim(pg_escape_string($row['C'])) ? trim(pg_escape_string($row['C'])) : null;//PAIS

            $truncate = "INSERT INTO masivo_ctrl_faltas_hraes (fecha_desde, fecha_hasta,fecha_registro) VALUES ($col_A,$col_B,$col_C)";
            $result = pg_query($connectionDBsPro, $truncate);
        }
    }
    // Ejecutar la consulta


    //$result = pg_query($connectionDBsPro, $query);

    if (!$result) {
        echo "Error al insertar datos en la base de datos.";
        exit;
    }
}*/


/*
// Consulta SQL para obtener datos desde PostgreSQL
$spreadsheet = new Spreadsheet();
$sql = "SELECT 
id_user, nick, nombre
FROM users";

// Ejecutar la consulta
$result = pg_query($connectionDBsPro, $sql);

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
*/