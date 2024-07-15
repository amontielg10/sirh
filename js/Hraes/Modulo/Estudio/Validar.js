function validarEstudio(){
    let id_cat_nivel_estudios = document.getElementById('id_cat_nivel_estudios').value.trim();
    let id_cat_carrera_hraes = document.getElementById('id_cat_carrera_hraes').value.trim();
    let cedula_es_ = document.getElementById('cedula_es_').value.trim();

    if (validarData(id_cat_nivel_estudios,'Nivel de estudio') &&
    validarData(id_cat_carrera_hraes,'Carrera') &&
    validarData(cedula_es_,'Cédula') 
    ){
        guardarEstudio();
    }
}
                            

