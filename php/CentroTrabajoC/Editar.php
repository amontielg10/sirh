<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_centro_trabajo = $_POST["id_tbl_centro_trabajo"]; 
$clave_centro_trabajo = $_POST["clave_centro_trabajo"]; 
$nombre = $_POST["nombre"]; 
$pais = $_POST["pais"]; 
$colonia_origen = $_POST["colonia_origen"]; 
$codigo_postal_origen = $_POST["codigo_postal_origen"]; 
$num_exterior = $_POST["num_exterior"]; 
$num_interior = $_POST["num_interior"]; 
$latitud = $_POST["latitud"]; 
$longitud = $_POST["longitud"]; 
$id_cat_sepomex = $_POST["id_cat_sepomex"]; 
$id_cat_region = $_POST["id_cat_region"]; 
$id_estatus_centro = $_POST["id_estatus_centro"]; 

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_centro_trabajo' => $id_tbl_centro_trabajo
);

$arrayUpdate = array(
    'clave_centro_trabajo' => $clave_centro_trabajo,
    'nombre' => $nombre,
    'pais' => $pais,
    'colonia_origen' => $colonia_origen,
    'codigo_postal_origen' => $codigo_postal_origen,
    'num_exterior' => $num_exterior,
    'num_interior' => $num_interior,
    'latitud' => $latitud,
    'longitud' => $longitud,
    'id_cat_sepomex' => $id_cat_sepomex,
    'id_cat_region' => $id_cat_region,
    'id_estatus_centro' => $id_estatus_centro,
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_centro_trabajo', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/CentroTrabajo/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}