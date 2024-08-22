<?php
class CatAsistenciaM
{
    public function listOfUbicacion(){
        $query = pg_query ("SELECT 
                                id_cat_asistencia_ubicacion,
                                UPPER(descripcion)
                            FROM central.cat_asistencia_ubicacion
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function listOfEstatus(){
        $query = pg_query("SELECT 
                                id_cat_asistencia_estatus,
                                UPPER(descripcion)
                            FROM central.cat_asistencia_estatus
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function listOfJornadaTurno(){
        $query = pg_query("SELECT 
                                id_cat_jornada_turno,
                                UPPER(descripcion)
                            FROM central.cat_jornada_turno
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function listOfJornadaDias(){
        $query = pg_query("SELECT
                                id_cat_jornada_dias,
                                UPPER(descripcion)
                            FROM central.cat_jornada_dias
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function listOfJornadaHora(){
        $query = pg_query("SELECT 
                                id_cat_jornada_horario,
                                CONCAT (TO_CHAR(hora_entrada, 'HH24:MI'), ' - ', 
                                        TO_CHAR(hora_salida, 'HH24:MI'), ' HRS')
                            FROM central.cat_jornada_horario
                            ORDER BY hora_entrada ASC;");
        return $query;
    }

    public function editOfJornadaHora($id){
        $query = pg_query("SELECT 
                                id_cat_jornada_horario,
                                CONCAT (TO_CHAR(hora_entrada, 'HH24:MI'), ' - ', 
                                        TO_CHAR(hora_salida, 'HH24:MI'), ' HRS')
                            FROM central.cat_jornada_horario
                            WHERE id_cat_jornada_horario = $id
                            ORDER BY hora_entrada ASC;");
        return $query;
    }

    public function editOfJornadaDias($id){
        $query = pg_query("SELECT
                                id_cat_jornada_dias,
                                UPPER(descripcion)
                            FROM central.cat_jornada_dias
                            WHERE id_cat_jornada_dias = $id
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function editOfJornadaTurno($id){
        $query = pg_query("SELECT 
                                id_cat_jornada_turno,
                                UPPER(descripcion)
                            FROM central.cat_jornada_turno
                            WHERE id_cat_jornada_turno = $id
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function editOfEstatus($id){
        $query = pg_query("SELECT 
                                id_cat_asistencia_estatus,
                                UPPER(descripcion)
                            FROM central.cat_asistencia_estatus
                            WHERE id_cat_asistencia_estatus = $id 
                            ORDER BY descripcion ASC;");
        return $query;
    }

    public function editOfUbicacion($id){
        $query = pg_query ("SELECT 
                                id_cat_asistencia_ubicacion,
                                UPPER(descripcion)
                            FROM central.cat_asistencia_ubicacion
                            WHERE id_cat_asistencia_ubicacion = $id
                            ORDER BY descripcion ASC;");
        return $query;
    }
}
