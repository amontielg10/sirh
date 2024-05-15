function campoInvalido(data, text){
    let bool = true;
    if (!data){
        mensajeError('Campo ' + text + '* no valido.');
        bool = false;
    } 
    return bool;
}

function caracteresCount(text, number,value){
    let bool = true;
    if(value.length >= number){
        bool = false
        mensajeError(text + ' debe tener hasta un máximo de ' + number + ' caracteres')
    } 
    return bool;
}