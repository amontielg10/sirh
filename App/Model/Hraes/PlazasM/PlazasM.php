<?php

class modelPlazasHraes
{
    public function listarByAll()
    {
        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                           tbl_control_plazas_hraes.num_plaza, cat_plazas.tipo_plaza,
                           cat_tipo_contratacion_hraes.descripcion_cont, 
                           cat_unidad_responsable.nombre
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_plazas
                        ON tbl_control_plazas_hraes.id_cat_plazas = cat_plazas.id_cat_plazas
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_contratacion_hraes = 
                           cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                           cat_unidad_responsable.id_cat_unidad_responsable
                    ORDER BY id_tbl_control_plazas_hraes DESC
                    LIMIT 6";

        return $listado;
    }

    public function listarByAllByIdCentroTrabajo($id_object)
    {
        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                           tbl_control_plazas_hraes.num_plaza, cat_plazas.tipo_plaza,
                           cat_tipo_contratacion_hraes.descripcion_cont, 
                           cat_unidad_responsable.nombre
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_plazas
                        ON tbl_control_plazas_hraes.id_cat_plazas = cat_plazas.id_cat_plazas
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_contratacion_hraes = 
                           cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                           cat_unidad_responsable.id_cat_unidad_responsable
                    WHERE tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = $id_object
                    ORDER BY id_tbl_control_plazas_hraes DESC
                    LIMIT 6";

        return $listado;
    }

    public function listarByLike($busqueda)
    {
        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                           tbl_control_plazas_hraes.num_plaza, cat_plazas.tipo_plaza,
                           cat_tipo_contratacion_hraes.descripcion_cont, 
                           cat_unidad_responsable.nombre
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_plazas
                        ON tbl_control_plazas_hraes.id_cat_plazas = cat_plazas.id_cat_plazas
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_contratacion_hraes = 
                           cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                           cat_unidad_responsable.id_cat_unidad_responsable
                    WHERE TRIM(UPPER(UNACCENT(tbl_control_plazas_hraes.num_plaza))) 
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_plazas.tipo_plaza)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_tipo_contratacion_hraes.descripcion_cont)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_unidad_responsable.nombre)))
                          LIKE '%$busqueda%'
                    ORDER BY id_tbl_control_plazas_hraes DESC
                    LIMIT 6";

        return $listado;
    }

    public function listarByLikeByIdCentroTrabajo($busqueda, $id_object)
    {
        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                           tbl_control_plazas_hraes.num_plaza, cat_plazas.tipo_plaza,
                           cat_tipo_contratacion_hraes.descripcion_cont, 
                           cat_unidad_responsable.nombre
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_plazas
                        ON tbl_control_plazas_hraes.id_cat_plazas = cat_plazas.id_cat_plazas
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_contratacion_hraes = 
                           cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                           cat_unidad_responsable.id_cat_unidad_responsable
                    WHERE tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = $id_object
                    AND (TRIM(UPPER(UNACCENT(tbl_control_plazas_hraes.num_plaza))) 
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_plazas.tipo_plaza)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_tipo_contratacion_hraes.descripcion_cont)))
                          LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_unidad_responsable.nombre)))
                          LIKE '%$busqueda%')
                    ORDER BY id_tbl_control_plazas_hraes DESC
                    LIMIT 6";

        return $listado;
    }


    function detallesPlazas($id_object)
    {
        $listado = pg_query("SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                            tbl_control_plazas_hraes.num_plaza, cat_plazas.tipo_plaza,
                            cat_tipo_contratacion_hraes.descripcion_cont, 
                            cat_unidad_responsable.nombre,
                            tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes,
                            tbl_centro_trabajo_hraes.clave_centro_trabajo,
                            tbl_centro_trabajo_hraes.nombre,
                            cat_entidad.entidad, tbl_centro_trabajo_hraes.codigo_postal
        FROM tbl_control_plazas_hraes
        INNER JOIN cat_plazas
            ON tbl_control_plazas_hraes.id_cat_plazas = cat_plazas.id_cat_plazas
        INNER JOIN cat_tipo_contratacion_hraes
            ON tbl_control_plazas_hraes.id_cat_tipo_contratacion_hraes = 
               cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
        INNER JOIN cat_unidad_responsable
            ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
               cat_unidad_responsable.id_cat_unidad_responsable
        INNER JOIN tbl_centro_trabajo_hraes
            ON tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = 
               tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes
        INNER JOIN cat_entidad
            ON tbl_centro_trabajo_hraes.id_cat_entidad = cat_entidad.id_cat_entidad
        WHERE tbl_control_plazas_hraes.id_tbl_control_plazas_hraes = $id_object");
        return $listado;
    }

    function listarHistoria($id_object)
    {
        $listado = "SELECT tbl_empleados_hraes.rfc,
                                    tbl_movimientos.nombre_movimiento,
                                    tbl_plazas_empleados_hraes.fecha_inicio,	
                                    tbl_plazas_empleados_hraes.fecha_termino,
                                    tbl_plazas_empleados_hraes.fecha_movimiento
                            FROM tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN tbl_empleados_hraes
                            ON tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
                                tbl_empleados_hraes.id_tbl_empleados_hraes
                            WHERE tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes = $id_object
                            LIMIT 5;";
        return $listado;
    }




    /*
    public function listarByLike($busqueda){
        $listado = "SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, nss
                    FROM tbl_empleados_hraes
                    WHERE TRIM(UPPER(UNACCENT(rfc))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(curp))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nombre))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(primer_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(segundo_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(CAST(nss AS TEXT)))) LIKE '%$busqueda%'
                    ORDER BY id_tbl_empleados_hraes DESC
                    LIMIT 6";
        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT id_tbl_empleados_hraes, rfc, curp, nombre, primer_apellido,
                                    segundo_apellido, nss
                            FROM tbl_empleados_hraes
                            WHERE id_tbl_empleados_hraes = $id_object
                            ORDER BY id_tbl_empleados_hraes DESC
                            LIMIT 6");
        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_empleados_hraes' => null,
            'rfc' => null,
            'curp' => null,
            'nombre' => null,
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'nss' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'tbl_empleados_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'tbl_empleados_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'tbl_empleados_hraes',$condicion);
        return $pgs_delete;
    }
7
    

    public function listarByLike($busqueda){
        $listado = "SELECT id_tbl_empleados_rec, rfc, curp, nombre, primer_apellido,
                           segundo_apellido, nss
                    FROM tbl_empleados_rec
                    WHERE TRIM(UPPER(UNACCENT(rfc))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(curp))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nombre))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(primer_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(segundo_apellido))) LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(nss))) LIKE '%$busqueda%'
                    ORDER BY tbl_empleados_rec DESC
                    LIMIT 10";
        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_empleados_rec' => null,
            'rfc' => null,
            'curp' => null,
            'nombre' => null,
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'nss' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'tbl_empleados_rec', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'tbl_empleados_rec', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'tbl_empleados_rec',$condicion);
        return $pgs_delete;
    }
*/
}
