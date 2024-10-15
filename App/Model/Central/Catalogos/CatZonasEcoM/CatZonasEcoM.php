<?php

class CatZonasEconomicas
{
    public function selectByAll()
    {
        $query = pg_query("SELECT 
                                central.cat_zona_economica.id_cat_zona_economica,
                                central.cat_zona_economica.clave
                            FROM central.cat_zona_economica
                            ORDER BY central.cat_zona_economica.clave ASC;");
        return $query;
    }

    public function selectByEdit($id)
    {
        $query = pg_query("SELECT 
                                central.cat_zona_economica.id_cat_zona_economica,
                                central.cat_zona_economica.clave
                            FROM central.cat_zona_economica
                            WHERE central.cat_zona_economica.id_cat_zona_economica = $id;");
        return $query;
    }

}