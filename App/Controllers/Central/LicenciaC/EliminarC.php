<?php
include '../librerias.php';

$modelLicenciasM = new ModelLicenciasM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_incidencias_licencias_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelLicenciasM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'central.id_ctrl_incidencias_licencias_hraes',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'delete';
    }
} 
