<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$codigo_empleado = $_POST['codigo_empleado']; 
$fecha_ingreso = $_POST['fecha_ingreso']; 
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apellido = $_POST['segundo_apellido']; 
$rfc = $_POST['rfc']; 
$nss = $_POST['nss']; 

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
    'nss' => $nss
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_empleados', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Empleados/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}