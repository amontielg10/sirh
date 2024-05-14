var valorInicial = 1;
var textValor = document.getElementById('idtable_c');
var buscar_c = document.getElementById("buscar_c");
//var buscar = document.getElementById("buscarUsuario").value.trim();


function siguienteValor_c(){
    valorInicial++;
    textValor.textContent = valorInicial;
    buscarCedula();
}

function anteriorValor_c(){
    valorInicial--;
    if(valorInicial < 1){
        valorInicial = 1;
    }
    textValor.textContent = valorInicial;
    buscarCedula();
}

function iniciarBusqueda_c(){
    let valorInicialAux = valorInicial;
    valorInicialAux --;
    let valoroff = valorInicialAux * 5;
    return valoroff;
}

///LA FUNCION RETORNA EL VALOR SIN ACENTOS, ESPACIOS EN BLANCA O CARACTERES ESPECIALES
function clearElement(value){
    return value.value.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
}

///LA FUNCION RETORNA EL TOTAL DE CARACTERES DEL VALOR
function lengthValue(value){
    return value.length;
}