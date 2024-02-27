<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_tbl_empleados = $_POST['id_tbl_empleados']; 
$pais_nacimiento = $_POST['pais_nacimiento']; 
$id_cat_genero = $_POST['id_cat_genero']; 
$id_cat_estado_civil = $_POST['id_cat_estado_civil']; 
$id_cat_nivel_estudios = $_POST['id_cat_nivel_estudios']; 
$crypt = base64_encode ($id_tbl_empleados);

try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_datos_empleado', array(
    'pais_nacimiento' => $pais_nacimiento,
    'id_cat_genero' => $id_cat_genero,  
    'id_cat_estado_civil' => $id_cat_estado_civil,   
    'id_cat_nivel_estudios' => $id_cat_nivel_estudios,
    'id_tbl_empleados' => $id_tbl_empleados
));

if ($pgs_QRY ) {
    header("Location: ../../view/DatosEmpleado/Listar.php?D-F=".$crypt); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}