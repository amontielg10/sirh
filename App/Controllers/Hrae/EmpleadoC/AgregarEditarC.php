<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';

$model = new modelEmpleadosHraes();

$condicion = [
    'id_tbl_empleados_hraes' => $_POST['id_object']
];

$datos = [
    'nombre' => $_POST['nombre'],
    'rfc' => $_POST['rfc'],
    'primer_apellido' => $_POST['primer_apellido'],
    'curp' => $_POST['curp'],
    'segundo_apellido' => $_POST['segundo_apellido'],
    'nss' => $_POST['nss'],
    'id_cat_estado_civil' => $_POST['id_cat_estado_civil'],
    'id_cat_genero' => $_POST['id_cat_genero'],
    'num_empleado' => $_POST['num_empleado'],
    'pais_nacimiento' => $_POST['pais_nacimiento'],
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


