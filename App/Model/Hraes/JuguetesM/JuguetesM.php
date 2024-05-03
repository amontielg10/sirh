<?php

class ModelJuguetesM
{
    function listarById($id_object)
    {
        $listado = pg_query("SELECT ctrl_juguetes_hraes.id_ctrl_juguetes_hraes,
                                    CONCAT(ctrl_dependientes_economicos_hraes.nombre, ' ',
                                    ctrl_dependientes_economicos_hraes.apellido_paterno, ' ',
                                    ctrl_dependientes_economicos_hraes.apellido_materno,' '),
                                    cat_fecha_juguetes.fecha,
                                    cat_estatus_juguetes.estatus
                            FROM ctrl_juguetes_hraes
                            INNER JOIN cat_fecha_juguetes
                            ON ctrl_juguetes_hraes.id_cat_fecha_juguetes = 
                                cat_fecha_juguetes.id_cat_fecha_juguetes
                            INNER JOIN cat_estatus_juguetes
                            ON ctrl_juguetes_hraes.id_cat_estatus_juguetes = 
                                cat_estatus_juguetes.id_cat_estatus_juguetes
                            INNER JOIN ctrl_dependientes_economicos_hraes
                            ON ctrl_juguetes_hraes.id_ctrl_dependientes_economicos_hraes = 
                                ctrl_dependientes_economicos_hraes.id_ctrl_dependientes_economicos_hraes
                            WHERE ctrl_juguetes_hraes.id_tbl_empleados_hraes = $id_object
                            ORDER BY ctrl_juguetes_hraes.id_ctrl_juguetes_hraes DESC
                            LIMIT 5;");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_juguetes_hraes' => null,
            'id_cat_fecha_juguetes' => null,
            'id_cat_estatus_juguetes' => null,
            'id_tbl_empleados_hraes' => null,
            'id_ctrl_dependientes_economicos_hraes' => null
        ];
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_juguetes_hraes,id_cat_fecha_juguetes,
                                    id_cat_estatus_juguetes,id_tbl_empleados_hraes,
                                    id_ctrl_dependientes_economicos_hraes
                             FROM ctrl_juguetes_hraes
                             WHERE id_ctrl_juguetes_hraes = $id_object");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_juguetes_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_juguetes_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_juguetes_hraes', $condicion);
        return $pgs_delete;
    }

    function listarByBusqueda($id_object, $busqueda)
    {
        $listado = pg_query("SELECT ctrl_juguetes_hraes.id_ctrl_juguetes_hraes,
                                    CONCAT(ctrl_dependientes_economicos_hraes.nombre, ' ',
                                    ctrl_dependientes_economicos_hraes.apellido_paterno, ' ',
                                    ctrl_dependientes_economicos_hraes.apellido_materno,' '),
                                    cat_fecha_juguetes.fecha,
                                    cat_estatus_juguetes.estatus
                            FROM ctrl_juguetes_hraes
                            INNER JOIN cat_fecha_juguetes
                            ON ctrl_juguetes_hraes.id_cat_fecha_juguetes = 
                                cat_fecha_juguetes.id_cat_fecha_juguetes
                            INNER JOIN cat_estatus_juguetes
                            ON ctrl_juguetes_hraes.id_cat_estatus_juguetes = 
                                cat_estatus_juguetes.id_cat_estatus_juguetes
                            INNER JOIN ctrl_dependientes_economicos_hraes
                            ON ctrl_juguetes_hraes.id_ctrl_dependientes_economicos_hraes = 
                                ctrl_dependientes_economicos_hraes.id_ctrl_dependientes_economicos_hraes
                            WHERE ctrl_juguetes_hraes.id_tbl_empleados_hraes = $id_object
                            AND (TRIM(UPPER(UNACCENT(ctrl_dependientes_economicos_hraes.nombre))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(ctrl_dependientes_economicos_hraes.apellido_paterno))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(ctrl_dependientes_economicos_hraes.apellido_materno))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(cat_fecha_juguetes.fecha))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(cat_estatus_juguetes.estatus))) 
                                    LIKE '%$busqueda%'
                            )
                            ORDER BY ctrl_juguetes_hraes.id_ctrl_juguetes_hraes DESC
                            LIMIT 5;");
        return $listado;
    }
}
