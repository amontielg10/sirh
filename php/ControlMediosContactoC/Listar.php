<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoMediosContactoId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_medios_contacto WHERE id_tbl_empleados = '$id'");
     return $listado;
}

function listadoMediosContactoPk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_medios_contacto WHERE id_ctrl_medios_contacto = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
