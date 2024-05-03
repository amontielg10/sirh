<?php
include '../librerias.php';

$modelJuguetesM = new ModelJuguetesM();

$condicion = [
    'id_ctrl_juguetes_hraes' => $_POST['id_object']
];

$datos = [
    'id_ctrl_dependientes_economicos_hraes' => $_POST['id_ctrl_dependientes_economicos_hraes'],
    'id_cat_fecha_juguetes' => $_POST['id_cat_fecha_juguetes'],
    'id_cat_estatus_juguetes' => $_POST['id_cat_estatus_juguetes'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelJuguetesM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelJuguetesM ->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

