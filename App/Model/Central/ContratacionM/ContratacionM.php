<?php

class ContratacionM
{
    public function listarByAllPrograma()
    {
        $query = pg_query("SELECT 
                                central.cat_tipo_programa.id_cat_tipo_programa,
                                central.cat_tipo_programa.descripcion
                            FROM central.cat_tipo_programa
                            ORDER BY central.cat_tipo_programa.descripcion ASC;");
        return $query;
    }

    public function listarByEditPrograma($id)
    {
        $query = pg_query("SELECT 
                                central.cat_tipo_programa.id_cat_tipo_programa,
                                central.cat_tipo_programa.descripcion
                            FROM central.cat_tipo_programa
                            WHERE central.cat_tipo_programa.id_cat_tipo_programa = $id;");
        return $query;
    }

    public function listarByAllTrabajador()
    {
        $query = pg_query("SELECT 
                                central.cat_tipo_trabajador.id_cat_tipo_trabajador,
                                UPPER(central.cat_tipo_trabajador.descripcion)
                            FROM central.cat_tipo_trabajador
                            ORDER BY central.cat_tipo_trabajador.descripcion ASC;");
        return $query;
    }

    public function listarByAEditTrabajador($id)
    {
        $query = pg_query("SELECT 
                                central.cat_tipo_trabajador.id_cat_tipo_trabajador,
                                UPPER(central.cat_tipo_trabajador.descripcion)
                            FROM central.cat_tipo_trabajador
                            WHERE central.cat_tipo_trabajador.id_cat_tipo_trabajador = $id;");
        return $query;
    }

    public function listarByAllContratacion($id_cat_tipo_trabajador)
    {
        $query = pg_query("SELECT 
                                central.cat_tipo_contratacion.id_cat_tipo_contratacion,
                                UPPER(central.cat_tipo_contratacion.descripcion)
                            FROM central.cat_tipo_contratacion
                            INNER JOIN central.cat_trabajador_contratacion
                                ON central.cat_tipo_contratacion.id_cat_tipo_contratacion =
                                    central.cat_trabajador_contratacion.id_cat_tipo_contratacion
                            WHERE central.cat_trabajador_contratacion.id_cat_tipo_trabajador = $id_cat_tipo_trabajador;");
        return $query;
    }

    public function listarByEditContratacion($id)
    {
        $query = pg_query("SELECT
                                central.cat_tipo_contratacion.id_cat_tipo_contratacion,
                                UPPER(central.cat_tipo_contratacion.descripcion)
                            FROM central.cat_tipo_contratacion 
                            WHERE central.cat_tipo_contratacion.id_cat_tipo_contratacion = $id;");
        return $query;
    }
}