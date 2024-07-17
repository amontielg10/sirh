<?php
include '../librerias.php';
require_once '../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$bool = false;
$message = 'ok';
$fileExel = 'file';

$schema = 'public';
$tableName = $schema . '.masivo_tbl_empleados_all';
$tableNameEmplo = $schema . '.tbl_empleados_hraes';



$masivoEmpleadosM = new MasivoEmpleadosM();

$bool = $masivoEmpleadosM->truncateTable($tableName);

if (isset($_FILES[$fileExel]) && $_FILES[$fileExel]['error'] === UPLOAD_ERR_OK) { ///VALIDACION DE ARCHIVO
    $archivo = $_FILES[$fileExel]['tmp_name']; ///ARCHIVO TEMPORAL

    $spreadsheet = IOFactory::load($archivo); ///MANIPULACION DE ARCHIVO
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
 
    $bool = insertTemporaryTable($sheetData, $tableName, $connectionDBsPro) ? true : false; //INSERT IN TEMPORARY TABLE
    if(!$bool) exit ($bool);

    $bool = processOfCurp($tableName,$masivoEmpleadosM,$tableNameEmplo) ? true : false;
    if (!$bool) exit ($bool);

    $bool = processValidateIsUnique($masivoEmpleadosM, $tableName, $tableNameEmplo) ? true : false;
    if(!$bool) exit ($bool);
    /*
    

    $bool = $masivoEmpleadosM ->validateCurp($tableName) ? true : false;
    if(!$bool) exit ($bool);

    $bool = $masivoEmpleadosM ->validateRFC($tableName) ? true : false;
    if(!$bool) exit ($bool);

    validateCharMax($masivoEmpleadosM, $tableName);
    validateDataNull($tableName,$masivoEmpleadosM);

    $bool = $masivoEmpleadosM ->validateNumberEmployee($tableName,$tableNameEmplo) ? true : false;
    if(!$bool) exit ($bool);
    */
}

$var = [
    'bool' => $bool,
    'message' => $message,
];
echo json_encode($var);




//-------------
///ON FUNCTION 

function processOfCurp($tableName,$masivoEmpleadosM,$tableNameEmplo){
    $isFlag_ = false;

    try {
        $isFlag_ = $masivoEmpleadosM -> addStatusGeneral($tableName, $tableNameEmplo) ? true : false;
        $isFlag_ = $masivoEmpleadosM -> validateCurp($tableName) ? true : false;
    } catch (\Throwable $th) {
        exit ($isFlag_);
    }

    return $isFlag_;
}

function processValidateIsUnique($masivoEmpleadosM, $tableName, $tableNameEmplo){
    $isFlag_ = false;

    try {
        $isFlag_ = $masivoEmpleadosM -> validateDataIsRequired ($tableName,$tableNameEmplo,($tableName.'.rfc'),($tableNameEmplo . '.rfc'), 'RFC') ? true : false;
        $isFlag_ = $masivoEmpleadosM -> validateDataIsRequired ($tableName,$tableNameEmplo,($tableName.'.num_empleado'),($tableNameEmplo . '.num_empleado'), 'N EMPLEADO') ? true : false;
        $isFlag_ = $masivoEmpleadosM -> validateRFC($tableName) ? true : false;
    } catch (\Throwable $th) {
       exit ($isFlag_);
    }
    return $isFlag_;
}



function validateDataNull($tableName,$masivoEmpleadosM){ /// _IS_REQUIRED
    $bool = $masivoEmpleadosM->validateIsNull($tableName, 'apellido_paterno', 'A PATERNO') ? true : false; if (!$bool) exit ($bool);
    $bool = $masivoEmpleadosM->validateIsNull($tableName, 'nombre', 'NOMBRE') ? true : false; if (!$bool) exit ($bool);
    $bool = $masivoEmpleadosM->validateIsNull($tableName, 'num_empleado', 'N EMPLEADO') ? true : false; if (!$bool) exit ($bool);
    
}

