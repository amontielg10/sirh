<?php
include '../librerias.php';

$modelLicenciasM = new ModelLicenciasM();   
$row = new Row();

$id_object = $_POST['id_object'];
$id_estatus = $_POST['id_estatus'];
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];

$activo = 1; ///catalogo id---> proceso
$inactivo = 2;

$result = $row->returnArrayById($modelLicenciasM->validarEstatus($activo, $id_object, $id_tbl_empleados_hraes));

$bool = true;
$message = 'ok';

if ($id_estatus != $inactivo) {
    if ($result[0] != 0) {
        $bool = false;
        $message = 'Para agregar una licencia, es necesario que todos los registros estén concluidos';
    }
}

$var = [
    'bool' => $bool,
    'message' => $message
];
echo json_encode($var);
