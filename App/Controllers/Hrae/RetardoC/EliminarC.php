<?php
include '../librerias.php';

$modelRetardoM = new ModelRetardoM();

$condicion = [
    'id_ctrl_retardo_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelRetardoM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
