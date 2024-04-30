<?php 
include '../../../../conexion.php';
include '../../../Model/Hraes/CentroTrabajoM/CentroTrabajoM.php';

$model = new modelCentroTrabajoHraes();

$condicion = [
    'id_tbl_centro_trabajo_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($model -> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
