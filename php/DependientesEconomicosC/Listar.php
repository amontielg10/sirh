<?php
include ('../../validar_sesion.php');    //Se incluye validar_sesion
include ('../../conexion.php'); //Se incluye la conexion

//La variable contiene el listado
function listadoDependientesEconomicosId($id)
{
     include ('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM tbl_dependientes_economicos WHERE id_tbl_empleados = '$id' ORDER BY  tbl_dependientes_economicos DESC");
     return $listado;
}

function listadoDependientesEconomicosPk($id)
{
     $catSQL = pg_query("SELECT * FROM tbl_dependientes_economicos WHERE id_tbl_dependientes_economicos = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function listarParaJuguetesNombre($id_tbl_dependientes_economicos)
{
     if ($id_tbl_dependientes_economicos != null) {
          $catSQL = pg_query("SELECT id_tbl_dependientes_economicos, nombre, apellido_paterno,
                                     apellido_materno
                              FROM tbl_dependientes_economicos
                              WHERE id_tbl_dependientes_economicos = $id_tbl_dependientes_economicos ");
          $row = pg_fetch_array($catSQL);
          $res = $row['nombre'] . '  ' . $row['apellido_paterno'] . ' ' . $row['apellido_materno'];
          return $res;
     } else {
          return "";
     }
}


function listarParaJuguetesCurp($id_tbl_dependientes_economicos)
{
     if ($id_tbl_dependientes_economicos != null) {
          $catSQL = pg_query("SELECT id_tbl_dependientes_economicos, curp
                              FROM tbl_dependientes_economicos
                              WHERE id_tbl_dependientes_economicos = $id_tbl_dependientes_economicos ");
          $row = pg_fetch_array($catSQL);
          $res = $row['curp'];
          return $res;
     } else {
          return "";
     }
}

