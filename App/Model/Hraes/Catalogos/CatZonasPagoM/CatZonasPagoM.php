<?php

class CatZonasPagoM
{
    public function listarByAll()
    {
        $listado = pg_query("SELECT CONCAT(cat_entidad.clave_entidad, ' - ', cat_entidad.entidad),
                                    tbl_zonas_pago_hraes.id_tbl_zonas_pago_hares
                             FROM tbl_zonas_pago_hraes
                             INNER JOIN cat_entidad
                             ON id_entidad =
                                cat_entidad.id_cat_entidad
                             ORDER BY cat_entidad.entidad ASC;");
        return $listado;
    }

    public function ListarElemetoById($idObject)
    {
        $listado = pg_query("SELECT CONCAT(cat_entidad.clave_entidad, ' - ', cat_entidad.entidad),
                                    tbl_zonas_pago_hraes.id_tbl_zonas_pago_hares
                             FROM tbl_zonas_pago_hraes
                             INNER JOIN cat_entidad
                             ON id_entidad =
                                cat_entidad.id_cat_entidad
                             WHERE tbl_zonas_pago_hraes.id_tbl_zonas_pago_hares = $idObject
                             ORDER BY cat_entidad.entidad ASC;");
        return $listado;
    }

    /*
    public function listarByAll()
    {
        $listado = pg_query("SELECT DISTINCT (codigo),id_tbl_zonas_pago_hares
                             FROM tbl_zonas_pago_hraes
                             ORDER BY codigo ASC");
        return $listado;
    }

    public function ListarElemetoById($idObject)
    {
        $listado = pg_query("SELECT DISTINCT (codigo),id_tbl_zonas_pago_hares
                             FROM tbl_zonas_pago_hraes
                             WHERE id_tbl_zonas_pago_hares = $idObject");
        return $listado;
    }
    */
}
