<?php
include '../librerias.php';

$modelFormaPagoM = new ModelFormaPagoM();

$condicion = [
    'id_ctrl_cuenta_clabe_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelFormaPagoM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
