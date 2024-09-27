var valorInicial_re = 1;
var idtable_re = document.getElementById('idtable_re');
var buscar_retardo = document.getElementById("buscar_retardo");
//var buscar = document.getElementById("buscarUsuario").value.trim();


function siguienteValor_re(){
    valorInicial_re++;
    idtable_re.textContent = valorInicial_re;
    buscarRetardo();
}

function anteriorValor_re(){
    valorInicial_re--;
    if(valorInicial_re < 1){
        valorInicial_re = 1;
    }
    idtable_re.textContent = valorInicial_re;
    buscarRetardo();
}

function iniciarBusqueda_re(){
    let valorInicial_reAux = valorInicial_re;
    valorInicial_reAux --;
    let valoroff = valorInicial_reAux * 5;
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