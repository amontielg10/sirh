<?php

class CatUnidadAdM{
    public function lisOfCatUnidad(){
        $query = pg_query("SELECT 
                                public.cat_unidad.id_cat_unidad,
                                UPPER(public.cat_unidad.nombre)
                            FROM public.cat_unidad
                            ORDER BY public.cat_unidad.nombre ASC;");
        return $query;
    }

    public function listOfCatCoordinacion(){
        $query = pg_query("SELECT public.cat_coordinacion.id_cat_coordinacion,
                                UPPER(public.cat_coordinacion.nombre)
                            FROM public.cat_coordinacion
                            ORDER BY public.cat_coordinacion.nombre ASC;");
        return $query;
    }

    public function editOfCatUnidad($id){
        $query = pg_query("SELECT 
                                public.cat_unidad.id_cat_unidad,
                                UPPER(public.cat_unidad.nombre)
                            FROM public.cat_unidad
                            WHERE public.cat_unidad.id_cat_unidad = $id;");
        return $query;
    }

    public function editOfCatCoordinacion($id){
        $query = pg_query("SELECT public.cat_coordinacion.id_cat_coordinacion,
                                UPPER(public.cat_coordinacion.nombre)
                            FROM public.cat_coordinacion
                            WHERE public.cat_coordinacion.id_cat_coordinacion = $id");
        return $query;
    }
}