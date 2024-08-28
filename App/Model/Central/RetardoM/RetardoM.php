<?php

class ModelRetardoM
{
    function listarById($id_object,$paginator)
    {
        $listado = pg_query("SELECT 
                                central.ctrl_retardo.id_ctrl_retardo,
                                TO_CHAR(central.ctrl_retardo.fecha, 'DD/MM/YYYY'),
                                TO_CHAR(central.ctrl_retardo.hora, 'HH24:MI'),
                                UPPER(central.cat_retardo_tipo.descripcion),
                                UPPER(central.cat_retardo_estatus.descripcion),
                                UPPER(central.ctrl_retardo.observaciones),
                                CONCAT(central.cat_quincenas.no_quincena, ' - ', central.cat_quincenas.nombre),
                                CONCAT(TO_CHAR(central.cat_quincenas.fecha_inicio, 'DD/MM/YYYY'), ' - ',
                                TO_CHAR(central.cat_quincenas.fecha_fin, 'DD/MM/YYYY')),
                                central.ctrl_retardo.id_user
                            FROM central.ctrl_retardo
                            INNER JOIN central.cat_retardo_tipo
                                ON central.ctrl_retardo.id_cat_retardo_tipo =
                                    central.cat_retardo_tipo.id_cat_retardo_tipo
                            INNER JOIN central.cat_retardo_estatus
                                ON central.ctrl_retardo.id_cat_retardo_estatus =
                                    central.cat_retardo_estatus.id_cat_retardo_estatus
                            INNER JOIN central.cat_quincenas
                                ON central.ctrl_retardo.id_cat_quincenas =
                                    central.cat_quincenas.id_cat_quincenas
                            WHERE central.ctrl_retardo.id_tbl_empleados_hraes = $id_object
                            ORDER BY central.ctrl_retardo.fecha DESC
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_retardo_hraes, fecha, hora_entrada, minuto_entrada,
                                    hora_salida, minuto_salida, id_tbl_empleados_hraes
                            FROM central.ctrl_retardo_hraes
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

    function listarByBusqueda($id_object, $busqueda,$paginator)
    {
        $listado = pg_query("SELECT 
                                central.ctrl_retardo.id_ctrl_retardo,
                                TO_CHAR(central.ctrl_retardo.fecha, 'DD/MM/YYYY'),
                                TO_CHAR(central.ctrl_retardo.hora, 'HH24:MI'),
                                UPPER(central.cat_retardo_tipo.descripcion),
                                UPPER(central.cat_retardo_estatus.descripcion),
                                UPPER(central.ctrl_retardo.observaciones),
                                CONCAT(central.cat_quincenas.no_quincena, ' - ', central.cat_quincenas.nombre),
                                CONCAT(TO_CHAR(central.cat_quincenas.fecha_inicio, 'DD/MM/YYYY'), ' - ',
                                TO_CHAR(central.cat_quincenas.fecha_fin, 'DD/MM/YYYY')),
                                central.ctrl_retardo.id_user
                            FROM central.ctrl_retardo
                            INNER JOIN central.cat_retardo_tipo
                                ON central.ctrl_retardo.id_cat_retardo_tipo =
                                    central.cat_retardo_tipo.id_cat_retardo_tipo
                            INNER JOIN central.cat_retardo_estatus
                                ON central.ctrl_retardo.id_cat_retardo_estatus =
                                    central.cat_retardo_estatus.id_cat_retardo_estatus
                            INNER JOIN central.cat_quincenas
                                ON central.ctrl_retardo.id_cat_quincenas =
                                    central.cat_quincenas.id_cat_quincenas
                            WHERE central.ctrl_retardo.id_tbl_empleados_hraes = $id_object
                            AND (TO_CHAR(central.ctrl_retardo.fecha, 'DD/MM/YYYY')::TEXT  LIKE '%$busqueda%' OR
                                TO_CHAR(central.ctrl_retardo.hora, 'HH24:MI')::TEXT LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(central.cat_retardo_tipo.descripcion))) LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(central.cat_retardo_estatus.descripcion))) LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(central.ctrl_retardo.observaciones))) LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(CONCAT(central.cat_quincenas.no_quincena, ' - ', 
                                    central.cat_quincenas.nombre)))) LIKE '%$busqueda%' OR
                                CONCAT(TO_CHAR(central.cat_quincenas.fecha_inicio, 'DD/MM/YYYY'), ' - ',
                                TO_CHAR(central.cat_quincenas.fecha_fin, 'DD/MM/YYYY')) LIKE '%$busqueda%' 
                            )
                            ORDER BY central.ctrl_retardo.fecha DESC
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_retardo_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_retardo_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'central.ctrl_retardo_hraes', $condicion);
        return $pgs_delete;
    }
}
