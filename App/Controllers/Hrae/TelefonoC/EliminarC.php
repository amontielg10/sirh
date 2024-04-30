<?php
include '../librerias.php';

$modelTelefonoM = new ModelTelefonoM();

$condicion = [
    'id_ctrl_telefono_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelTelefonoM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
