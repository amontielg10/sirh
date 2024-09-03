<?php
class CatDiasM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT 
                                id_cat_tipo_dias,
                                nombre
                            FROM cat_tipo_dias
                            ORDER BY nombre ASC");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT 
                                id_cat_tipo_dias,
                                nombre
                            FROM cat_tipo_dias
                            WHERE id_cat_tipo_dias = $id_object");
        return $listado;
    }


    ///GET PERIODO 
    public function getPeriodo($date){
        $query = pg_query ("SELECT 
                                (central.cat_periodo.descripcion)
                            FROM central.cat_periodo
                            WHERE '$date' BETWEEN fecha_inicio AND fecha_fin;");
        return $query;
    }
}
