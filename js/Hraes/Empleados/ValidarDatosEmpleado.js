function validarDatosEmpleado(){
    let pais_nacimiento = document.getElementById('pais_nacimiento').value.trim();
    let id_cat_genero_hraes = document.getElementById('id_cat_genero_hraes').value.trim();
    let id_cat_estado_civil_hraes = document.getElementById('id_cat_estado_civil_hraes').value.trim();

    if (validarData(pais_nacimiento,'Pais de nacimiento') &&
        validarData(id_cat_genero_hraes,'Genero') &&
        validarData(id_cat_estado_civil_hraes,'Estado civil')
    ){
        agregarEditarByDbDarosEmpleado();
    } 
}