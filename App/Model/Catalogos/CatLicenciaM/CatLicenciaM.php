<?php
class CatLicenciaM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT 
                                id_cat_tipo_licencia,
                                nombre
                            FROM cat_tipo_licencia
                            ORDER BY nombre ASC");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT 
                                id_cat_tipo_licencia,
                                nombre
                            FROM cat_tipo_licencia
                            WHERE id_cat_tipo_licencia = $id_object");
        return $listado;
    }
}
