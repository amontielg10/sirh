var valorInicial_li = 1;
var idtable_li = document.getElementById('idtable_li');
var buscar_li = document.getElementById("buscar_li");

function siguienteValor_li(){
    valorInicial_li++;
    idtable_li.textContent = valorInicial_li;
    buscarLicencia();
}

function anteriorValor_li(){
    valorInicial_li--;
    if(valorInicial_li < 1){
        valorInicial_li = 1;
    }
    idtable_li.textContent = valorInicial_li;
    buscarLicencia();
}

function iniciarBusqueda_li(){
    let valorInicialAux = valorInicial_li;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
