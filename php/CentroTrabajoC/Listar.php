<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
$listado = pg_query($connectionDBsPro, "SELECT id_estatus_centro, id_cat_region, id_cat_sepomex, longitud, latitud, num_interior, num_exterior, codigo_postal_origen, colonia_origen, pais, nombre, clave_centro_trabajo, id_tbl_centro_trabajo FROM tbl_centro_trabajo ORDER BY id_tbl_centro_trabajo DESC LIMIT 100");

//La funcion retorna los atributos dependiendo del id que se ingrese como parametro
function catcentroTrabajo($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_centro_trabajo WHERE id_tbl_centro_trabajo = '$id'");
     $row = pg_fetch_array($catSQL);
     return $row;
}


function catcentroTrabajoPk($id)
{
     if ($id != null) {
          $catSQL = pg_query("SELECT clave_centro_trabajo FROM tbl_centro_trabajo WHERE id_tbl_centro_trabajo = '$id' LIMIT 1");
          $row = pg_fetch_array($catSQL);
          $res = $row["clave_centro_trabajo"];
          return $res;
     } else {
          return "";
     }
}

function claveCentro($id_tbl_control_plazas)
{
     $catSQL = pg_query("SELECT clave_centro_trabajo FROM tbl_centro_trabajo
          INNER JOIN tbl_control_plazas 
          ON tbl_centro_trabajo.id_tbl_centro_trabajo = tbl_control_plazas.id_tbl_centro_trabajo
          WHERE tbl_control_plazas.id_tbl_control_plazas = '$id_tbl_control_plazas'");
     $row = pg_fetch_array($catSQL);
     $res = $row["clave_centro_trabajo"];
     return $res;
}
