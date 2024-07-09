<?php
class CatEstatusIncidenciasM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT 
                                id_cat_estatus_incidencias,
                                nombre
                            FROM cat_estatus_incidencias
                            ORDER BY nombre ASC");
        return $listado;
    }

    public function listarById($id_object)
    {
        $listado = pg_query("SELECT 
                                id_cat_estatus_incidencias,
                                nombre
                            FROM cat_estatus_incidencias
                            WHERE id_cat_estatus_incidencias = $id_object");
        return $listado;
    }
}
