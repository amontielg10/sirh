<?php

class ModelRetardoM
{
    function listarById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_retardo_hraes, fecha, hora_entrada, minuto_entrada,
                                    hora_salida, minuto_salida, id_tbl_empleados_hraes
                             FROM ctrl_retardo_hraes
                             WHERE id_tbl_empleados_hraes = $id_object
                             ORDER BY id_ctrl_retardo_hraes DESC
                             LIMIT 5;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_retardo_hraes, fecha, hora_entrada, minuto_entrada,
                                    hora_salida, minuto_salida, id_tbl_empleados_hraes
                            FROM ctrl_retardo_hraes
                            WHERE id_ctrl_retardo_hraes = $id_object
                            ORDER BY id_ctrl_retardo_hraes DESC
                            LIMIT 5;");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_retardo_hraes' => null,
            'fecha' => null,
            'hora_entrada' => null,
            'minuto_entrada' => null,
            'hora_salida' => null,
            'minuto_salida' => null,
            'id_tbl_empleados_hraes' => null,
        ];
    }

    /*
    function listarByBusqueda($id_object, $busqueda)
    {
        $listado = pg_query("SELECT ctrl_telefono_hraes.id_ctrl_telefono_hraes, 
                                                ctrl_telefono_hraes.movil, 
                                                ctrl_telefono_hraes.id_cat_estatus,
                                                ctrl_telefono_hraes.id_tbl_empleados_hraes,
                                                cat_estatus.estatus
                                            FROM ctrl_telefono_hraes
                                            INNER JOIN cat_estatus
                                            ON ctrl_telefono_hraes.id_cat_estatus = cat_estatus.id_cat_estatus
                                            WHERE ctrl_telefono_hraes.id_tbl_empleados_hraes = $id_object
                                            AND (ctrl_telefono_hraes.movil LIKE '%$busqueda%' 
                                            OR cat_estatus.estatus LIKE '%$busqueda%')");
        return $listado;
    }

    
*/
    

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_retardo_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_retardo_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_retardo_hraes', $condicion);
        return $pgs_delete;
    }
}
