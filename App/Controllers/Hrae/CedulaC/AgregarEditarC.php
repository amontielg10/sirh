<?php
include '../librerias.php';

$modelCedulaM = new modelCedulaM();

$condicion = [
    'id_ctrl_cedula_empleados_hraes' => $_POST['id_object']
];

$datos = [
    'cedula_profesional' => $_POST['cedula_profesional'],
    'id_tbl_empleados' => $_POST['id_tbl_empleados_hraes']
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelCedulaM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelCedulaM->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

