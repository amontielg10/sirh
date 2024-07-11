<?php

class MasivoC{

    public function truncateTable($tableName){
        $query = pg_query("TRUNCATE TABLE $tableName RESTART IDENTITY;");
        return $query;
    }

    public function insertFaltas($tableName,$fecha_desde,$fecha_hasta,$fecha_registro,$codigo_certificacion,$curp,$observaciones){
        $query = pg_query("INSERT INTO $tableName (fecha_desde, fecha_hasta,fecha_registro,codigo_certificacion,curp,observaciones) 
                           VALUES (UPPER('$fecha_desde'),UPPER('$fecha_hasta'),UPPER('$fecha_registro'),'$codigo_certificacion','$curp','$observaciones')");
        return $query;
    }

    public function validateDateFaltas($tableName,$columnName, $valueTittle){
        $query = pg_query("UPDATE $tableName
                           SET observaciones_estatus = CASE
                            WHEN TRIM($columnName) IS NULL THEN 'CAMPO $valueTittle NO PUEDE ESTAR VACIO'
                            WHEN TRIM($columnName) = '' THEN 'CAMPO $valueTittle NO PUEDE ESTAR VACIO'
                            WHEN TRIM($columnName) !~ '^\d{4}-\d{2}-\d{2}$' THEN 'CAMPO $valueTittle NO TIENE EL FORMATO CORRECTO (AAAA-MM-DD)'
                            ELSE 'OK'
                            END;");



                            UPDATE masivo_ctrl_faltas_hraes
                            SET observaciones_estatus = CASE
                            WHEN fecha_registro IS NULL THEN 'CAMPO $fecha_registro NO PUEDE ESTAR VACIO'
                            WHEN fecha_registro = '' THEN 'CAMPO $fecha_registro NO PUEDE ESTAR VACIO'
                            WHEN fecha_registro !~ '^\d{4}-\d{2}-\d{2}$' THEN 'CAMPO $fecha_registro NO TIENE EL FORMATO CORRECTO (AAAA-MM-DD)'
                            ELSE 'OK'
                            END;

        return $query;  
    }

    public function validateMaxFaltas($tableName, $columnName, $valueTittle, $maxChar){
        $query = pg_query("UPDATE $tableName
                           SET observaciones_estatus = CASE
                            WHEN LENGTH($columnName) > $maxChar THEN 'CAMPO $valueTittle DEBE DE TENER UN MAXIMO DE $maxChar CARACTERES'
                            ELSE 'OK'
                            END, estatus = CASE
                            WHEN LENGTH($columnName) >= $maxChar THEN 'OMITIDO'
                            ELSE 'AGREGADO'
                            END;");
        return $query;
    }

}