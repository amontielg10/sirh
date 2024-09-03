<?php
class CatPeriodoMM
{
    public function getPeriodo($date){
        $query = pg_query ("SELECT 
                                *
                            FROM central.cat_periodo
                            WHERE id_cat_periodo = 1");
        $query;
    }
}
