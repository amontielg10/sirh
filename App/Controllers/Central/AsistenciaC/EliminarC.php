<?php
include '../librerias.php';

$asistenciaM = new AsistenciaM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_asistencia' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($asistenciaM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_asistencia',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'delete';
    }
} 
