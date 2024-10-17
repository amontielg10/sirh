<?php

class PreventivasM
{

    public function listadoByAll($id_tbl_empleados_hraes, $paginador)
    {
        $query = pg_query("SELECT 
                                central.ctrl_preventivas.id_ctrl_preventivas,
                                UPPER(central.cat_preventivas.descripcion) AS estatus,
                                UPPER(central.ctrl_preventivas.no_oficio),
                                TO_CHAR(central.ctrl_preventivas.fecha_inicio, 'DD/MM/YYYY'),
                                TO_CHAR(central.ctrl_preventivas.fecha_fin, 'DD/MM/YYYY'),
                                central.cat_quincenas.nombre AS quincena,
                                CONCAT (TO_CHAR(central.cat_quincenas.fecha_inicio, 'DD/MM/YYYY'), ' - ',
                                        TO_CHAR(central.cat_quincenas.fecha_fin, 'DD/MM/YYYY')) AS periodo_quincena,
                                UPPER(central.ctrl_preventivas.observaciones)
                            FROM central.ctrl_preventivas
                            INNER JOIN central.cat_quincenas
                                ON central.ctrl_preventivas.fecha_inicio BETWEEN 
                                    central.cat_quincenas.fecha_inicio AND central.cat_quincenas.fecha_fin	
                            INNER JOIN central.cat_preventivas
                                ON	central.ctrl_preventivas.id_cat_preventivas =
                                    central.cat_preventivas.id_cat_preventivas
                            WHERE central.ctrl_preventivas.id_tbl_empleados_hraes = $id_tbl_empleados_hraes -- IS ID_EMPLOYEE
                            ORDER BY central.cat_quincenas.fecha_inicio ASC
                            LIMIT 3 OFFSET $paginador;");
        return $query;
    }

    public function listadoBybusqueda($id_tbl_empleados_hraes, $busqueda, $paginador)
    {
        $query = pg_query("SELECT 
                                central.ctrl_preventivas.id_ctrl_preventivas,
                                UPPER(central.cat_preventivas.descripcion) AS estatus,
                                UPPER(central.ctrl_preventivas.no_oficio),
                                TO_CHAR(central.ctrl_preventivas.fecha_inicio, 'DD/MM/YYYY'),
                                TO_CHAR(central.ctrl_preventivas.fecha_fin, 'DD/MM/YYYY'),
                                central.cat_quincenas.nombre AS quincena,
                                CONCAT (TO_CHAR(central.cat_quincenas.fecha_inicio, 'DD/MM/YYYY'), ' - ',
                                        TO_CHAR(central.cat_quincenas.fecha_fin, 'DD/MM/YYYY')) AS periodo_quincena,
                                UPPER(central.ctrl_preventivas.observaciones)
                            FROM central.ctrl_preventivas
                            INNER JOIN central.cat_quincenas
                                ON central.ctrl_preventivas.fecha_inicio BETWEEN 
                                    central.cat_quincenas.fecha_inicio AND central.cat_quincenas.fecha_fin	
                            INNER JOIN central.cat_preventivas
                                ON	central.ctrl_preventivas.id_cat_preventivas =
                                    central.cat_preventivas.id_cat_preventivas
                            WHERE central.ctrl_preventivas.id_tbl_empleados_hraes = $id_tbl_empleados_hraes -- IS ID_EMPLOYEE
                            AND (
                                UPPER(TRIM(UNACCENT(central.cat_preventivas.descripcion))) LIKE '%$busqueda%' OR
                                UPPER(TRIM(UNACCENT(central.ctrl_preventivas.no_oficio))) LIKE '%$busqueda%' OR
                                TO_CHAR(central.ctrl_preventivas.fecha_inicio, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR
                                TO_CHAR(central.ctrl_preventivas.fecha_fin, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR
                                UPPER(TRIM(UNACCENT(central.cat_quincenas.nombre))) LIKE '%$busqueda%' OR
                                UPPER(TRIM(UNACCENT(central.ctrl_preventivas.observaciones))) LIKE '%$busqueda%' 
                            )
                            ORDER BY central.cat_quincenas.fecha_inicio ASC
                            LIMIT 3 OFFSET $paginador;");
        return $query;
    }

}