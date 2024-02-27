<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoCuentaClabeId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_cuenta_clabe WHERE id_tbl_empleados = '$id'");
     return $listado;
}

function listadoCuentaClabePk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_cuenta_clabe WHERE id_ctrl_cuenta_clabe = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
