<script>
function obtenerGenero(curp) {
    let curpAux = curp.substring(10,11);
    let genero;
    if(curpAux == 'H'){
        genero = 'MASCULINO';
    } else if(curpAux == 'M'){
        genero = 'FEMENINO';
    } else {
        genero = 'No encontrado';
    }
    return genero;
}

// Ejemplo de uso
var curp = 'AOAF230617MCSLRRA9';
var genero = obtenerGenero(curp);
console.log('El género es:', genero);
</script>