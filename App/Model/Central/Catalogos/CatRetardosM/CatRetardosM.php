<?php

class CatRetardosM
{
    public function listadoRetardoTipo(){
        $query = pg_query("SELECT 
                                central.cat_retardo_tipo.id_cat_retardo_tipo,
                                UPPER(central.cat_retardo_tipo.descripcion)
                            FROM central.cat_retardo_tipo
                            ORDER BY central.cat_retardo_tipo.descripcion ASC;");
        return $query;
    }

    public function listadoRetardoEstatus(){
        $query = pg_query("SELECT 
                                central.cat_retardo_estatus.id_cat_retardo_estatus,
                                UPPER(central.cat_retardo_estatus.descripcion)
                            FROM central.cat_retardo_estatus
                            WHERE central.cat_retardo_estatus.id_cat_retardo_estatus <> 4 -- EL ID = 4, SOLO SE OCUPA PARA FALTAS
                            ORDER BY central.cat_retardo_estatus.descripcion ASC;");
        return $query;
    }
}
