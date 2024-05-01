<?php
include '../librerias.php';

$modelFormaPagoM = new ModelFormaPagoM();

$condicion = [
    'id_ctrl_cuenta_clabe_hraes' => $_POST['id_object']
];

$datos = [
    'clabe' => $_POST['clabe'],
    'id_tbl_empleados' => $_POST['id_tbl_empleados_hraes'],
    'id_cat_banco' => $_POST['id_cat_banco'],
    'id_cat_estatus' => $_POST['id_cat_estatus_formato_pago'],
    'id_cat_formato_pago' => $_POST['id_cat_formato_pago'],
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelFormaPagoM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelFormaPagoM ->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

