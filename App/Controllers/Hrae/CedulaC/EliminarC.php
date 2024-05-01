<?php
include '../librerias.php';

$modelCedulaM = new ModelCedulaM();

$condicion = [
    'id_ctrl_cedula_empleados_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelCedulaM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
