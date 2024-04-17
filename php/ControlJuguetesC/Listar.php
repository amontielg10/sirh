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

function insertarCtrlJuguetes($connectionDBsPro, $id_cat_fecha_juguetes, $id_cat_estatus_juguetes, $id_tbl_empleados, $id_tbl_dependientes_economicos,$id_ctrl_carga_masiva)
{
    $pgs_QRY = pg_insert(
        $connectionDBsPro,
        'ctrl_juguetes',
        array(
            'id_cat_fecha_juguetes' => $id_cat_fecha_juguetes,
            'id_cat_estatus_juguetes' => $id_cat_estatus_juguetes,
            'id_tbl_empleados' => $id_tbl_empleados,
            'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos,
            'id_ctrl_carga_masiva' => $id_ctrl_carga_masiva
        )
    );
}