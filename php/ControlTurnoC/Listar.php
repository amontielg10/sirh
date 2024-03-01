<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoTurnoId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_turno WHERE id_tbl_empleados = '$id'");
     return $listado;
}

function listadoTurnoPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_turno WHERE id_ctrl_turno = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
