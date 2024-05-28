var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function buscarMovimiento(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_mv);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_mv(null, iniciarBusqueda_mv(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_mv(buscarNew, iniciarBusqueda_mv(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_mv(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Hraes/Modulo/Movimientos/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_movimientos").html(data); 
        }
    );
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
            let num_plaza_m = jsonData.num_plaza_m;
            let especifico = jsonData.especifico;
            let tipo_plaza_m = jsonData.tipo_plaza_m;
            let unidad_responsable_m = jsonData.unidad_responsable_m;

            $('#movimiento_general').empty();
            $('#movimiento_general').html(general); 
            $('#id_tbl_movimientos').empty();
            $('#id_tbl_movimientos').html(especifico); 

            $('#fecha_movimiento').val(entity.fecha_movimiento); 
            $('#fecha_inicio').val(entity.fecha_inicio); 
            $('#fecha_termino').val(entity.fecha_termino);
            $('#id_plaza').val(entity.id_tbl_control_plazas_hraes);  

            $('#num_plaza_m').val(num_plaza_m); 
            $('#tipo_plaza_m').val(tipo_plaza_m); 
            $('#unidad_responsable_m').val(unidad_responsable_m);

            $('#num_plaza_validate').val(num_plaza_m);
            $('#id_tbl_movimientos_validate').val(entity.id_tbl_movimientos);
        }
    );

    $("#agregar_editar_movimiento").modal("show");
}


function salirAgregarEditarMovimiento(){
    $("#agregar_editar_movimiento").modal("hide");
}


function guardarMovimiento(id_plaza) {
    let fecha_inicio = $("#fecha_inicio").val();
    let id_object = $("#id_object").val();
    let fecha_termino = $("#fecha_termino").val();
    let id_tbl_movimientos = $("#id_tbl_movimientos").val();
    let fecha_movimiento = $("#fecha_movimiento").val();
    let id_tbl_control_plazas_hraes = $("#id_plaza").val();

    if(id_plaza != null){
        id_tbl_control_plazas_hraes = id_plaza;
    }

    $.post("../../../../App/Controllers/Hrae/MovimientosC/AgregarEditarC.php", {
        fecha_inicio: fecha_inicio,
        id_object:id_object,
        fecha_termino: fecha_termino,
        id_tbl_movimientos:id_tbl_movimientos,
        fecha_movimiento:fecha_movimiento,
        id_tbl_control_plazas_hraes:id_tbl_control_plazas_hraes,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Movimiento modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Movimiento agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_movimiento").modal("hide");
            buscarMovimiento();
        }
    );
}

function eliminarMovimiento(id_object) {//ELIMINAR USUARIO
    if(validarAccion()){
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
        $.post("../../../../App/Controllers/Hrae/MovimientosC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Movimiento eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                buscarMovimiento();
            }
        );
    }
    });
}
}

/*
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