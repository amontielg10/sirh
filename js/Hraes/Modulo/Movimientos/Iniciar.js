var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarMovimientos(){
    iniciarTablaMovimiento(id_tbl_empleados_hraes);
}

function iniciarTablaMovimiento(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Movimientos/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#tabla_movimientos').html(data);
        }
    });
}


function agregarEditarMovimiento(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("tituloMovimiento");
    titulo.textContent = 'Modificar';
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_movimiento").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/MovimientosC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let entity = jsonData.response;
            let general = jsonData.general;
            let especifico = jsonData.especifico;

            $('#movimiento_general').empty();
            $('#movimiento_general').html(general); 
            $('#id_tbl_movimientos').empty();
            $('#id_tbl_movimientos').html(especifico); 

        }
    );

    $("#agregar_editar_movimiento").modal("show");
}


function salirAgregarEditarMovimiento(){
    $("#agregar_editar_movimiento").modal("hide");
}

/*






function agregarEditarByDbByFormatoPago() {
    let clabe = $("#clabe").val();
    let id_object = $("#id_object").val();
    let id_cat_banco = $("#id_cat_banco").val();
    let id_cat_estatus_formato_pago = $("#id_cat_estatus_formato_pago").val();
    let id_cat_formato_pago = $("#id_cat_formato_pago").val();

    $.post("../../../../App/Controllers/Hrae/FormaPagoC/AgregarEditarC.php", {
        id_object: id_object,
        clabe: clabe,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
        id_cat_banco:id_cat_banco,
        id_cat_estatus_formato_pago:id_cat_estatus_formato_pago,
        id_cat_formato_pago:id_cat_formato_pago,
    },
        function (data, status) {
            if (data == 'edit'){
                mensajeExito('Forma de pago modificada');
            } else if (data == 'add') {
                mensajeExito('Forma de pago agregada');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_forma_pago").modal("hide");
            iniciarFormaPago();
        }
    );
}


function eliminarFormaPago(id_object) {//ELIMINAR USUARIO
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Hrae/FormaPagoC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Forma de pago eliminada')
                } else {
                    mensajeError(data);
                }
                iniciarFormaPago();
            }
        );
    }
    });
}

function buscarFormaPago(){ //BUSQUEDA
    let buscar = document.getElementById("buscarFormaPagoText").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarFormaPago();
    } else {
        iniciarTablaFormaPagByBusqueda(buscar,id_tbl_empleados_hraes);
    }
}


function iniciarTablaFormaPagByBusqueda(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/FormaPago/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            $('#tabla_forma_pago').html(data);
        }
    });
}
*/