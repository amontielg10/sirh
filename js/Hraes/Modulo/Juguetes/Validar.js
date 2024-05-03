function validarJuguete(){
    agregarEditarByDbByJuguete();
    /*
    let nombre_d = document.getElementById('nombre_d').value;
    let curp_d = document.getElementById('curp_d').value;
    let apellido_paterno_d = document.getElementById('apellido_paterno_d').value;
    let id_cat_dependientes_economicos_d = document.getElementById('id_cat_dependientes_economicos_d').value;
    
    if (validarData(nombre_d,'Nombre') &&
        validarData(curp_d,'Curp') &&
        validarData(apellido_paterno_d,'Apellido paterno') &&
        validarData(id_cat_dependientes_economicos_d,'Tipo dependiente') &&
        campoInvalido(validarCurp(curp_d),'Curp')
    ){
        agregarEditarByDbByDependiente();
    }   
    */ 
}


function handleChange(event){
    let selectedOption = event.target.options[event.target.selectedIndex];
    let id_ctrl_dependientes_economicos_hraes = selectedOption.value;

    $.post("../../../../App/Controllers/Hrae/JuguetesC/CurpC.php", {
        id_ctrl_dependientes_economicos_hraes: id_ctrl_dependientes_economicos_hraes,
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var value = jsonData.value; 
            $('#curp_j').val(value.curp);
        }
    );
}