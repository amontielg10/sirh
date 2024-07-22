<?php

class CatLenguaM{

    public function listbyAll(){
        $query = pg_query("SELECT 
                                public.cat_lengua.id_cat_lengua,
                                CONCAT(public.cat_lengua.identificador, ' ', 
                                    public.cat_lengua.descripcion)
                            FROM public.cat_lengua
                            ORDER BY public.cat_lengua.identificador ASC"); 
        return $query;
    }

    public function listOfId($id){
        $query = pg_query("SELECT 
                                public.cat_lengua.id_cat_lengua,
                                CONCAT(public.cat_lengua.identificador, ' ', 
                                    public.cat_lengua.descripcion)
                            FROM public.cat_lengua
                            WHERE public.cat_lengua.id_cat_lengua = $id");
        return $query;
    }

}