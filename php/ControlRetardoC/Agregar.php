<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_empleados = $_POST['id_tbl_empleados'];
$id_tbl_control_plazas = $_POST['id_tbl_control_plazas']; 
$fecha = $_POST['fecha']; 
$hora_entrada = $_POST['hora_entrada']; 
$hora_salida = $_POST['hora_salida']; 
$crypt = base64_encode ($id_tbl_empleados);


try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_retardo', array(
    'fecha' => $fecha,
    'hora_entrada' => $hora_entrada,  
    'hora_salida' => $hora_salida,
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/Retardo/Listar.php?D-F=".$crypt.'&D-F3='.$id_tbl_control_plazas); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}