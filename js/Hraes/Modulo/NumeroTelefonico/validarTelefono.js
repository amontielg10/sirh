function validarTelefono(){
    let movil = document.getElementById('movil').value.trim();
    let id_cat_estatus = document.getElementById('id_cat_estatus').value.trim();


    if (validarData(movil,'Número telefónico') &&
        validarData(id_cat_estatus,'Estatus') 
    ){
        agregarEditarByDbByTelefono();
    }
}