var valorInicial_fa = 1;
var idtable_fa = document.getElementById('idtable_fa');
var buscar_fa = document.getElementById("buscar_fa");

function siguienteValor_fa(){
    valorInicial_fa++;
    idtable_fa.textContent = valorInicial_fa;
    buscarFalta();
}

function anteriorValor_fa(){
    valorInicial_fa--;
    if(valorInicial_fa < 1){
        valorInicial_fa = 1;
    }
    idtable_fa.textContent = valorInicial_fa;
    buscarFalta();
}

function iniciarBusqueda_fa(){
    let valorInicialAux = valorInicial_fa;
    valorInicialAux --;
    let valoroff = valorInicialAux * 3;
    return valoroff;
}
