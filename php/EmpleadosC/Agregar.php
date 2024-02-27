<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$codigo_empleado = $_POST['codigo_empleado']; 
$fecha_ingreso = $_POST['fecha_ingreso']; 
$curp = $_POST['curp']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apelldio = $_POST['segundo_apelldio']; 
$rfc = $_POST['rfc']; 
$nss = $_POST['nss']; 

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_empleados', array(
    'codigo_empleado' => $codigo_empleado,
    'fecha_ingreso' => $fecha_ingreso,  
    'curp' => $curp,   
    'nombre' => $nombre,  
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apelldio,  
    'rfc' => $rfc,  
    'nss' => $nss
));

if ($pgs_QRY ) {
    header("Location: ../../view/Empleados/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}