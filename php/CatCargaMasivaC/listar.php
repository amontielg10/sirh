<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoCargaMasivaByAll()
{
    $listado = pg_query("SELECT id_cat_carga_masiva,nombre 
                         FROM cat_carga_masiva");
    return $listado;
}

//La funcion retorna solo el estatu