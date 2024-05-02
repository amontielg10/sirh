<?php
include '../librerias.php';

$modelDependientesM = new ModelDependientesM();

$condicion = [
    'id_ctrl_dependientes_economicos_hraes' => $_POST['id_object']
];

$datos = [
    'nombre' => $_POST['nombre'],
    'curp' => $_POST['curp'],
    'apellido_paterno' => $_POST['apellido_paterno'],
    'apellido_materno' => $_POST['apellido_materno'],
    'id_cat_dependientes_economicos' => $_POST['id_cat_dependientes_economicos'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelDependientesM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelDependientesM ->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

