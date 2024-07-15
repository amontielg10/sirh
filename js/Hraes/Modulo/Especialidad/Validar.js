function validarEspecialidad(){
    let id_cat_especialidad_hraes = document.getElementById('id_cat_especialidad_hraes').value.trim();
    let cedula_espec_ = document.getElementById('cedula_espec_').value.trim();

    if (validarData(id_cat_especialidad_hraes,'Especialidad') &&
    validarData(cedula_espec_,'Cédula')
    ){
        guardarCedula();
    }
}
                            

