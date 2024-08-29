function validarDependiente_(){
    let fecha_retardo = document.getElementById('fecha_retardo').value;
    let hora_entrada = document.getElementById('hora_entrada').value;
    
    if (validarData(fecha_retardo,'Fecha') &&
        validarData(hora_entrada,'Hora entrada')
    ){
        guardarRetardoX();
    }    
}

//functiion get quincena
const dateInput = document.getElementById('fecha_rr');
dateInput.addEventListener('change', function() {
    let isValue = dateInput.value;
    
    $.post("../../../../App/Controllers/Central/CatQuincenaC/CatQuincenaC.php", {
        isValue: isValue
    },
        function (data) {
            let jsonData = JSON.parse(data);
            $("#id_cat_quincenas").val(jsonData.id_cat_quincenas);
            $("#quincena_rr").val(jsonData.quincena);
            $("#periodo_quincena_rr").val(jsonData.quincenaPeriodo);
        }
    );

});