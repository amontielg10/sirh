<?php
include '../librerias.php';
require '../../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$rowx = new row();
$modelCentro = new modelCentroTrabajoHraes();
$catalogoRegion = new catalogoRegion();
$catalogoEstatus = new catalogoEstatus();
$catalogoEntidad = new catalogoEntidad();

///VARIABLES AUXILIARES
$fileExel = 'exel_centro_trabajo'; ///NOMBRE DE ARCHIVO
$numColumnas = 12; ///COLUMNAS QUE TENDRA EL EXEL PARA CARGARLOS

if (isset($_FILES[$fileExel]) && $_FILES[$fileExel]['error'] === UPLOAD_ERR_OK) { ///VALIDACION DE ARCHIVO
    $nombre_archivo = $_FILES[$fileExel]['name']; ///INFORMACION DE ARCHIVO COMO NOMBRE
    $archivo_temporal = $_FILES[$fileExel]['tmp_name']; ///ARCHIVO TEMPORAL

    $spreadsheet = IOFactory::load($archivo_temporal); ///MANIPULACION DE ARCHIVO
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    $numero_filas = count($sheetData); ///NUMERO DE FILAS DEL ARCHIVO
    $numero_columnas = count($sheetData[1]); ///NUMERO DE COLUMNAS DEL ARCHIVO
    $totalFilas = 3; ///NUMERO TOTAL DE FILAS DE REGISTROS

    if ($numero_columnas == $numColumnas) {///VALIDAR EL NUMERO DE EL NUMERO DE COLUMNAS COINCIDA
        foreach ($sheetData as $row) {
            if ($totalFilas > 5) {///VALIDACION PARA NO EJECUTAR ENCABEZADO Y TEXTO
                $col_A = trim(pg_escape_string($row['A'])) ? trim(pg_escape_string($row['A'])) : null;//CLAVE DE CENTRO DE TRABAJO
                $col_B = trim(pg_escape_string($row['B'])) ? trim(pg_escape_string($row['B'])) : null;//NOMBRE
                $col_C = trim(pg_escape_string($row['C'])) ? trim(pg_escape_string($row['C'])) : null;//PAIS
                $col_D = trim(pg_escape_string($row['D'])) ? trim(pg_escape_string($row['D'])) : null;//COLONIA
                $col_E = trim(pg_escape_string($row['E'])) ? trim(pg_escape_string($row['E'])) : null;//CODIGO-POSTAL
                $col_F = trim(pg_escape_string($row['F'])) ? trim(pg_escape_string($row['F'])) : null;//NUM-EXTERIOR
                $col_G = trim(pg_escape_string($row['G'])) ? trim(pg_escape_string($row['G'])) : null;//NUM_INTERIOR
                $col_H = trim(pg_escape_string($row['H'])) ? trim(pg_escape_string($row['H'])) : null;//LATITUD
                $col_I = trim(pg_escape_string($row['I'])) ? trim(pg_escape_string($row['I'])) : null;//LONGITUD
                $col_J = trim(pg_escape_string($row['J'])) ? trim(pg_escape_string($row['J'])) : null;//REGION
                $col_K = trim(pg_escape_string($row['K'])) ? trim(pg_escape_string($row['K'])) : null;//ESTATUS
                $col_L = trim(pg_escape_string($row['L'])) ? trim(pg_escape_string($row['L'])) : null;//ENTIDAD

                if (////VALIDACION DE CAMPOS REQUERIDOS
                    validateDateX($col_A) && validateDateX($col_B) && validateDateX($col_E) &&
                    validateDateX($col_H) && validateDateX($col_I) && validateDateX($col_J) &&
                    validateDateX($col_K) && validateDateX($col_L)
                ) { ////VALIDACION QUE EXISTA CAMPOS REQUERIDOS
                    ///OBTENCION DE ID DE CATALOGOS
                    $idRegion = $catalogoRegion->idRegionByText($col_J);
                    $idEstatus = $catalogoEstatus->idEstatusText($col_K);
                    $idEntidad = $catalogoEntidad->idEntidadText($col_L);

                    if (validarExiste($idRegion) && validarExiste($idEstatus) && validarExiste($idEntidad)) { ///VALIDA QUE LOS CATALOGOS SEAN LOS CORRECTOS
                        ////VALIDACION DE NUMERO DE CARACTERES
                        if ( ///VALIDA QUE LOS DATOS INGRESADOS NO TENGAN CARACTERES EXTRA
                            numCaracteres($col_A, 15) && numCaracteres($col_B, 90) && numCaracteres($col_C, 20) &&
                            numCaracteres($col_D, 40) && numCaracteres($col_E, 5) && numCaracteres($col_F, 15) &&
                            numCaracteres($col_G, 15) && numCaracteres($col_H, 15) && numCaracteres($col_I, 15)
                        ) {
                            $idRegion = $rowx->returnArrayById($idRegion);
                            $idEstatus = $rowx->returnArrayById($idEstatus);
                            $idEntidad = $rowx->returnArrayById($idEntidad);

                            $existClave = $rowx->returnArrayById($modelCentro->countClave($col_A)); ///VALIDA QUE EXISTA LA CLAVE DEL CENTRO
                            if ($existClave[0] != 0) { ///MODIFICA EL EL CAMPO --> VALIDACION DE PARA VERIFICAR ACCION
                                echo 'MODIFICA - ';
                            } else { ///AGREGA EL CAMPO
                                $guardar = $modelCentro->agregarCentroSQL(
                                    $col_A,
                                    $col_B,
                                    $col_C,
                                    $col_D,
                                    $col_E,
                                    $col_F,
                                    $col_G,
                                    $col_H,
                                    $col_I,
                                    $idRegion[0],
                                    $idEstatus[0],
                                    $idEntidad[0]
                                );
                                if($guardar){
                                    echo 'Agregado con exito - ';
                                } else {
                                    echo 'Error al agregar - ';
                                }
                            }
                        } else {
                            echo 'Es mayor al numero de caracteres - ';
                        }
                    } else { ///CATALOGOS INCORRECTOS
                        echo 'ID NO EXISTPE - ';
                    }
                    echo "$totalFilas / $col_A / $col_B / $col_C / $col_D / $col_E / $col_F / $col_G / $col_H / $col_I / $col_J / $col_K / $col_L";
                } else { /// EXISTEN CAMPOS VACIOS
                    echo 'Existen campos vacios - ';
                    echo "$totalFilas / $col_A / $col_B / $col_C / $col_D / $col_E / $col_F / $col_G / $col_H / $col_I / $col_J / $col_K / $col_L";
                }
                echo '<br>';
            }
            $totalFilas++;
        } //FIN PROCESO FOR-EACH
    } else {///EL NUMERO DE COLUMNAS NO COINCIDE -- ERROR
        echo 'Error de num de filas';
    }
} else {
    echo "Error al subir el archivo.";
}




function validateDateX($data) ////LA FUNCION VALIDA QUE NO VAYAN ELEMENTOS VACIOS
{
    if ($data != null) {
        return true;
    } else {
        return false;
    }
}

function validarExiste($query)
{ ///LA FUNCION VALIDA QUE EXISTAN VALORES EN LA BASE
    $num_filas = pg_num_rows($query);
    if ($num_filas > 0) {
        return true; //La consulta devolvió información
    } else {
        return false; //La consulta no devolvió información
    }
}

function numCaracteres($text, $number)
{ ///la funcion valida el numero de caracteres
    if (strlen($text) > $number) {
        return false; // es mayor al numero de caracteres
    } else {
        return true;//Es menor al numero max
    }
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