<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoDependientesEconomicosId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM tbl_dependientes_economicos WHERE id_tbl_empleados = '$id' ORDER BY  tbl_dependientes_economicos DESC");
     return $listado;
}

function listadoDependientesEconomicosPk($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_dependientes_economicos WHERE id_tbl_dependientes_economicos = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}
