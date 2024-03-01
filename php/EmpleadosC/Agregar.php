<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_control_plazas = base64_decode($_POST['id_tbl_control_plazas']);
$codigo_empleado = $_POST['codigo_empleado']; 
$fecha_ingreso = $_POST['fecha_ingreso']; 
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apelldio = $_POST['segundo_apelldio']; 
$rfc = $_POST['rfc']; 
$nss = $_POST['nss']; 
$fecha_baja = $_POST['fecha_baja']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$id_tbl_movimientos = $_POST['id_tbl_movimientos']; 
$crypt = base64_encode($id_tbl_control_plazas);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_empleados', array(
    'id_tbl_control_plazas' => $id_tbl_control_plazas,
    'codigo_empleado' => $codigo_empleado,
    'fecha_ingreso' => $fecha_ingreso,  
    'curp' => $curp,   
    'nombre' => $nombre,  
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apelldio,  
    'rfc' => $rfc,  
    'nss' => $nss,
    'fecha_baja' => $fecha_baja,
    'id_cat_estatus' => $id_cat_estatus,
    'id_tbl_movimientos' => $id_tbl_movimientos
));

if ($pgs_QRY ) {
    header("Location: ../../view/Empleados/Listar.php?D-F3=".$crypt); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}
