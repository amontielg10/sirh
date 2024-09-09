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
                                central.ctrl_retardo.id_user
                            FROM central.ctrl_retardo
                            INNER JOIN central.cat_retardo_tipo
                                ON central.ctrl_retardo.id_cat_retardo_tipo =
                                    central.cat_retardo_tipo.id_cat_retardo_tipo
                            INNER JOIN central.cat_retardo_estatus
                                ON central.ctrl_retardo.id_cat_retardo_estatus =
                                    central.cat_retardo_estatus.id_cat_retardo_estatus
                            WHERE central.ctrl_retardo.id_tbl_empleados_hraes = $id_object
                            ORDER BY central.ctrl_retardo.fecha DESC
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT *
                            FROM central.ctrl_retardo
                            WHERE id_ctrl_retardo = $id_object
                            ORDER BY id_ctrl_retardo DESC
                            LIMIT 1;");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_retardo' => null,
            'fecha' => null,
            'hora' => null,
            'observaciones' => null,
            'id_cat_retardo_tipo' => null,
            'id_cat_retardo_estatus' => null,
            'id_tbl_empleados_hraes' => null,
            'id_user' => null,
            'id_cat_quincenas' => null
        ];
    }

    function listarByBusqueda($id_object, $busqueda,$paginator)
    {
        $listado = pg_query("SELECT 
    central.ctrl_retardo.id_ctrl_retardo,
    TO_CHAR(central.ctrl_retardo.fecha, 'DD/MM/YYYY') AS fecha,
    TO_CHAR(central.ctrl_retardo.hora, 'HH24:MI') AS hora,
    UPPER(central.cat_retardo_tipo.descripcion) AS tipo_descripcion,
    UPPER(central.cat_retardo_estatus.descripcion) AS estatus_descripcion,
    UPPER(central.ctrl_retardo.observaciones) AS observaciones,
    central.ctrl_retardo.id_user
FROM central.ctrl_retardo
INNER JOIN central.cat_retardo_tipo
    ON central.ctrl_retardo.id_cat_retardo_tipo = central.cat_retardo_tipo.id_cat_retardo_tipo
INNER JOIN central.cat_retardo_estatus
    ON central.ctrl_retardo.id_cat_retardo_estatus = central.cat_retardo_estatus.id_cat_retardo_estatus
WHERE central.ctrl_retardo.id_tbl_empleados_hraes = $id_object
AND (
    CONCAT(
        TO_CHAR(central.ctrl_retardo.fecha, 'DD/MM/YYYY'), ' ',
        TO_CHAR(central.ctrl_retardo.hora, 'HH24:MI'), ' ',
        UPPER(central.cat_retardo_tipo.descripcion), ' ',
        UPPER(central.cat_retardo_estatus.descripcion), ' ',
        UPPER(central.ctrl_retardo.observaciones)
    ) LIKE '%' || '$busqueda' || '%'
)
ORDER BY central.ctrl_retardo.fecha DESC
                             LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_retardo', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_retardo', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'central.ctrl_retardo', $condicion);
        return $pgs_delete;
    }

    public function actualizarRetardos(){
        $query = pg_query ("INSERT INTO central.ctrl_retardo (
                                        fecha, 
                                        hora, 
                                        Observaciones, 
                                        id_cat_retardo_tipo, 
                                        id_cat_retardo_estatus, 
                                        id_tbl_empleados_hraes, 
                                        id_user, 
                                        id_cat_quincenas
                                    )
                                    SELECT 
                                        entrada.fecha, 
                                        entrada.hora, 
                                        NULL AS Observaciones, 
                                        1 AS id_cat_retardo_tipo, 
                                        5 AS id_cat_retardo_estatus,  -- Tipo-Entrada | Estatus-Congelada
                                        entrada.id_empleado, 
                                        NULL AS id_user, 
                                        central.cat_quincenas.id_cat_quincenas AS id_quincena
                                    FROM 
                                        (
                                            SELECT 
                                                MIN(central.ctrl_asistencia.hora) AS hora,  -- Trae el primer registro por Fecha y Empleado
                                                central.ctrl_asistencia.fecha AS fecha, 
                                                central.ctrl_asistencia.id_tbl_empleados_hraes AS id_empleado
                                            FROM central.ctrl_asistencia
                                            GROUP BY 
                                                central.ctrl_asistencia.fecha, 
                                                central.ctrl_asistencia.id_tbl_empleados_hraes
                                        ) AS entrada
                                    INNER JOIN central.cat_quincenas 
                                        ON entrada.fecha BETWEEN central.cat_quincenas.fecha_inicio AND central.cat_quincenas.fecha_fin
                                    LEFT JOIN central.ctrl_retardo AS existente
                                        ON entrada.fecha = existente.fecha 
                                        AND entrada.hora = existente.hora
                                        AND entrada.id_empleado = existente.id_tbl_empleados_hraes
                                    WHERE 
                                        entrada.hora >= '09:16:00'  -- Para el horario establecido como Falta
                                        AND entrada.hora <= '09:30:59'
                                        AND existente.id_tbl_empleados_hraes IS NULL  -- Filtra para excluir registros ya existentes
                                    ORDER BY 
                                        entrada.fecha, 
                                        entrada.hora;");
        return $query;
    }
}
