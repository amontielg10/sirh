<?php

class MasivoEmpleadosM
{

    public function addTemporaryTable($conection, $tableName, $data)
    {
        $pg_add = pg_insert($conection, $tableName, $data);
        return $pg_add;
    }

    public function truncateTable($tableName)
    {
        $query = pg_query("TRUNCATE TABLE $tableName RESTART IDENTITY;");
        return $query;
    }

    public function addStatusGeneral($tableName, $tableNameEmployee){
        $query = pg_query("UPDATE $tableName
                            SET estatus  = CASE
                                WHEN EXISTS (
                                    SELECT 1
                                    FROM $tableNameEmployee
                                    WHERE $tableName.curp = 
                                        $tableNameEmployee.curp
                                )
                                THEN 'MODIFICAR'
                                ELSE 'AGREGAR'
                            END;");
        return $query;
    }
    public function validateCurp($tableName)
    {
        $query = pg_query("UPDATE $tableName
                           SET  observaciones = 
                                    CASE
                                        WHEN curp ~ '^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$' THEN ''
                                        ELSE ' {CURP:NO VALIDO}, '
                                    END;");
        return $query;
    }

    public function validateRFC($tableName)
    {
        $query = pg_query("UPDATE $tableName
                            SET  observaciones = observaciones || 
                                    CASE
                                        WHEN rfc ~ '^([A-ZÑ&]{4}[A-Z0-9]{6}[A-Z0-9]{3}|[A-ZÑ&]{3}[0-9]{6}[A-Z0-9]{3})$' THEN ''
                                        WHEN rfc = 'X' THEN ''
                                        ELSE ' {RFC:NO VALIDO}, '
                                    END;");
        return $query;
    }

    public function validateChar($tableName, $columnName, $maxValue, $text)
    {
        $query = pg_query("UPDATE $tableName
                            SET observaciones = observaciones || 
                                    CASE
                                        WHEN LENGTH($columnName) < $maxValue OR $columnName IS NULL THEN ''
                                        ELSE ' { $text :MAX $maxValue CHAR}, '
                                    END;");
        return $query;
    }

    public function validateIsNull($tableName, $columnName, $text)
    {
        $query = pg_query("UPDATE $tableName    
                           SET observaciones = observaciones ||
                                CASE 
                                    WHEN TRIM($columnName) IS NOT NULL THEN ''
                                    ELSE ' { $text :CAMPO REQUERIDO}'
                                END;");
        return $query;
    }

    public function validateNumberEmployee($tableName, $tableName_emp)
    {
        $query = pg_query(" ");
        return $query;
    }

    public function validateIsNumber($tableName, $columnName){
        $query = pg_query ("");
        return $query;
    }

}