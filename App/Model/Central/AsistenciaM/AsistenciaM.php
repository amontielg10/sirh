<?php

class AsistenciaM{

    public function listOfAsistencia($id){
        $query = pg_query ("SELECT
                                central.ctrl_asistencia_info.id_ctrl_asistencia_info,
                                central.ctrl_asistencia_info.no_dispositivo,
                                UPPER(central.cat_asistencia_ubicacion.descripcion),
                                UPPER(central.cat_asistencia_estatus.descripcion),
                                UPPER(central.ctrl_asistencia_info.observaciones)
                            FROM central.ctrl_asistencia_info
                            INNER JOIN central.cat_asistencia_ubicacion
                                ON central.ctrl_asistencia_info.id_cat_asistencia_ubicacion = 
                                    central.cat_asistencia_ubicacion.id_cat_asistencia_ubicacion
                            INNER JOIN central.cat_asistencia_estatus
                                ON central.ctrl_asistencia_info.id_cat_asistencia_estatus =
                                    central.cat_asistencia_estatus.id_cat_asistencia_estatus
                            WHERE central.ctrl_asistencia_info.id_tbl_empleados_hraes = $id
                            ORDER BY central.ctrl_asistencia_info.id_ctrl_asistencia_info DESC
                            LIMIT 1");
        return $query;
    }

    public function listOfJornada($id){
        $query = pg_query("SELECT 
                                central.ctrl_jornada.id_ctrl_jornada,
                                UPPER(central.cat_jornada_turno.descripcion),
                                UPPER(central.cat_jornada_dias.descripcion),
                                CONCAT(TO_CHAR(central.cat_jornada_horario.hora_entrada, 'HH24:MI'), ' - ',
                                        TO_CHAR(central.cat_jornada_horario.hora_salida, 'HH24:MI'))
                            FROM central.ctrl_jornada
                            INNER JOIN central.cat_jornada_turno
                                ON central.ctrl_jornada.id_cat_jornada_turno = 
                                    central.cat_jornada_turno.id_cat_jornada_turno
                            INNER JOIN central.cat_jornada_dias
                                ON central.ctrl_jornada.id_cat_jornada_dias =
                                    central.cat_jornada_dias.id_cat_jornada_dias
                            INNER JOIN central.cat_jornada_horario
                                ON central.ctrl_jornada.id_cat_jornada_horario =
                                    central.cat_jornada_horario.id_cat_jornada_horario
                            WHERE central.ctrl_jornada.id_tbl_empleados_hraes = $id
                            ORDER BY central.ctrl_jornada.id_ctrl_jornada DESC
                            LIMIT 1");
        return $query;
    }

    /*
    public function selectCountById($id_object){
        $listado = pg_query("SELECT COUNT (id_tbl_domicilios_hraes)
                             FROM central.tbl_domicilios_hraes
                             WHERE id_tbl_empleados_hraes =  $id_object");
        return $listado;
    }

    public function listarByIdEdit($id_object){
        $listado = pg_query("SELECT *
                            FROM central.tbl_domicilios_hraes
                            WHERE id_tbl_empleados_hraes = $id_object");
        return $listado;
    }

    public function listarByNull(){
        return $array = [
            'id_tbl_domicilios_hraes' => null,
            'id_tbl_datos_empleado_hraes' => null,
            'entidad1' => null,
            'municipio1' => null,
            'colonia1' => null,
            'codigo_postal1' => null,
            'calle1' => null,
            'num_exterior1' => null,
            'num_interior1' => null,
            'id_estatus1' => null,
            'entidad2' => null,
            'municipio2' => null,
            'colonia2' => null,
            'codigo_postal2' => null,
            'calle2' => null,
            'num_exterior2' => null,
            'num_interior2' => null,
            'id_estatus2' => null,
            'esdireccion_fiscal1' => null,
            'esdireccion_fiscal2' => null,
        ];
    }

    function editarByArray($conexion, $datos, $condicion){
        $pg_update = pg_update($conexion, 'central.tbl_domicilios_hraes', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos){
        $pg_add = pg_insert($conexion, 'central.tbl_domicilios_hraes', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion){
        $pgs_delete = pg_delete($conexion,'central.tbl_domicilios_hraes',$condicion);
        return $pgs_delete;
    }
        */
}
