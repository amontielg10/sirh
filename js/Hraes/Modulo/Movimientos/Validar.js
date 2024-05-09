var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;
var id_baja = 2;
var id_movimiento = 3;
var id_alta = 1;
var id_movimiento_vacante = 5;

function validarMovimiento(){
    
    let num_plaza_m = document.getElementById('num_plaza_m').value;
    let movimiento_general = document.getElementById('movimiento_general').value;
    let id_tbl_movimientos = document.getElementById('id_tbl_movimientos').value;
    let fecha_inicio = document.getElementById('fecha_inicio').value;
    let fecha_termino = document.getElementById('fecha_termino').value;
    let fecha_movimiento = document.getElementById('fecha_movimiento').value;

    let id_tipo_plaza = document.getElementById('id_tipo_plaza').value;

    validarUltimoMovimiento(movimiento_general);

    /*
    if(movimiento_general == id_baja || movimiento_general == id_movimiento){
        validarUltimoMovimiento();
    } else {
        if (id_tipo_plaza != id_movimiento_vacante){
            //La plaza se encuentra ocupada, congelada etc.
            mensajeError('La plaza no se encuentra disponible');
        } else {
            //Plaza disponible
        }
        console.log('agregar o movimiento')
    }
*/
 




    /*
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
    */
}

document.getElementById("movimiento_general").addEventListener("change", function() {
    let movimiento_general = this.value;
    if (movimiento_general == id_baja){
        ocultarContenido();
    } else {
        mostrarContenido();
    }
    $.post("../../../../App/Controllers/Hrae/MovimientosC/MEspecificoC.php", {
        movimiento_general: movimiento_general,
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var especifico = jsonData.especifico; 

            $('#id_tbl_movimientos').empty();
            $('#id_tbl_movimientos').html(especifico);   
        }
    );
  });

function validarNumPlaza(){
    let num_plaza_m = document.getElementById('num_plaza_m').value.trim();

    $.ajax({
        type: 'POST',
        url: "../../../../App/Controllers/Hrae/MovimientosC/NumPlazaC.php",
        data: {num_plaza_m:num_plaza_m },
        success: function (data) {
            jsonData = JSON.parse(data);
            let tipo_plaza = jsonData.tipo_plaza;
            let unidad_responsable = jsonData.unidad_responsable;
            let id_tipo_plaza = jsonData.id_tipo_plaza;
            let id_plaza = jsonData.id_plaza;

            $("#id_tipo_plaza").val(id_tipo_plaza);
            $("#id_plaza").val(id_plaza);
            $("#tipo_plaza_m").val(tipo_plaza);
            $("#unidad_responsable_m").val(unidad_responsable);
            
        }
    });
}

///LA FUNCION PERMITE CONSULTAR EL ULTIMO MOVIMIENTO DEL EMPLEADO
function validarUltimoMovimiento(id_movimiento){
    $.ajax({
        type: 'POST',
        url: "../../../../App/Controllers/Hrae/MovimientosC/UltimoMovimientoC.php",
        data: {id_tbl_empleados_hraes:id_tbl_empleados_hraes,
            id_movimiento:id_movimiento
         },
        success: function (data) {
            console.log(data);
            jsonData = JSON.parse(data);
            let bool = jsonData.bool;
            let mensaje = jsonData.mensaje;

            if (bool){
                console.log('exito');
            } else {   
                mensajeError(mensaje);
            }
            
        }
    });
}





function ocultarContenido() {
    let x = document.getElementById("ocultar_model");
    x.style.display = "none";
    
}

function mostrarContenido() {
    let x = document.getElementById("ocultar_model");
    x.style.display = "block";
}