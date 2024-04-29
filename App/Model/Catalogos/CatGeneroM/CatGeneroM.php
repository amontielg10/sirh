<?php
class CatalogoGeneroM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT id_cat_genero, genero
                             FROM cat_genero
                             ORDER BY genero ASC");
        return $listado;
    }

    public function obtenerElemetoById($idObject)
    {
        $listado = pg_query("SELECT id_cat_genero, genero
                             FROM cat_genero
                             WHERE id_cat_genero = $idObject");
        return $listado;
    }
}
