<?php
include '../librerias.php';

$modelEmergenciaM = new modelEmergenciaM();

$condicion = [
    'id_ctrl_contacto_emergencia_hraes' => $_POST['id_object']
];

$datos = [
    'movil' => $_POST['movil'],
    'nombre' => $_POST['nombre'],
    'primer_apellido' => $_POST['primer_apellido'],
    'segundo_apellido' => $_POST['segundo_apellido'],
    'parentesco' => $_POST['parentesco'],
    'id_cat_estatus' => $_POST['id_cat_estatus_emergencia'],
    'id_tbl_empleados' => $_POST['id_tbl_empleados_hraes'],
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelEmergenciaM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelEmergenciaM ->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

