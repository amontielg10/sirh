<?php
include '../librerias.php';

$modelMovimientosM = new ModelMovimientosM();
$nombreTabla = 'tbl_plazas_empleados_hraes';

$condicion = [
    'id_tbl_plazas_empleados_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelMovimientosM-> eliminarByArray($connectionDBsPro, $condicion,$nombreTabla)){
        echo 'delete';
    }
} 
