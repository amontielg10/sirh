<?php
include '../librerias.php';

$lenguaM = new LenguaM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_lengua' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($lenguaM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_lengua',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'delete';
    }
} 
