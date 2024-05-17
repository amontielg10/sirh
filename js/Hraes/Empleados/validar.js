function validar(){
    let nombre = document.getElementById('nombre').value.trim();
    let rfc = document.getElementById('rfc').value.trim();
    let primer_apellido = document.getElementById('primer_apellido').value.trim();
    let curp = document.getElementById('curp').value.trim();
    let num_empleado = document.getElementById('num_empleado').value.trim();
    let pais_nacimiento = document.getElementById('pais_nacimiento').value.trim();
    let id_cat_genero = document.getElementById('id_cat_genero').value.trim();
    let id_cat_estado_civil = document.getElementById('id_cat_estado_civil').value.trim();
    let id_object = document.getElementById('id_object').value;
    
    if (validarData(nombre,'Nombre') &&
        validarData(rfc,'Rfc') &&
        validarData(primer_apellido,'Apellido paterno') &&
        validarData(curp,'Curp') &&
        validarData(num_empleado,'Num. empleado') &&
        validarData(pais_nacimiento,'Pais de nacimiento') &&
        validarData(id_cat_genero,'Genero') &&
        validarData(id_cat_estado_civil,'Estado civil') &&
        campoInvalido(validarCurp(curp),'Curp')
    ){
        validarUnique(rfc,curp,num_empleado,id_object);
    }
}


function validarUnique(rfc,curp,numEmpleado,id_object){
    $.post("../../../../App/Controllers/Hrae/EmpleadoC/ValidarC.php", {
        rfc: rfc,
        curp:curp,
        numEmpleado:numEmpleado,
        id_object:id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);//se obtiene el json
            let bool = jsonData.bool; 
            let message = jsonData.message;
            
            if(bool){
                agregarEditarByDb();
            } else {
                mensajeError(message);
            }
        }
    );
}