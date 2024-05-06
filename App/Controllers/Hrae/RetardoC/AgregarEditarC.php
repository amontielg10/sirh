<?php
include '../librerias.php';

$modelRetardoM = new ModelRetardoM();
$h1 = $_POST['hora_entrada'];
$h2 = $_POST['hora_salida'];
list($hora_entrada, $minuto_entrada) = explode(':', $h1);
list($hora_salida, $minuto_salida) = explode(':', $h2);

$condicion = [
    'id_ctrl_retardo_hraes' => $_POST['id_object']
];

$datos = [
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    'fecha' => $_POST['fecha_retardo'],
    'hora_entrada' => $hora_entrada,
    'minuto_entrada' => $minuto_entrada,
    'hora_salida' => $hora_salida,
    'minuto_salida' => $minuto_salida
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelRetardoM ->editarByArray($connectionDBsPro, $datos, $condicion)) {
        echo 'edit';
    }

} else { //Agregar
    if ($modelRetardoM ->agregarByArray($connectionDBsPro, $datos)) {
        echo 'add';
    }
}

