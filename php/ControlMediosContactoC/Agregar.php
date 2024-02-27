<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$correo_electronico = $_POST['correo_electronico']; 
$id_cat_estatus = $_POST['id_cat_estatus']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'ctrl_medios_contacto', array(
    'correo_electronico' => $correo_electronico,
    'id_cat_estatus' => $id_cat_estatus,  
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/MediosContacto/Listar.php?D-F=".$crypt); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}