<?php
include('../../validar_sesion.php');    //Se incluye validar_sesion
include('../../conexion.php'); //Se incluye la conexion



function listarCtrlJuguetes($id_tbl_empleados){
     $listado = pg_query("SELECT id_ctrl_juguetes, id_cat_fecha_juguetes, id_cat_estatus_juguetes, 
                                 id_tbl_empleados, id_tbl_dependientes_economicos
                          FROM ctrl_juguetes
                          WHERE id_tbl_empleados = $id_tbl_empleados");
     return $listado; 
}

function listarCtrlJuguetesById($id_ctrl_juguetes){
     $listado = pg_query("SELECT id_ctrl_juguetes, id_cat_fecha_juguetes, id_cat_estatus_juguetes, 
                                 id_tbl_dependientes_economicos
                          FROM ctrl_juguetes
                          WHERE id_ctrl_juguetes = $id_ctrl_juguetes");
     $row = pg_fetch_array($listado);
     return $row;
}

function listarCtrlJuguetesByJson()
{
     $list = pg_query("SELECT id_cat_fecha_juguetes, id_tbl_dependientes_economicos,id_ctrl_juguetes
                         FROM ctrl_juguetes");
     while ($value = pg_fetch_array($list)) {
          $row[] = $value["id_cat_fecha_juguetes"];
          $row[] = $value["id_tbl_dependientes_economicos"];
          $row[] = $value["id_ctrl_juguetes"];
     }
     $json = json_encode($row);
     return $json;
}

/*
//La variable contiene el listado
function listadoCuentaClabeId($id)
{
     include('../../conexion.php'); //Se incluye la conexion
     $listado = pg_query("SELECT * FROM ctrl_cuenta_clabe WHERE id_tbl_empleados = '$id' ORDER BY id_cat_estatus ASC");
     return $listado;
}

function listadoCuentaClabePk($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_cuenta_clabe WHERE id_ctrl_cuenta_clabe = '$id' ");
     $row = pg_fetch_array($catSQL);
     return $row;
}

function estatusCuentaCv($id)
{
     $catSQL = pg_query("SELECT * FROM ctrl_cuenta_clabe WHERE id_tbl_empleados = '$id' AND id_cat_estatus = 1");
     while ($value = pg_fetch_array($catSQL)) {
          $row[] = $value["id_cat_estatus"];
          $row[] = $value["id_ctrl_cuenta_clabe"];
     }
     $json = json_encode($row);
     return $json;
}

*/