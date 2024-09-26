<?php

class FaltaModelM
{
    function listarById($id_object, $paginator)
    {
        $listado = pg_query("SELECT
                                    central.ctrl_faltas.id_ctrl_faltas,
                                    CASE 
                                        WHEN es_por_retardo THEN 'FALTA POR RETARDO'
                                        ELSE 'FALTA'
                                    END,
                                    TO_CHAR(central.ctrl_faltas.fecha_desde, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.fecha_hasta, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.fecha_registro, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.fecha, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.hora, 'HH:MM'),
                                    UPPER(central.ctrl_faltas.codigo_certificacion),
                                    UPPER(central.cat_retardo_estatus.descripcion),
                                    UPPER(central.cat_retardo_tipo.descripcion),
                                    UPPER(central.ctrl_faltas.observaciones),
                                    central.ctrl_faltas.id_user
                                FROM central.ctrl_faltas
                                LEFT JOIN central.cat_retardo_estatus
                                    ON central.ctrl_faltas.id_cat_retardo_estatus =
                                        central.cat_retardo_estatus.id_cat_retardo_estatus
                                LEFT JOIN central.cat_retardo_tipo
                                    ON central.ctrl_faltas.id_cat_retardo_tipo =
                                        central.cat_retardo_tipo.id_cat_retardo_tipo
                                WHERE central.ctrl_faltas.id_tbl_empleados_hraes = $id_object
                                ORDER BY central.ctrl_faltas.id_ctrl_faltas DESC
                                LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM central.ctrl_faltas
                            WHERE id_ctrl_faltas = $id_object
                            LIMIT 1;");
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

    function listarByBusqueda($id_object, $busqueda, $paginator)
    {
        $listado = pg_query("SELECT
                                    central.ctrl_faltas.id_ctrl_faltas,
                                    CASE 
                                        WHEN es_por_retardo THEN 'FALTA POR RETARDO'
                                        ELSE 'FALTA'
                                    END,
                                    TO_CHAR(central.ctrl_faltas.fecha_desde, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.fecha_hasta, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.fecha_registro, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.fecha, 'DD/MM/YYYY'),
                                    TO_CHAR(central.ctrl_faltas.hora, 'HH:MM'),
                                    UPPER(central.ctrl_faltas.codigo_certificacion),
                                    UPPER(central.cat_retardo_estatus.descripcion),
                                    UPPER(central.cat_retardo_tipo.descripcion),
                                    UPPER(central.ctrl_faltas.observaciones),
                                    central.ctrl_faltas.id_user
                                FROM central.ctrl_faltas
                                LEFT JOIN central.cat_retardo_estatus
                                    ON central.ctrl_faltas.id_cat_retardo_estatus =
                                        central.cat_retardo_estatus.id_cat_retardo_estatus
                                LEFT JOIN central.cat_retardo_tipo
                                    ON central.ctrl_faltas.id_cat_retardo_tipo =
                                        central.cat_retardo_tipo.id_cat_retardo_tipo
                                WHERE central.ctrl_faltas.id_tbl_empleados_hraes = $id_object
                                AND (
                                    TO_CHAR(central.ctrl_faltas.fecha_desde, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR 
                                    TO_CHAR(central.ctrl_faltas.fecha_hasta, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR
                                    TO_CHAR(central.ctrl_faltas.fecha_registro, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR
                                    TO_CHAR(central.ctrl_faltas.fecha, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR
                                    TO_CHAR(central.ctrl_faltas.hora, 'HH:MM')::TEXT LIKE '%$busqueda%' OR
                                    TRIM(UNACCENT(UPPER(central.ctrl_faltas.codigo_certificacion))) LIKE '%$busqueda%' OR
                                    TRIM(UNACCENT(UPPER(central.cat_retardo_estatus.descripcion))) LIKE '%$busqueda%' OR
                                    TRIM(UNACCENT(UPPER(central.cat_retardo_tipo.descripcion))) LIKE '%$busqueda%' OR
                                    TRIM(UNACCENT(UPPER(central.ctrl_faltas.observaciones))) LIKE '%$busqueda%' 
                                )
                                ORDER BY central.ctrl_faltas.id_ctrl_faltas DESC
                                LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_faltas_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_faltas_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'central.ctrl_faltas_hraes', $condicion);
        return $pgs_delete;
    }

    /// reporte de faltas para todos los empleados
    public function getAllFaltas($paginator)
    {
        $query = ("SELECT 
                                CONCAT(UPPER(central.tbl_empleados_hraes.nombre), ' ',
                                    UPPER(central.tbl_empleados_hraes.primer_apellido), ' ',
                                    UPPER(central.tbl_empleados_hraes.segundo_apellido)) AS nombre_completo,
                                UPPER(central.tbl_empleados_hraes.rfc) AS rfc,
                                'FALTA POR RETARDO',
                                to_char(central.ctrl_faltas.fecha, 'DD-MM-YYYY'),
                                to_char(central.ctrl_faltas.hora, 'HH24:MI'),
                                central.ctrl_faltas.cantidad,
                                UPPER(central.cat_retardo_tipo.descripcion),
                                UPPER(central.cat_retardo_estatus.descripcion),
                                central.ctrl_faltas.id_user,
                                central.ctrl_faltas.id_ctrl_faltas
                            FROM central.ctrl_faltas
                            INNER JOIN central.cat_retardo_tipo
                                ON central.ctrl_faltas.id_cat_retardo_tipo =
                                    central.cat_retardo_tipo.id_cat_retardo_tipo
                            INNER JOIN central.cat_retardo_estatus
                                ON central.ctrl_faltas.id_cat_retardo_estatus =
                                    central.cat_retardo_estatus.id_cat_retardo_estatus
                            INNER JOIN central.tbl_empleados_hraes
                                ON central.ctrl_faltas.id_tbl_empleados_hraes =
                                    central.tbl_empleados_hraes.id_tbl_empleados_hraes 
                            WHERE central.ctrl_faltas.es_por_retardo 
                            ORDER BY central.ctrl_faltas.fecha ASC
                            LIMIT 5 OFFSET $paginator;");
        return $query;
    }

    public function getAllFaltasBusqueda($busqueda, $paginator)
    {
        $query = ("SELECT 
                                CONCAT(UPPER(central.tbl_empleados_hraes.nombre), ' ',
                                    UPPER(central.tbl_empleados_hraes.primer_apellido), ' ',
                                    UPPER(central.tbl_empleados_hraes.segundo_apellido)),
                                UPPER(central.tbl_empleados_hraes.rfc),
                                'FALTA POR RETARDO',
                                to_char(central.ctrl_faltas.fecha, 'DD-MM-YYYY'),
                                to_char(central.ctrl_faltas.hora, 'HH24:MI'),
                                central.ctrl_faltas.cantidad,
                                UPPER(central.cat_retardo_tipo.descripcion),
                                UPPER(central.cat_retardo_estatus.descripcion),
                                central.ctrl_faltas.id_user,
                                central.ctrl_faltas.id_ctrl_faltas
                            FROM central.ctrl_faltas
                            INNER JOIN central.cat_retardo_tipo
                                ON central.ctrl_faltas.id_cat_retardo_tipo =
                                    central.cat_retardo_tipo.id_cat_retardo_tipo
                            INNER JOIN central.cat_retardo_estatus
                                ON central.ctrl_faltas.id_cat_retardo_estatus =
                                    central.cat_retardo_estatus.id_cat_retardo_estatus
                            INNER JOIN central.tbl_empleados_hraes
                                ON central.ctrl_faltas.id_tbl_empleados_hraes =
                                    central.tbl_empleados_hraes.id_tbl_empleados_hraes 
                            WHERE central.ctrl_faltas.es_por_retardo 
                            AND (
                                    CONCAT(UPPER(central.tbl_empleados_hraes.nombre), ' ',
                                        UPPER(central.tbl_empleados_hraes.primer_apellido), ' ',
                                        UPPER(central.tbl_empleados_hraes.segundo_apellido)) LIKE '%$busqueda%'
                                OR UPPER(central.tbl_empleados_hraes.rfc):: TEXT LIKE '%$busqueda%'
                                OR to_char(central.ctrl_faltas.fecha, 'DD-MM-YYYY'):: TEXT LIKE '%$busqueda%'
                                OR to_char(central.ctrl_faltas.hora, 'HH24:MI'):: TEXT LIKE '%$busqueda%'
                                OR central.ctrl_faltas.cantidad:: TEXT LIKE '%$busqueda%'
                                OR UPPER(central.cat_retardo_tipo.descripcion):: TEXT LIKE '%$busqueda%'
                                OR UPPER(central.cat_retardo_estatus.descripcion):: TEXT LIKE '%$busqueda%'
                                )
                            ORDER BY central.ctrl_faltas.fecha ASC
                            LIMIT 5 OFFSET $paginator;");
        return $query;
    }
}
