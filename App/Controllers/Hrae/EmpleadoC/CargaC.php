<?php
include '../librerias.php';
require_once '../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$bool = false;
$message = 'ok';
$fileExel = 'file';

$schema = 'public';
$tableName = $schema.'.masivo_tbl_empleados_all';


$masivoEmpleadosM = new MasivoEmpleadosM();

$bool = $masivoEmpleadosM->truncateTable($tableName);

if (isset($_FILES[$fileExel]) && $_FILES[$fileExel]['error'] === UPLOAD_ERR_OK) { ///VALIDACION DE ARCHIVO
    $archivo = $_FILES[$fileExel]['tmp_name']; ///ARCHIVO TEMPORAL

    $spreadsheet = IOFactory::load($archivo); ///MANIPULACION DE ARCHIVO
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $bool = insertTemporaryTable($sheetData,$tableName,$connectionDBsPro) ? true : false;
    
}


/*
SELECT
    curp,
    CASE
        WHEN curp ~ '^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$' THEN 'Válida'
        ELSE 'Inválida'
    END AS estado_curp
FROM
    masivo_tbl_empleados_all
order by masivo_tbl_empleados_all asc
    */

$var = [
    'bool' => $bool,
    'message' => $message,
];
echo json_encode($var);



function insertTemporaryTable($file,$tableName,$connectionDBsPro)
{
    $bool = false;
    $masivoEmpleadosM = new MasivoEmpleadosM();
    $numero_columnas = count($file[1]); 
    $totalFilas = 0;

    //if ($numero_columnas == 6) {
        foreach ($file as $row) {
            if ($totalFilas >= 2) {

                $data = [
                    'curp' => trim(pg_escape_string($row['A'])) ? strtoupper(trim(pg_escape_string($row['A']))) : null,
                    'rfc' => trim(pg_escape_string($row['B'])) ? strtoupper(trim(pg_escape_string($row['B'])))  : null,
                    'apellido_paterno' => trim(pg_escape_string($row['C'])) ? strtoupper(trim(pg_escape_string($row['C'])))  : null,
                    'apellido_materno' => trim(pg_escape_string($row['D'])) ? strtoupper(trim(pg_escape_string($row['D'])))  : null,
                    'nombre' => trim(pg_escape_string($row['E'])) ? strtoupper(trim(pg_escape_string($row['E'])))  : null,
                    'num_empleado' => trim(pg_escape_string($row['F'])) ? strtoupper(trim(pg_escape_string($row['F'])))  : null,
                    'num_seguro_social' => trim(pg_escape_string($row['G'])) ? strtoupper(trim(pg_escape_string($row['G'])))  : null,
                    'estado_civil' => trim(pg_escape_string($row['H'])) ? strtoupper(trim(pg_escape_string($row['H'])))  : null,
                    'pais_nacimiento' => trim(pg_escape_string($row['I'])) ? strtoupper(trim(pg_escape_string($row['I'])))  : null,
                    'estado_nacimiento' => trim(pg_escape_string($row['J'])) ? strtoupper(trim(pg_escape_string($row['J'])))  : null,
                    'codigo_postal' => trim(pg_escape_string($row['K'])) ? strtoupper(trim(pg_escape_string($row['K'])))  : null,
                    'codigo_postal_fiscal' => trim(pg_escape_string($row['L'])) ? strtoupper(trim(pg_escape_string($row['L'])))  : null,
                    'municipio' => trim(pg_escape_string($row['M'])) ? strtoupper(trim(pg_escape_string($row['M'])))  : null,
                    'colonia' => trim(pg_escape_string($row['N'])) ? strtoupper(trim(pg_escape_string($row['N'])))  : null,
                    'calle' => trim(pg_escape_string($row['O'])) ? strtoupper(trim(pg_escape_string($row['O'])))  : null,
                    'num_exterior' => trim(pg_escape_string($row['P'])) ? strtoupper(trim(pg_escape_string($row['P'])))  : null,
                    'num_interior' => trim(pg_escape_string($row['Q'])) ? strtoupper(trim(pg_escape_string($row['Q'])))  : null,
                    'num_telefono' => trim(pg_escape_string($row['R'])) ? strtoupper(trim(pg_escape_string($row['R'])))  : null,
                    'num_movil' => trim(pg_escape_string($row['S'])) ? strtoupper(trim(pg_escape_string($row['S'])))  : null,
                    'correo_electronico' => trim(pg_escape_string($row['T'])) ? strtoupper(trim(pg_escape_string($row['T'])))  : null,
                    'cuenta_clabe' => trim(pg_escape_string($row['U'])) ? strtoupper(trim(pg_escape_string($row['U'])))  : null,
                    'num_plaza' => trim(pg_escape_string($row['V'])) ? strtoupper(trim(pg_escape_string($row['V'])))  : null,
                    'contratacion' => trim(pg_escape_string($row['W'])) ? strtoupper(trim(pg_escape_string($row['W'])))  : null,
                    'sub_contratacion' => trim(pg_escape_string($row['X'])) ? strtoupper(trim(pg_escape_string($row['X'])))  : null,
                    'unidad' => trim(pg_escape_string($row['Y'])) ? strtoupper(trim(pg_escape_string($row['Y'])))  : null,
                    'coordinacion' => trim(pg_escape_string($row['Z'])) ? strtoupper(trim(pg_escape_string($row['Z'])))  : null,
                    'codigo_puesto' => trim(pg_escape_string($row['AA'])) ? strtoupper(trim(pg_escape_string($row['AA'])))  : null,
                    'puesto' => trim(pg_escape_string($row['AB'])) ? strtoupper(trim(pg_escape_string($row['AB'])))  : null,
                    'tabular' => trim(pg_escape_string($row['AC'])) ? strtoupper(trim(pg_escape_string($row['AC'])))  : null,
                    'nivel' => trim(pg_escape_string($row['AD'])) ? strtoupper(trim(pg_escape_string($row['AD'])))  : null,
                    'rama' => trim(pg_escape_string($row['AE'])) ? strtoupper(trim(pg_escape_string($row['AE'])))  : null,
                    'nivel_estudio' => trim(pg_escape_string($row['AF'])) ? strtoupper(trim(pg_escape_string($row['AF'])))  : null,
                    'carrera' => trim(pg_escape_string($row['AG'])) ? strtoupper(trim(pg_escape_string($row['AG'])))  : null,
                    'cedula_carrrera' => trim(pg_escape_string($row['AH'])) ? strtoupper(trim(pg_escape_string($row['AH'])))  : null,
                    'especialidad' => trim(pg_escape_string($row['AI'])) ? strtoupper(trim(pg_escape_string($row['AI'])))  : null,
                    'cedula_especialidad' => trim(pg_escape_string($row['AJ'])) ? strtoupper(trim(pg_escape_string($row['AJ'])))  : null,
                    'fecha_expedicion' => trim(pg_escape_string($row['AK'])) ? strtoupper(trim(pg_escape_string($row['AK'])))  : null,
                    'fecha_ingreso_gob_federal' => trim(pg_escape_string($row['AL'])) ? strtoupper(trim(pg_escape_string($row['AL'])))  : null,
                    'fecha_ingreso_imss' => trim(pg_escape_string($row['AM'])) ? strtoupper(trim(pg_escape_string($row['AM'])))  : null,
                    'vigencia_del' => trim(pg_escape_string($row['AN'])) ? strtoupper(trim(pg_escape_string($row['AN'])))  : null,
                    'vigencia_al' => trim(pg_escape_string($row['AO'])) ? strtoupper(trim(pg_escape_string($row['AO'])))  : null,
                    'regimen_pensionario' => trim(pg_escape_string($row['AP'])) ? strtoupper(trim(pg_escape_string($row['AP'])))  : null,
                    'ahorro_solidario' => trim(pg_escape_string($row['AQ'])) ? strtoupper(trim(pg_escape_string($row['AQ'])))  : null,
                    'quinquenio' => trim(pg_escape_string($row['AR'])) ? strtoupper(trim(pg_escape_string($row['AR'])))  : null,
                    'svi' => trim(pg_escape_string($row['AS'])) ? strtoupper(trim(pg_escape_string($row['AS'])))  : null,
                ];

                $bool = $masivoEmpleadosM -> addTemporaryTable($connectionDBsPro,$tableName,$data) ? true : false;
                if (!$bool) break;
            }
            $totalFilas++;
        }
   // }
    
    return $bool;
}
/*
/// Class
$masivoFaltasM = new MasivoFaltasM();

///Messages
$bool = false;
$message = 'ok';

///VALUE
$tableName = 'public.masivo_ctrl_faltas_hraes';
$tableNameNovel = 'public.ctrl_faltas_hraes';
$tableNameEmployee = 'public.tbl_empleados_hraes';
$fileExel = 'file';

//Actions
//Truncate table
$bool = $masivoFaltasM->truncateTable($tableName) ? true : false;
$message = $bool ? 'ok' : 'Error al truncate table';

if (isset($_FILES[$fileExel]) && $_FILES[$fileExel]['error'] === UPLOAD_ERR_OK) { ///VALIDACION DE ARCHIVO
    $archivo = $_FILES[$fileExel]['tmp_name']; ///ARCHIVO TEMPORAL

    $spreadsheet = IOFactory::load($archivo); ///MANIPULACION DE ARCHIVO
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $numero_columnas = count($sheetData[1]); ///NUMERO DE COLUMNAS DEL ARCHIVO
    $totalFilas = 1; ///NUMERO TOTAL DE FILAS DE REGISTROS

    if ($numero_columnas == 6) {///VALIDAR EL NUMERO DE EL NUMERO DE COLUMNAS COINCIDA
        foreach ($sheetData as $row) {
            if ($totalFilas != 1) {///VALIDACION PARA NO EJECUTAR ENCABEZADO Y TEXTO
                $curp = trim(pg_escape_string($row['A'])) ? trim(pg_escape_string($row['A'])) : null;//CLAVE DE CENTRO DE TRABAJO
                $fecha_desde = trim(pg_escape_string($row['B'])) ? trim(pg_escape_string($row['B'])) : null;//NOMBRE
                $fecha_hasta = trim(pg_escape_string($row['C'])) ? trim(pg_escape_string($row['C'])) : null;//PAIS
                $fecha_registro = trim(pg_escape_string($row['D'])) ? trim(pg_escape_string($row['D'])) : null;//PAIS
                $codigo_certificacion = trim(pg_escape_string($row['E'])) ? trim(pg_escape_string($row['E'])) : null;//PAIS
                $observaciones = trim(pg_escape_string($row['F'])) ? trim(pg_escape_string($row['F'])) : null;//PAIS

                $bool = $masivoFaltasM->insertFaltas($tableName, $fecha_desde, $fecha_hasta, $fecha_registro, $codigo_certificacion, $curp, $observaciones) ? true : false;

                $message = $bool ? 'ok' : 'Error al insertar en tabla temporal';
            }
            $totalFilas++;
        }

        $bool = $masivoFaltasM->validateDateFaltas($tableName, 'fecha_desde', 'FECHA INICIO') ? true : false;
        $bool = $masivoFaltasM->validateDateFaltas($tableName, 'fecha_hasta', 'FECHA FIN') ? true : false;
        $bool = $masivoFaltasM->validateDateFaltas($tableName, 'fecha_registro', 'FECHA REGISTRO') ? true : false;
        $bool = $masivoFaltasM->validateMaxFaltas($tableName, 'codigo_certificacion', 'CODIGO CERTIFIACION', 10) ? true : false;
        $bool = $masivoFaltasM->validateMaxFaltas($tableName, 'observaciones', 'OBSERVACIONES', 50) ? true : false;
        $bool = $masivoFaltasM->validateEmployeCurp($tableName) ? true : false;
        $bool = $masivoFaltasM->updateEstatus($tableName) ? true : false;
        $bool = $masivoFaltasM->insertFaltasInCtrl($tableNameNovel, $tableName, $tableNameEmployee) ? true : false;
        $message = $bool ? 'ok' : 'Error al insertar en tabla temporal';

    } else {
        $bool = false;
        $message = 'Las columnas del archivo cargado no corresponden con las columnas del formato requerido.';
    }

}

$var = [
    'bool' => $bool,
    'message' => $message,
];
echo json_encode($var);
*/