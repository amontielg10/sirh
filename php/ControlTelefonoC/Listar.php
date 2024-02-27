<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoTelefonoId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_telefono WHERE id_tbl_empleados = '$id' ORDER BY movil ASC");
     return $listado;
}

function listadoTelefonoPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_telefono WHERE id_ctrl_telefono = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
