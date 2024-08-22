<?php

class AsistenciaM
{

    public function listOfAsistencia($id)
    {
        $query = pg_query("SELECT
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

    public function listOfJornada($id)
    {
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

    public function editAsistenciaInfo($id)
    {
        $query = pg_query("SELECT * 
                            FROM central.ctrl_asistencia_info
                            WHERE id_tbl_empleados_hraes = $id
                            ORDER BY id_ctrl_asistencia_info ASC
                            LIMIT 1;");
        return $query;
    }

    public function editJornadaInfo($id)
    {
        $query = pg_query("SELECT * 
                            FROM central.ctrl_jornada
                            WHERE id_tbl_empleados_hraes = $id
                            ORDER BY id_ctrl_jornada DESC
                            LIMIT 1;");
        return $query;
    }

    function editAsistenciaInfoDB($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_asistencia_info', $datos, $condicion);
        return $pg_update;
    }

    function addAsistenciaInfoDB($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_asistencia_info', $datos);
        return $pg_add;
    }


    function editJornadaInfoDB($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_jornada', $datos, $condicion);
        return $pg_update;
    }

    function addJornadaInfoDB($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_jornada', $datos);
        return $pg_add;
    }

    public function validateNoBiometrico($no_dispositivo,$id_tbl_empleados_hraes)
    {
        $query = pg_query ("SELECT id_ctrl_asistencia_info
                            FROM central.ctrl_asistencia_info
                            WHERE no_dispositivo = $no_dispositivo
                            AND id_tbl_empleados_hraes <> $id_tbl_empleados_hraes;");
        return $query;
    }

}
