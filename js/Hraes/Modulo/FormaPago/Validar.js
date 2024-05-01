function validarFormaPago(){
    let clabe = document.getElementById('clabe').value;
    let id_cat_estatus_formato_pago = document.getElementById('id_cat_estatus_formato_pago').value;
    let id_cat_formato_pago = document.getElementById('id_cat_formato_pago').value;

    if (validarData(clabe,'Cuenta clabe') &&
        validarData(id_cat_estatus_formato_pago,'Estatus') &&
        validarData(id_cat_formato_pago,'Forma de pago') 
    ){
        if(validarCLABE(clabe)){
            agregarEditarByDbByFormatoPago();
        } else {
            mensajeError('Campo Cuenta clabe* invalida');
        }
    }
}

function validarCuenta(){
    let clabe = document.getElementById('clabe').value;
    let clabeSub = clabe.substr(0, 3);

    $.ajax({
        type: 'POST',
        url: "../../../../App/Controllers/Hrae/FormaPagoC/ValidarClabeC.php",
        data: {clabeSub:clabeSub },
        success: function (data) {
            jsonData = JSON.parse(data);
            let nombre = jsonData.nombre;
            let id = jsonData.id;

            $("#nombre_banco").val(nombre);
            $("#id_cat_banco").val(id);
            
        }
    });
}
