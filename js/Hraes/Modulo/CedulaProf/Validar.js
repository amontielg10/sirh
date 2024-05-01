function validarCedula(){
    let cedula_profesional = document.getElementById('cedula_profesional').value.trim();

    if (validarData(cedula_profesional,'Cédula profesional') 
    ){
        agregarEditarByDbByCedula();
    }
}