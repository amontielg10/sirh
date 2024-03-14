<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listarCatSepmexEstado()
{
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT DISTINCT d_estado,c_estado FROM cat_sepomex ORDER BY d_estado ASC");
    return $listado;
}

function listarCatSepmexMunicipio($id)
{
    $listado = pg_query("SELECT DISTINCT d_mnpio, c_mnpio, c_estado FROM cat_sepomex WHERE c_estado = $id ORDER BY d_mnpio ASC");
    return $listado;
}

function listarCatSepmexColonia($id)
{
    $listado = pg_query("SELECT DISTINCT id_cat_sepomex, colonia_origen,c_mnpio FROM cat_sepomex WHERE c_mnpio = $id ORDER BY colonia_origen ASC");
    return $listado;
}

function listadoCatTurnoPk($id)
{
    if ($id != null) {
        $catSQL = pg_query("SELECT clave_turno,turno_desc FROM cat_turno WHERE id_cat_turno = '$id' ");
        $row = pg_fetch_array($catSQL);
        $res = $row['clave_turno'].' - '.$row['turno_desc'];
        return $res;
    } else {
        return "";
    }
}

