<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listado()
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query($connectionDBsPro, "SELECT id_tbl_control_plazas, num_plaza,
                              id_cat_plazas, id_cat_tipo_contratacion, id_cat_situacion_plaza,
                              id_cat_unidad_reponsable, id_tbl_centro_trabajo, id_cat_puesto, id_cat_zonas_tabuladores,
                              id_cat_niveles, zona_pagadora, fecha_ini_contrato, fecha_fin_contrato,
                              fecha_modificacion FROM tbl_control_plazas ORDER BY id_tbl_control_plazas DESC LIMIT 50");
     return $listado;
}

function listadoPlazas($id)
{
     $listado = pg_query("SELECT id_tbl_control_plazas, num_plaza,
                              id_cat_plazas, id_cat_tipo_contratacion, id_cat_situacion_plaza,
                              id_cat_unidad_reponsable, id_tbl_centro_trabajo, id_cat_puesto, id_cat_zonas_tabuladores,
                              id_cat_niveles, zona_pagadora, fecha_ini_contrato, fecha_fin_contrato,
                              fecha_modificacion FROM tbl_control_plazas WHERE id_tbl_centro_trabajo = '$id' ");
     return $listado;
}

//La funcion retorna los atributos dependiendo del id que se ingrese como parametro
function catControlPlazasPk($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_control_plazas WHERE id_tbl_control_plazas = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function listadoPlazasCPk($id)
{
     $listado = pg_query("SELECT * FROM tbl_control_plazas WHERE id_tbl_control_plazas = '$id' ");
     return $listado;
}

function listarIdPlazasCentro($id)
{
     $listado = pg_query("SELECT id_tbl_centro_trabajo FROM tbl_control_plazas WHERE id_tbl_control_plazas = '$id' LIMIT 1");
     $row = pg_fetch_array($listado);
     $res = $row['id_tbl_centro_trabajo'];
     return $res;
}

function listarLikePlaza($like)
{
     $listado = pg_query("SELECT * FROM tbl_control_plazas WHERE num_plaza LIKE '%$like%'");
     return $listado;
}
