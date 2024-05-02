<?php

class ModelEmergenciaM
{
    function listarById($id_object)
    {
        $listado = pg_query("SELECT ctrl_contacto_emergencia_hraes.id_ctrl_contacto_emergencia_hraes,
                                    CONCAT(ctrl_contacto_emergencia_hraes.nombre, ' ', 
                                    ctrl_contacto_emergencia_hraes.primer_apellido, ' ', 
                                    ctrl_contacto_emergencia_hraes.segundo_apellido), 
                                    ctrl_contacto_emergencia_hraes.parentesco,
                                    ctrl_contacto_emergencia_hraes.movil, 
                                    cat_estatus.estatus
                            FROM ctrl_contacto_emergencia_hraes
                            INNER JOIN cat_estatus
                            ON ctrl_contacto_emergencia_hraes.id_cat_estatus = 
                            cat_estatus.id_cat_estatus
                            WHERE id_tbl_empleados = $id_object
                            ORDER BY ctrl_contacto_emergencia_hraes.id_ctrl_contacto_emergencia_hraes DESC
                            LIMIT 5");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_contacto_emergencia_hraes' => null,
            'nombre' => null,
            'primer_apellido' => null,
            'segundo_apellido' => null,
            'parentesco' => null,
            'movil' => null,
            'id_cat_estatus' => null,
            'id_tbl_empleados' => null,
        ];
    }

    function listarEditById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_contacto_emergencia_hraes,nombre,
                                    primer_apellido,segundo_apellido,parentesco,
                                    movil,id_cat_estatus,id_tbl_empleados
                             FROM ctrl_contacto_emergencia_hraes
                             WHERE id_ctrl_contacto_emergencia_hraes = $id_object");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_contacto_emergencia_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_contacto_emergencia_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_contacto_emergencia_hraes', $condicion);
        return $pgs_delete;
    }

    function listarByBusqueda($id_object, $busqueda)
    {
        $listado = pg_query("SELECT ctrl_contacto_emergencia_hraes.id_ctrl_contacto_emergencia_hraes,
                                    CONCAT(ctrl_contacto_emergencia_hraes.nombre, ' ', 
                                    ctrl_contacto_emergencia_hraes.primer_apellido, ' ', 
                                    ctrl_contacto_emergencia_hraes.segundo_apellido), 
                                    ctrl_contacto_emergencia_hraes.parentesco,
                                    ctrl_contacto_emergencia_hraes.movil, 
                                    cat_estatus.estatus
                            FROM ctrl_contacto_emergencia_hraes
                            INNER JOIN cat_estatus
                            ON ctrl_contacto_emergencia_hraes.id_cat_estatus = 
                            cat_estatus.id_cat_estatus
                            WHERE id_tbl_empleados = $id_object
                            AND (TRIM(UPPER(UNACCENT(ctrl_contacto_emergencia_hraes.nombre))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(ctrl_contacto_emergencia_hraes.primer_apellido))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(ctrl_contacto_emergencia_hraes.segundo_apellido))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(ctrl_contacto_emergencia_hraes.parentesco))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(ctrl_contacto_emergencia_hraes.movil))) 
                                    LIKE '%$busqueda%' OR
                                TRIM(UPPER(UNACCENT(cat_estatus.estatus))) LIKE '%$busqueda%')
                            ORDER BY ctrl_contacto_emergencia_hraes.id_ctrl_contacto_emergencia_hraes DESC
                            LIMIT 5");
        return $listado;
    }

}
