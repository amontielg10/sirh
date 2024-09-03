<?php


class IncidenciasM
{
    public function listadoByAll($id, $paginator)
    {
        $query = pg_query("SELECT 
                                central.ctrl_incidencias.id_ctrl_incidencias,
                                UPPER(central.cat_incidencias.descripcion),
                                TO_CHAR(central.ctrl_incidencias.fecha_inicio, 'DD/MM/YYYY'),
                                TO_CHAR(central.ctrl_incidencias.fecha_fin, 'DD/MM/YYYY'),
                                UPPER(central.ctrl_incidencias.observaciones),
                                UPPER(central.cat_periodo.descripcion),
                                UPPER(public.users.nombre)
                            FROM central.ctrl_incidencias
                            INNER JOIN central.cat_incidencias
                                ON central.cat_incidencias.id_cat_incidencias =
                                    central.ctrl_incidencias.id_cat_incidencias
                            INNER JOIN central.cat_periodo
                                ON central.ctrl_incidencias.fecha_inicio BETWEEN
                                    central.cat_periodo.fecha_inicio AND central.cat_periodo.fecha_fin
                            LEFT JOIN public.users
                                ON public.users.id_user =
                                    central.ctrl_incidencias.id_user
                            WHERE central.ctrl_incidencias.id_tbl_empleados_hraes = $id
                            ORDER BY central.ctrl_incidencias.fecha_inicio DESC
                            LIMIT 3 OFFSET $paginator;");
        return $query;
    }

    public function listadoBybusqueda($idEmpleado, $busqueda, $paginator)
    {
        $query = pg_query("SELECT 
                                central.ctrl_incidencias.id_ctrl_incidencias,
                                UPPER(central.cat_incidencias.descripcion),
                                TO_CHAR(central.ctrl_incidencias.fecha_inicio, 'DD/MM/YYYY'),
                                TO_CHAR(central.ctrl_incidencias.fecha_fin, 'DD/MM/YYYY'),
                                UPPER(central.ctrl_incidencias.observaciones),
                                UPPER(central.cat_periodo.descripcion),
                                UPPER(public.users.nombre)
                            FROM central.ctrl_incidencias
                            INNER JOIN central.cat_incidencias
                                ON central.cat_incidencias.id_cat_incidencias =
                                    central.ctrl_incidencias.id_cat_incidencias
                            INNER JOIN central.cat_periodo
                                ON central.ctrl_incidencias.fecha_inicio BETWEEN
                                    central.cat_periodo.fecha_inicio AND central.cat_periodo.fecha_fin
                            LEFT JOIN public.users
                                ON public.users.id_user =
                                    central.ctrl_incidencias.id_user
                            WHERE central.ctrl_incidencias.id_tbl_empleados_hraes = $idEmpleado
                            AND (
                                     UPPER(TRIM(UNACCENT(central.cat_incidencias.descripcion)))  LIKE '%$busqueda%' 
                                  OR TO_CHAR(central.ctrl_incidencias.fecha_inicio, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%'
                                  OR TO_CHAR(central.ctrl_incidencias.fecha_fin, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%'
                                  OR UPPER(TRIM(UNACCENT(central.ctrl_incidencias.observaciones))) LIKE '%$busqueda%'
                                  OR UPPER(TRIM(UNACCENT(UPPER(central.cat_periodo.descripcion)))) LIKE '%$busqueda%'
                                )
                            ORDER BY central.ctrl_incidencias.fecha_inicio DESC
                            LIMIT 3 OFFSET $paginator;");
        return $query;
    }
}
