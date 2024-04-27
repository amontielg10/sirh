<?php 
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$model = new modelPlazasHraes();

$condicion = [
    'id_tbl_control_plazas_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($model -> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