function validateCharMax($masivoEmpleadosM, $tableName){
    $bool = $masivoEmpleadosM ->validateChar($tableName, 'apellido_paterno', 40, 'A PATERNO') ? true : false; if(!$bool) exit ($bool);
    $bool = $masivoEmpleadosM ->validateChar($tableName, 'apellido_materno', 40, 'A MATERNO') ? true : false; if(!$bool) exit ($bool);
    $bool = $masivoEmpleadosM ->validateChar($tableName, 'nombre', 40, 'NOMBRE') ? true : false; if(!$bool) exit ($bool);
    $bool = $masivoEmpleadosM ->validateChar($tableName, 'num_empleado', 30, 'N EMPLEADO') ? true : false; if(!$bool) exit ($bool);
}



function insertTemporaryTable($file, $tableName, $connectionDBsPro)
{
    $bool = false;
    $masivoEmpleadosM = new MasivoEmpleadosM();
    $numero_columnas = count($file[1]);
    $totalFilas = 0;

    if ($numero_columnas == 45) {
        foreach ($file as $row) {
            if ($totalFilas >= 2) {

                $data = [
                    'curp' => trim(pg_escape_string($row['A'])) ? strtoupper(trim(pg_escape_string($row['A']))) : null,
                    'rfc' => trim(pg_escape_string($row['B'])) ? strtoupper(trim(pg_escape_string($row['B']))) : null,
                    'apellido_paterno' => trim(pg_escape_string($row['C'])) ? strtoupper(trim(pg_escape_string($row['C']))) : null,
                    'apellido_materno' => trim(pg_escape_string($row['D'])) ? strtoupper(trim(pg_escape_string($row['D']))) : null,
                    'nombre' => trim(pg_escape_string($row['E'])) ? strtoupper(trim(pg_escape_string($row['E']))) : null,
                    'num_empleado' => trim(pg_escape_string($row['F'])) ? strtoupper(trim(pg_escape_string($row['F']))) : null,
                    'num_seguro_social' => trim(pg_escape_string($row['G'])) ? strtoupper(trim(pg_escape_string($row['G']))) : null,
                    'estado_civil' => trim(pg_escape_string($row['H'])) ? strtoupper(trim(pg_escape_string($row['H']))) : null,
                    'pais_nacimiento' => trim(pg_escape_string($row['I'])) ? strtoupper(trim(pg_escape_string($row['I']))) : null,
                    'estado_nacimiento' => trim(pg_escape_string($row['J'])) ? strtoupper(trim(pg_escape_string($row['J']))) : null,
                    'codigo_postal' => trim(pg_escape_string($row['K'])) ? strtoupper(trim(pg_escape_string($row['K']))) : null,
                    'codigo_postal_fiscal' => trim(pg_escape_string($row['L'])) ? strtoupper(trim(pg_escape_string($row['L']))) : null,
                    'municipio' => trim(pg_escape_string($row['M'])) ? strtoupper(trim(pg_escape_string($row['M']))) : null,
                    'colonia' => trim(pg_escape_string($row['N'])) ? strtoupper(trim(pg_escape_string($row['N']))) : null,
                    'calle' => trim(pg_escape_string($row['O'])) ? strtoupper(trim(pg_escape_string($row['O']))) : null,
                    'num_exterior' => trim(pg_escape_string($row['P'])) ? strtoupper(trim(pg_escape_string($row['P']))) : null,
                    'num_interior' => trim(pg_escape_string($row['Q'])) ? strtoupper(trim(pg_escape_string($row['Q']))) : null,
                    'num_telefono' => trim(pg_escape_string($row['R'])) ? strtoupper(trim(pg_escape_string($row['R']))) : null,
                    'num_movil' => trim(pg_escape_string($row['S'])) ? strtoupper(trim(pg_escape_string($row['S']))) : null,
                    'correo_electronico' => trim(pg_escape_string($row['T'])) ? strtoupper(trim(pg_escape_string($row['T']))) : null,
                    'cuenta_clabe' => trim(pg_escape_string($row['U'])) ? strtoupper(trim(pg_escape_string($row['U']))) : null,
                    'num_plaza' => trim(pg_escape_string($row['V'])) ? strtoupper(trim(pg_escape_string($row['V']))) : null,
                    'contratacion' => trim(pg_escape_string($row['W'])) ? strtoupper(trim(pg_escape_string($row['W']))) : null,
                    'sub_contratacion' => trim(pg_escape_string($row['X'])) ? strtoupper(trim(pg_escape_string($row['X']))) : null,
                    'unidad' => trim(pg_escape_string($row['Y'])) ? strtoupper(trim(pg_escape_string($row['Y']))) : null,
                    'coordinacion' => trim(pg_escape_string($row['Z'])) ? strtoupper(trim(pg_escape_string($row['Z']))) : null,
                    'codigo_puesto' => trim(pg_escape_string($row['AA'])) ? strtoupper(trim(pg_escape_string($row['AA']))) : null,
                    'puesto' => trim(pg_escape_string($row['AB'])) ? strtoupper(trim(pg_escape_string($row['AB']))) : null,
                    'tabular' => trim(pg_escape_string($row['AC'])) ? strtoupper(trim(pg_escape_string($row['AC']))) : null,
                    'nivel' => trim(pg_escape_string($row['AD'])) ? strtoupper(trim(pg_escape_string($row['AD']))) : null,
                    'rama' => trim(pg_escape_string($row['AE'])) ? strtoupper(trim(pg_escape_string($row['AE']))) : null,
                    'nivel_estudio' => trim(pg_escape_string($row['AF'])) ? strtoupper(trim(pg_escape_string($row['AF']))) : null,
                    'carrera' => trim(pg_escape_string($row['AG'])) ? strtoupper(trim(pg_escape_string($row['AG']))) : null,
                    'cedula_carrrera' => trim(pg_escape_string($row['AH'])) ? strtoupper(trim(pg_escape_string($row['AH']))) : null,
                    'especialidad' => trim(pg_escape_string($row['AI'])) ? strtoupper(trim(pg_escape_string($row['AI']))) : null,
                    'cedula_especialidad' => trim(pg_escape_string($row['AJ'])) ? strtoupper(trim(pg_escape_string($row['AJ']))) : null,
                    'fecha_expedicion' => trim(pg_escape_string($row['AK'])) ? strtoupper(trim(pg_escape_string($row['AK']))) : null,
                    'fecha_ingreso_gob_federal' => trim(pg_escape_string($row['AL'])) ? strtoupper(trim(pg_escape_string($row['AL']))) : null,
                    'fecha_ingreso_imss' => trim(pg_escape_string($row['AM'])) ? strtoupper(trim(pg_escape_string($row['AM']))) : null,
                    'vigencia_del' => trim(pg_escape_string($row['AN'])) ? strtoupper(trim(pg_escape_string($row['AN']))) : null,
                    'vigencia_al' => trim(pg_escape_string($row['AO'])) ? strtoupper(trim(pg_escape_string($row['AO']))) : null,
                    'regimen_pensionario' => trim(pg_escape_string($row['AP'])) ? strtoupper(trim(pg_escape_string($row['AP']))) : null,
                    'ahorro_solidario' => trim(pg_escape_string($row['AQ'])) ? strtoupper(trim(pg_escape_string($row['AQ']))) : null,
                    'quinquenio' => trim(pg_escape_string($row['AR'])) ? strtoupper(trim(pg_escape_string($row['AR']))) : null,
                    'svi' => trim(pg_escape_string($row['AS'])) ? strtoupper(trim(pg_escape_string($row['AS']))) : null,
                ];

                $bool = $masivoEmpleadosM->addTemporaryTable($connectionDBsPro, $tableName, $data) ? true : false;
                if (!$bool)
                    break;
            }
            $totalFilas++;
        }
    }
    return $bool;
}
