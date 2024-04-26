<?php

class catalogoTipoContratacionM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_tipo_contratacion_hraes, descripcion_cont
                             FROM cat_tipo_contratacion_hraes
                             ORDER BY descripcion_cont ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_tipo_contratacion_hraes, descripcion_cont
                             FROM cat_tipo_contratacion_hraes
                             WHERE descripcion_cont = $idObject");
        return $listado;
    }
}
