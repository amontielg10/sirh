<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/CentroTrabajoM/CentroTrabajoM.php';

$model = new modelCentroTrabajoHraes();

$condicion = [
    'id_tbl_centro_trabajo_hraes' => $_POST['id_object']
];

$datos = [
    'id_cat_entidad' => $_POST['id_cat_entidad'],
    'id_cat_region' => $_POST['id_cat_region'],
    'id_estatus_centro' => $_POST['id_estatus_centro'],
    'nombre' => $_POST['nombre'],
    'clave_centro_trabajo' => $_POST['clave_centro_trabajo'],
    'colonia' => $_POST['colonia'],
    'codigo_postal' => $_POST['codigo_postal'],
    'num_exterior' => $_POST['num_exterior'],
    'num_interior' => $_POST['num_interior'],
    'latitud' => $_POST['latitud'],
    'longitud' => $_POST['longitud'],
];

if ($_POST['id_object'] != null) { //Modificar
    if ($model->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($model->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}


