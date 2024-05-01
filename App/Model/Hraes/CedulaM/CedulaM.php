<?php

class ModelCedulaM
{
    function listarById($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_cedula_empleados_hraes, id_tbl_empleados,
                                    cedula_profesional
                            FROM ctrl_cedula_empleados_hraes
                            WHERE id_tbl_empleados = $id_object
                            ORDER BY id_ctrl_cedula_empleados_hraes DESC 
                            LIMIT 5");
        return $listado;
    }

    function listarByBusqueda($id_object, $busqueda)
    {
        $listado = pg_query("SELECT id_ctrl_cedula_empleados_hraes, id_tbl_empleados,
                                    cedula_profesional
                            FROM ctrl_cedula_empleados_hraes
                            WHERE id_tbl_empleados = $id_object
                            AND cedula_profesional LIKE '%$busqueda%'
                            ORDER BY id_ctrl_cedula_empleados_hraes DESC 
                            LIMIT 5");
        return $listado;
    }

    function listarByIdCedula($id_object)
    {
        $listado = pg_query("SELECT id_ctrl_cedula_empleados_hraes, id_tbl_empleados,
                                    cedula_profesional
                            FROM ctrl_cedula_empleados_hraes
                            WHERE id_ctrl_cedula_empleados_hraes = $id_object");
        return $listado;
    }

    function listarByNull()
    {
        return $raw = [
            'id_ctrl_cedula_empleados_hraes' => null,
            'id_tbl_empleados' => null,
            'cedula_profesional' => null
        ];
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'ctrl_cedula_empleados_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'ctrl_cedula_empleados_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'ctrl_cedula_empleados_hraes', $condicion);
        return $pgs_delete;
    }
}
