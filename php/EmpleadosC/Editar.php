<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_control_plazas = base64_decode($_POST['id_tbl_control_plazas']);
$id_tbl_centro_trabajo = $_POST['id_tbl_centro_trabajo'];
$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$codigo_empleado = $_POST['codigo_empleado']; 
$fecha_ingreso = $_POST['fecha_ingreso']; 
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apellido = $_POST['segundo_apellido']; 
$rfc = $_POST['rfc']; 
$nss = $_POST['nss']; 
$fecha_baja = $_POST['fecha_baja']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$id_tbl_movimientos = $_POST['id_tbl_movimientos']; 
$crypt = base64_encode($id_tbl_control_plazas);

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_empleados' => $id_tbl_empleados
);

$arrayUpdate = array(
    'codigo_empleado' => $codigo_empleado,
    'fecha_ingreso' => $fecha_ingreso,  
    'curp' => $curp,   
    'nombre' => $nombre,  
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apellido,  
    'rfc' => $rfc, 
    'nss' => $nss,
    'fecha_baja' => $fecha_baja,
    'id_cat_estatus' => $id_cat_estatus,
    'id_tbl_movimientos' => $id_tbl_movimientos
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_empleados', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Empleados/Listar.php?D-F3=".$crypt.'&RP='.$id_tbl_centro_trabajo); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}