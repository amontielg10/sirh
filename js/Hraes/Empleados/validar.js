function validar(){
    let nombre = document.getElementById('nombre').value.trim();
    let rfc = document.getElementById('rfc').value.trim();
    let primer_apellido = document.getElementById('primer_apellido').value.trim();
    let curp = document.getElementById('curp').value.trim();
    let segundo_apellido = document.getElementById('segundo_apellido').value.trim();
    let nss = document.getElementById('nss').value.trim();

    /*
    if (validarCurp(curp)){
        console.log('curp valida');
    } else {
        console.log('curp invalida');
    }*/ 
    
    if (validarData(nombre,'Nombre') &&
        validarData(rfc,'Rfc') &&
        validarData(primer_apellido,'Apellido paterno') &&
        validarData(curp,'Curp') &&
        validarData(segundo_apellido,'Apellido materno') &&
        validarData(nss,'Número de seguro social') &&
        campoInvalido(validarCurp(curp),'Curp')
    ){
        agregarEditarByDb();
    }
}
