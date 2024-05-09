<?php

class ModelMovimientosM
{
    public function listarByIdEmpleado($idEmpleado)
    {
        $listado = pg_query("SELECT tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes, 
                                    tbl_plazas_empleados_hraes.fecha_inicio, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_movimientos, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento, 
                                    tbl_plazas_empleados_hraes.id_tbl_empleados_hraes,
                                    CONCAT(tbl_movimientos.codigo,' - ',tbl_movimientos.nombre_movimiento),
                                    tbl_movimientos.tipo_movimiento,
                                    tbl_control_plazas_hraes.num_plaza
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN tbl_control_plazas_hraes
                            ON tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
                                tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
                            WHERE tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                            ORDER BY tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes DESC
                            LIMIT 5;");

        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_plazas_empleados_hraes' => null,
            'codigo_trabajador' => null,
            'fecha_inicio' => null,
            'fecha_termino' => null,
            'id_tbl_movimientos' => null,
            'tipo_movimiento' => null,
            'fecha_movimiento' => null,
            'id_tbl_control_plazas_hraes' => null,
            'id_tbl_empleados_hraes' => null,
        ];
    }


    public function countUltimoMovimiento($idEmpleado){
        $listado = pg_query("SELECT COUNT(id_tbl_plazas_empleados_hraes)
                             FROM tbl_plazas_empleados_hraes 
                             WHERE id_tbl_empleados_hraes = $idEmpleado");
        return $listado;
    }


    public function listadoUltimoMovimiento($idEmpleado){
        $listado = pg_query("SELECT tbl_movimientos.id_tipo_movimiento
                             FROM tbl_plazas_empleados_hraes 
                             INNER JOIN tbl_movimientos
                             ON tbl_plazas_empleados_hraes.id_tbl_movimientos =
                                tbl_movimientos.id_tbl_movimientos
                             WHERE tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                             GROUP BY tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_movimientos.id_tipo_movimiento
                             ORDER BY tbl_plazas_empleados_hraes.fecha_movimiento DESC
                             LIMIT 1;");
        return $listado;
    }
    /*
    public function listarByAll()
    {
        $listado = "SELECT tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes,
                            tbl_centro_trabajo_hraes.clave_centro_trabajo,
                            tbl_centro_trabajo_hraes.nombre,
                            cat_entidad.entidad, tbl_centro_trabajo_hraes.codigo_postal
                    FROM tbl_centro_trabajo_hraes
                    INNER JOIN cat_entidad
                    ON tbl_centro_trabajo_hraes.id_cat_entidad = 
                        cat_entidad.id_cat_entidad
                    ORDER BY tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes DESC
                    LIMIT 6";

        return $listado;
    }

    public function listarByLike($busqueda)
    {
        $listado = "SELECT tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes,
                            tbl_centro_trabajo_hraes.clave_centro_trabajo,
                            tbl_centro_trabajo_hraes.nombre,
                            cat_entidad.entidad, tbl_centro_trabajo_hraes.codigo_postal
                    FROM tbl_centro_trabajo_hraes
                    INNER JOIN cat_entidad
                    ON tbl_centro_trabajo_hraes.id_cat_entidad = 
                        cat_entidad.id_cat_entidad
                    WHERE TRIM(UPPER(UNACCENT(tbl_centro_trabajo_hraes.clave_centro_trabajo))) 
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(tbl_centro_trabajo_hraes.nombre)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_entidad.entidad)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(tbl_centro_trabajo_hraes.codigo_postal)))
                          LIKE '%$busqueda%'
                    ORDER BY tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes DESC
                    LIMIT 6";

        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT id_tbl_centro_trabajo_hraes, clave_centro_trabajo, nombre,
                                    colonia, codigo_postal, num_exterior, num_interior, latitud, longitud,
                                    id_cat_region, id_estatus_centro, id_cat_entidad
                            FROM tbl_centro_trabajo_hraes
                            WHERE id_tbl_centro_trabajo_hraes = $id_object
                            ORDER BY id_tbl_centro_trabajo_hraes DESC
                            LIMIT 6");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'tbl_centro_trabajo_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'tbl_centro_trabajo_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'tbl_centro_trabajo_hraes',$condicion);
        return $pgs_delete;
    }


    */
}
