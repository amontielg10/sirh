<?php

include('../../validar_sesion.php');
include ("../../conexion.php");//Se incluye el metodo de conexion para las consultas

$id_cat_plazas = $_POST['id_cat_plazas']; 
$id_cat_tipo_contratacion = $_POST['id_cat_tipo_contratacion']; 
$id_cat_unidad_responsable = $_POST['id_cat_unidad_responsable']; 
$id_cat_puesto = $_POST['id_cat_puesto']; 
$id_cat_zonas_tabuladores = $_POST['id_cat_zonas_tabuladores']; 
$id_cat_niveles = $_POST['id_cat_niveles']; 
$zona_pagadora = $_POST['zona_pagadora']; 
$fecha_ini_contrato = $_POST['fecha_ini_contrato']; 


try {
//Se ejecuta la funcion insert SQL, para guardar cambios
$pgs_QRY = pg_insert($connectionDBsPro, 'tbl_control_plazas', array(
    'id_cat_plazas' => $id_cat_plazas,
    'id_cat_tipo_contratacion' => $id_cat_tipo_contratacion,   
    'id_cat_unidad_reponsable' => $id_cat_unidad_responsable,
    'id_cat_puesto' => $id_cat_puesto,
    'id_cat_zonas_tabuladores' => $id_cat_zonas_tabuladores,
    'id_cat_niveles' => $id_cat_niveles,
    'zona_pagadora' => $zona_pagadora,
    'fecha_ini_contrato' => $fecha_ini_contrato
));

if ($pgs_QRY ) {
    header("Location: ../../view/Plazas/Listar.php"); //Regreso a la tabla
} 
} catch (\Throwable $th) {
    header("Location: error.php".$th); //Muestra error
}