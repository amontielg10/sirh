function campoInvalido(data, text){
    let bool = true;
    if (!data){
        mensajeError('Campo ' + text + '* no valido.');
        bool = false;
    } 
    return bool;
  }