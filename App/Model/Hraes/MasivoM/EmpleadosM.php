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

    public function addStatusGeneral($tableName, $tableNameEmployee)
    {
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

    public function validateDataIsRequired($tableName, $tableAuxName, $valueTable, $valueTableAux, $IsText)
    {
        $query_ = pg_query("UPDATE $tableName
                            SET observaciones = observaciones ||
                                CASE 
                                    WHEN EXISTS (
                                        SELECT 1
                                        FROM $tableAuxName 
                                        WHERE $valueTableAux = $valueTable
                                    )
                                    THEN ' { $IsText :YA EXISTE }, '
                                    ELSE ''
                                END;");
        return $query_;
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
                                        WHEN LENGTH($columnName) <= $maxValue THEN ''
                                        WHEN $columnName = 'X' THEN ''
                                        ELSE ' { $text :MAX $maxValue CHAR}, '
                                    END;");
        return $query;
    }

    public function validateIsNumber($tableName, $columnName, $text, $isEquals)
    {
        $query = pg_query("UPDATE $tableName
                            SET observaciones = observaciones ||  CASE 
                                WHEN length($columnName) = $isEquals AND $columnName ~ '^[0-9]+$' THEN ''
                                WHEN $columnName = 'X' THEN ''
                                ELSE ' { $text :NO VALIDO},'
                            END;");
        return $query;
    }

    public function validateDate($tableName, $columnName, $text)
    {
        $query = pg_query("UPDATE $tableName
                            SET observaciones = observaciones ||  CASE 
                                WHEN $columnName ~ '^\d{4}-\d{2}-\d{2}$' THEN ''
                                WHEN $columnName ~ '^\d{4}/\d{2}/\d{2}$' THEN ''
                                WHEN $columnName = 'X' THEN ''
                                ELSE ' { $text :FORMATO REQUERIDO(AAAA-MM-DD)},'
                            END;");
        return $query;
    }
    public function validateIsNull($tableName, $columnName, $text) ///IS REQUIRED
    {
        $query = pg_query("UPDATE $tableName    
                           SET observaciones = observaciones ||
                                CASE 
                                    WHEN TRIM($columnName) IS NOT NULL THEN ''
                                    ELSE ' { $text :CAMPO REQUERIDO},'
                                END;");
        return $query;
    }

    public function validateIsCatalogue($tableName, $columnName, $tableCat, $isValue, $isText)
    {
        $isValueComparate = $tableName . '.' . $columnName;

        $query = pg_query("UPDATE $tableName 
                            SET observaciones = observaciones ||
                                CASE 
                                    WHEN EXISTS (
                                        SELECT DISTINCT(1)
                                        FROM $tableCat
                                        WHERE UPPER(TRIM(UNACCENT($isValueComparate))) = UPPER(TRIM(UNACCENT($isValue))) 
                                    ) OR $isValueComparate = 'X' THEN ''
                                    ELSE ' { $isText : NO ENCONTRADO EN CATALOGO }, '
                                END;");
        return $query;
    }

    public function validateIsCatalogueInteger($tableName, $columnName, $tableCat, $isValue, $isText)
    {
        $isValueComparate = $tableName . '.' . $columnName;

        $query = pg_query("UPDATE $tableName 
                            SET observaciones = observaciones ||
                            CASE
                                WHEN length($isValueComparate) > 0 AND $isValueComparate != translate($isValueComparate, '0123456789', '') THEN (
                                    CASE 
                                    WHEN EXISTS (
                                        SELECT DISTINCT(1)
                                        FROM $tableCat
                                        WHERE $isValueComparate::INTEGER = $isValue::INTEGER
                                    ) OR $isValueComparate = 'X' THEN ''
                                    ELSE ' { $isText : NO ENCONTRADO EN CATALOGO }, '
                                END
                                )  
                                WHEN $isValueComparate = 'X' THEN '' 
                                ELSE ' { $isText : NO ENCONTRADO EN CATALOGO }, '
                            END;");
        return $query;
    }
}