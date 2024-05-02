<?php
include '../librerias.php';

$modelEmergenciaM = new ModelEmergenciaM();

$condicion = [
    'id_ctrl_contacto_emergencia_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelEmergenciaM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
