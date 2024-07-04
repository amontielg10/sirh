<?php 
include '../../../../conexion.php';
include '../../../Model/Central/EmpleadosM/EmpleadosM.php';
include '../../../View/validar_sesion.php';
include '../../../Model/Central/BitacoraM/BitacoraM.php';

$model = new modelEmpleadosHraes();
$bitacoraM = new BitacoraM();
$tablaEmpleados = 'central.tbl_empleados_hraes';

$condicion = [
    'id_tbl_empleados_hraes' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($model -> eliminarByArray($connectionDBsPro, $condicion)){
        $dataBitacora = [
            'nombre_tabla' => $tablaEmpleados,
            'accion' => 'ELIMINAR',
            'valores' => json_encode($condicion),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'delete';
    }
} 
