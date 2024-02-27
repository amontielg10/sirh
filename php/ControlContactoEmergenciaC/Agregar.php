<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$nombre = $_POST['nombre']; 
$primer_apellido = $_POST['primer_apellido']; 
$segundo_apellido = $_POST['segundo_apellido']; 
$parentesco = $_POST['parentesco']; 
$movil = $_POST['movil']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_contacto_emergencia', array(
    'nombre' => $nombre,
    'primer_apellido' => $primer_apellido,  
    'segundo_apellido' => $segundo_apellido,  
    'parentesco' => $parentesco,
    'movil' => $movil,
    'id_cat_estatus' => $id_cat_estatus,
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/ContactoEmergencia/Listar.php?D-F=".$crypt); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}