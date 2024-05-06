<?php
include '../librerias.php';

$modelDependientesM = new ModelDependientesM();

$condicion = [
    'id_ctrl_dependientes_economicos_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelDependientesM-> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
