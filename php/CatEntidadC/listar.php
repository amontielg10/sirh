<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

function listadoCatEntidadPk($idCatEntidad){
    include('../../conexion.php'); //Se incluye la conexion
    $listado = pg_query($connectionDBsPro, "SELECT id_cat_entidad, entidad
                                            FROM cat_entidad 
                                            WHERE id_cat_entidad = $idCatEntidad
                                            ORDER BY entidad ASC"); 
    $row = pg_fetch_array($listado);
    $res = $row['entidad'];
    return $res;
}
  
/*
//La funcion retorna solo el estatus
function catGeneroPk($id){
    if ($id != null){
    $catSQL = pg_query("SELECT * FROM cat_genero WHERE id_cat_genero = '$id' ");
    $row = pg_fetch_array($catSQL);
    $res = $row['genero'];
    return $res;
    } else {
        return "";
    }
}
*/