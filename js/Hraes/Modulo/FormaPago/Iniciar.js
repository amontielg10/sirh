var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarFormaPago(){
    iniciarTablaFormatoPago(id_tbl_empleados_hraes);
}

function iniciarTablaFormatoPago(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/FormaPago/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#tabla_forma_pago').html(data);
        }
    });
}


function agregarEditarFormaPago(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("tituloFormaPago");
    titulo.textContent = 'Modificar';
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_forma_pago").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/FormaPagoC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 
            var estatus = jsonData.estatus; //Se agrega a emtidad 
            var formatoPago = jsonData.formatoPago;
            var banco = jsonData.banco;

            $('#id_cat_estatus_formato_pago').empty();
            $('#id_cat_estatus_formato_pago').html(estatus); 
            $('#id_cat_formato_pago').empty();
            $('#id_cat_formato_pago').html(formatoPago); 

            $("#clabe").val(entity.clabe);
            $("#nombre_banco").val(banco);
            $("#id_cat_banco").val(entity.id_cat_banco);
        }
    );

    $("#agregar_editar_forma_pago").modal("show");
}

function salirAgregarEditarFormaPago(){
    $("#agregar_editar_forma_pago").modal("hide");
}


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
