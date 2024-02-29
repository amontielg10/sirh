<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$id_ctrl_retardo = $_POST['id_ctrl_retardo']; 
$fecha = $_POST['fecha']; 
$hora_entrada = $_POST['hora_entrada']; 
$hora_salida = $_POST['hora_salida']; 
$crypt = base64_encode($id_tbl_empleados);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_ctrl_retardo' => $id_ctrl_retardo
);

$arrayUpdate = array(
    'fecha' => $fecha,
    'hora_entrada' => $hora_entrada,
    'hora_salida' => $hora_salida
);
$pgs_QRY = pg_update($connectionDBsPro, 'ctrl_retardo', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Retardo/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}