<?php


echo listar(null, 12,2);


function listar($id_tbl_centro_trabajo_hraes,$busqueda,$paginator)
    {
        $result = "AND (TRIM(UPPER(UNACCENT(tbl_control_plazas_hraes.num_plaza))) 
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_plazas.tipo_plaza)))
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_tipo_contratacion_hraes.descripcion_cont)))
                            LIKE '%$busqueda%'
                    OR TRIM(UPPER(UNACCENT(cat_unidad_responsable.nombre)))
                            LIKE '%$busqueda%')
                    ORDER BY id_tbl_control_plazas_hraes DESC
                    LIMIT 5 OFFSET $paginator;";
        $condition = "";
        if($id_tbl_centro_trabajo_hraes != null){
            $condition = "WHERE tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes = 
                          $id_tbl_centro_trabajo_hraes ";
        }
        $condition = $condition . $result;

        $listado = "SELECT tbl_control_plazas_hraes.id_tbl_control_plazas_hraes,
                           tbl_control_plazas_hraes.num_plaza, cat_plazas.tipo_plaza,
                           cat_tipo_contratacion_hraes.descripcion_cont, 
                           cat_unidad_responsable.nombre
                    FROM tbl_control_plazas_hraes
                    INNER JOIN cat_plazas
                        ON tbl_control_plazas_hraes.id_cat_plazas = cat_plazas.id_cat_plazas
                    INNER JOIN cat_tipo_contratacion_hraes
                        ON tbl_control_plazas_hraes.id_cat_tipo_contratacion_hraes = 
                           cat_tipo_contratacion_hraes.id_cat_tipo_contratacion_hraes
                    INNER JOIN cat_unidad_responsable
                        ON tbl_control_plazas_hraes.id_cat_unidad_responsable = 
                           cat_unidad_responsable.id_cat_unidad_responsable " .  $condition;
        return $listado;
    }