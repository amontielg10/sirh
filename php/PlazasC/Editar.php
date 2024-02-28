<?php
include('../../validar_sesion.php');
include("../../conexion.php"); //Se incluye la conexion

$id_tbl_control_plazas = $_POST["id_tbl_control_plazas"]; 
$num_plaza = $_POST["num_plaza"]; 
$id_cat_plazas = $_POST["id_cat_plazas"]; 
$id_cat_tipo_contratacion = $_POST["id_cat_tipo_contratacion"]; 
$id_cat_unidad_responsable = $_POST["id_cat_unidad_responsable"]; 
$id_cat_puesto = $_POST["id_cat_puesto"]; 
$id_cat_zonas_tabuladores = $_POST["id_cat_zonas_tabuladores"]; 
$id_cat_niveles = $_POST["id_cat_niveles"]; 
$zona_pagadora = $_POST["zona_pagadora"]; 
$fecha_ini_contrato = $_POST["fecha_ini_contrato"]; 

try {
//El array trae la condicion
$arrayCondition = array(
    'id_tbl_control_plazas' => $id_tbl_control_plazas
);

$arrayUpdate = array(
    'num_plaza' => $num_plaza,
    'id_cat_plazas' => $id_cat_plazas,
    'id_cat_tipo_contratacion' => $id_cat_tipo_contratacion,
    'id_cat_unidad_reponsable' => $id_cat_unidad_responsable,
    'id_cat_puesto' => $id_cat_puesto,
    'id_cat_zonas_tabuladores' => $id_cat_zonas_tabuladores,
    'id_cat_niveles' => $id_cat_niveles,
    'zona_pagadora' => $zona_pagadora,
    'fecha_ini_contrato' => $fecha_ini_contrato
);
$pgs_QRY = pg_update($connectionDBsPro, 'tbl_control_plazas', $arrayUpdate, $arrayCondition);

if ($pgs_QRY) {
    header("Location: ../../view/Plazas/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}