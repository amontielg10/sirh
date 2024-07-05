<?php
include '../librerias.php';

$modelFormaPagoM = new ModelFormaPagoM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_cuenta_clabe_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelFormaPagoM-> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => 'central.ctrl_cuenta_clabe_hraes',
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'delete';
    }
} 
