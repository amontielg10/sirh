<?php
include '../librerias.php';

$modelJuguetesM = new ModelJuguetesM();

$condicion = [
    'id_ctrl_juguetes_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelJuguetesM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
