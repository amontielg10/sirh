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

    public function validateNoBiometrico($no_dispositivo, $id_tbl_empleados_hraes)
    {
        $query = pg_query("SELECT id_ctrl_asistencia_info
                            FROM central.ctrl_asistencia_info
                            WHERE no_dispositivo = $no_dispositivo
                            AND id_tbl_empleados_hraes <> $id_tbl_empleados_hraes;");
        return $query;
    }

    public function listadoAsistenciaAll($idEmpleado, $paginator)
    {
        $query = pg_query("SELECT
                                central.ctrl_asistencia.id_ctrl_asistencia,
                                TO_CHAR(fecha, 'DD/MM/YYYY'),
                                TO_CHAR(hora, 'HH24:MI'),
                                UPPER(dispositivo),
                                UPPER(verificacion),
                                UPPER(estado),
                                UPPER(evento),
                                id_user,
                                CASE 
                                    WHEN hora < '15:00:00' THEN 'ENTRADA'
                                    ELSE 'SALIDA'
                                END		
                            FROM central.ctrl_asistencia
                            WHERE id_tbl_empleados_hraes = $idEmpleado
                            ORDER BY fecha DESC
                            LIMIT 3 OFFSET $paginator;");
        return $query;
    }

    public function listadoAsistenciaBusq($idEmpleado, $busqueda, $paginator)
    {
        $query = pg_query("SELECT
                                central.ctrl_asistencia.id_ctrl_asistencia,
                                TO_CHAR(fecha, 'DD/MM/YYYY'),
                                TO_CHAR(hora, 'HH24:MI'),
                                UPPER(dispositivo),
                                UPPER(verificacion),
                                UPPER(estado),
                                UPPER(evento),
                                id_user,
                                CASE 
                                    WHEN hora < '15:00:00' THEN 'ENTRADA'
                                    ELSE 'SALIDA'
                                END		
                            FROM central.ctrl_asistencia
                            WHERE id_tbl_empleados_hraes = $idEmpleado
                            AND ( TO_CHAR(fecha, 'DD/MM/YYYY')::TEXT LIKE '%$busqueda%' OR
                                  TO_CHAR(hora, 'HH24:MI')::TEXT LIKE '%$busqueda%' OR
                                  TRIM(UPPER(UNACCENT(dispositivo))) LIKE '%$busqueda%' OR
                                  TRIM(UPPER(UNACCENT(verificacion))) LIKE '%$busqueda%' OR
                                  TRIM(UPPER(UNACCENT(estado))) LIKE '%$busqueda%' OR
                                  TRIM(UPPER(UNACCENT(evento))) LIKE '%$busqueda%')
                            ORDER BY fecha DESC
                            LIMIT 3 OFFSET $paginator;");
        return $query;
    }

    public function editAsistencia($id)
    {
        $query = pg_query("SELECT * 
                            FROM central.ctrl_asistencia
                            WHERE id_ctrl_asistencia =  $id;");
        return $query;
    }

    public function asistenciaIsNUll()
    {
        return $array = [
            'id_ctrl_asistencia' => null,
            'fecha' => null,
            'hora' => null,
            'dispositivo' => null,
            'verificacion' => null,
            'estado' => null,
            'evento' => null,
            'id_tbl_empleados_hraes' => null,
            'id_user' => null
        ];
    }

    function editarByArray($conexion, $datos, $condicion)
    {
        $pg_update = pg_update($conexion, 'central.ctrl_asistencia', $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos)
    {
        $pg_add = pg_insert($conexion, 'central.ctrl_asistencia', $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion)
    {
        $pgs_delete = pg_delete($conexion, 'central.ctrl_asistencia', $condicion);
        return $pgs_delete;
    }

    public function getNameOfUser($id)
    {
        $query = pg_query("SELECT UPPER(nombre)
                            FROM public.users
                            WHERE id_user = $id;");
        return $query;
    }

    public function truncateTable($table)
    {
        $query = pg_query("TRUNCATE TABLE $table;");
        return $query;
    }

    public function addInfoAsistenciaTemp(
        $tableName,
        $tiempo,
        $no_empleado,
        $nombre,
        $apellido,
        $num_tarjeta,
        $dispositivo,
        $punto_evento,
        $verificacion,
        $estado,
        $evento,
        $notas
    ) {
        $query = pg_query("INSERT INTO $tableName
                                    VALUES ('$tiempo', '$no_empleado', '$nombre', '$apellido', '$num_tarjeta', '$dispositivo', 
                                            '$punto_evento', '$verificacion', '$estado', '$evento', '$notas');");
        return $query;
    }

    public function getReporte()
    {
        $query = pg_query("WITH Filtradas AS (
                                            SELECT
                                                cti.id_tbl_empleados_hraes,
                                                (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME AS hora
                                            FROM central.ctrl_temp_asistencia cta
                                            INNER JOIN central.ctrl_asistencia_info cti
                                                ON cta.no_empleado::TEXT = cti.no_dispositivo::TEXT
                                            WHERE
                                                cti.id_cat_asistencia_estatus = 1
                                            AND (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME > '05:00:00'
                                        ),
                                        Horas AS (
                                            SELECT
                                                id_tbl_empleados_hraes,
                                                MIN(hora) AS hora_minima,
                                                MAX(hora) AS hora_maxima
                                            FROM Filtradas
                                            GROUP BY id_tbl_empleados_hraes
                                        )
                                        SELECT
                                            UPPER(emp.rfc),
                                            UPPER(emp.curp),
                                            UPPER(emp.nombre),
                                            UPPER(emp.primer_apellido),
                                            UPPER(emp.segundo_apellido),
                                            (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::DATE AS fecha,
                                            (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME AS hora,
                                            CASE 
                                            WHEN (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME < '15:00:00' THEN 'ENTRADA'
                                            ELSE 'SALIDA'
                                            END,
                                            UPPER(cta.dispositivo) AS dispositivo,
                                            UPPER(cta.verificacion) AS verificacion,
                                            UPPER(cta.estado) AS estado,
                                            UPPER(cta.evento) AS evento,
                                            cti.no_dispositivo
                                        FROM central.ctrl_temp_asistencia cta
                                        INNER JOIN central.ctrl_asistencia_info cti
                                            ON cta.no_empleado::TEXT = cti.no_dispositivo::TEXT
                                        INNER JOIN central.tbl_empleados_hraes emp
                                            ON cti.id_tbl_empleados_hraes =
                                                emp.id_tbl_empleados_hraes
                                        INNER JOIN Horas hm
                                            ON cti.id_tbl_empleados_hraes = hm.id_tbl_empleados_hraes
                                            AND (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME IN (hm.hora_minima, hm.hora_maxima)
                                        WHERE cti.id_cat_asistencia_estatus = 1;");
        return $query;
    }

    public function addDataInTables(){
        $query = pg_query("INSERT INTO central.ctrl_asistencia(
                                fecha, hora, dispositivo, verificacion, estado, evento, id_tbl_empleados_hraes)
                            WITH Filtradas AS (
                                SELECT
                                    cti.id_tbl_empleados_hraes,
                                    (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME AS hora
                                FROM central.ctrl_temp_asistencia cta
                                INNER JOIN central.ctrl_asistencia_info cti
                                    ON cta.no_empleado::TEXT = cti.no_dispositivo::TEXT
                                WHERE
                                    cti.id_cat_asistencia_estatus = 1
                                AND (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME > '05:00:00'
                            ),
                            Horas AS (
                                SELECT
                                    id_tbl_empleados_hraes,
                                    MIN(hora) AS hora_minima,
                                    MAX(hora) AS hora_maxima
                                FROM Filtradas
                                GROUP BY id_tbl_empleados_hraes
                            )
                            SELECT
                                (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::DATE AS fecha,
                                (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME AS hora,
                                UPPER(cta.dispositivo) AS dispositivo,
                                UPPER(cta.verificacion) AS verificacion,
                                UPPER(cta.estado) AS estado,
                                UPPER(cta.evento) AS evento,
                                cti.id_tbl_empleados_hraes
                            FROM central.ctrl_temp_asistencia cta
                            INNER JOIN central.ctrl_asistencia_info cti
                                ON cta.no_empleado::TEXT = cti.no_dispositivo::TEXT
                            INNER JOIN Horas hm
                                ON cti.id_tbl_empleados_hraes = hm.id_tbl_empleados_hraes
                                AND (TO_TIMESTAMP(cta.tiempo, 'MM/DD/YYYY HH24:MI'))::TIME IN (hm.hora_minima, hm.hora_maxima)
                            WHERE cti.id_cat_asistencia_estatus = 1;");
        return $query;
    }
}
