function validar(){
    let id_cat_plazas = document.getElementById('id_cat_plazas').value.trim();
    let id_cat_tipo_contratacion_hraes = document.getElementById('id_cat_tipo_contratacion_hraes').value.trim();
    let id_cat_unidad_responsable = document.getElementById('id_cat_unidad_responsable').value.trim();
    let id_cat_puesto_hraes = document.getElementById('id_cat_puesto_hraes').value.trim();
    let id_cat_zonas_tabuladores_hraes = document.getElementById('id_cat_zonas_tabuladores_hraes').value.trim();
    let id_cat_niveles_hraes = document.getElementById('id_cat_niveles_hraes').value.trim();
    let num_plaza = document.getElementById('num_plaza').value.trim();
    let zona_pagadora = document.getElementById('zona_pagadora').value.trim();


    if (validarData(id_cat_plazas,'Tipo de plaza') &&
        validarData(id_cat_tipo_contratacion_hraes,'Tipo de contratación') &&
        validarData(id_cat_unidad_responsable,'Unidad responsable') &&
        validarData(id_cat_puesto_hraes,'Puesto') &&
        validarData(id_cat_zonas_tabuladores_hraes,'Zona tabuladores') &&
        validarData(id_cat_niveles_hraes,'Niveles')&&
        validarData(num_plaza,'Número de plaza') &&
        validarData(zona_pagadora,'Zona pagadora')
    ){
        agregarEditarByDb();
    } 
}
