<?php

class MasivoEmpleadosM{

    public function addTemporaryTable($conection, $tableName, $data){
        $pg_add = pg_insert($conection, $tableName, $data);
        return $pg_add;
    }

    public function truncateTable($tableName)
    {
        $query = pg_query("TRUNCATE TABLE $tableName RESTART IDENTITY;");
        return $query;
    }

}