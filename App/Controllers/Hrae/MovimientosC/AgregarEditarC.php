<?php
include '../librerias.php';

$modelTelefonoM = new ModelTelefonoM();

$condicion = [
    'id_ctrl_telefono_hraes' => $_POST['id_object']
];

$datos = [
    'movil' => $_POST['movil'],
    'id_cat_estatus' => $_POST['id_cat_estatus'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelTelefonoM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelTelefonoM->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

