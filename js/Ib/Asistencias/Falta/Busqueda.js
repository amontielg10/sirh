var valorInicial_fa = 1;
var idtable_fa = document.getElementById('idtable_fa');
var buscar_falta = document.getElementById("buscar_falta");
//var buscar = document.getElementById("buscarUsuario").value.trim();


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

function iniciarBusqueda_(){
    let valorInicial_faAux = valorInicial_fa;
    valorInicial_faAux --;
    let valoroff = valorInicial_faAux * 5;
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