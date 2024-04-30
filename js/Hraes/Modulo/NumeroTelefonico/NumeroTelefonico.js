var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarNumeroTelefonico(){
    iniciarTablaTelefono(id_tbl_empleados_hraes);
}

function iniciarTablaTelefono(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/NumeroTelefonico/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#modulo_telefono').html(data);
        }
    });
}

function agregarEditarTelefono(id_object){

    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_telefono").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/TelefonoC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 
            var estatus = jsonData.estatus; //Se agrega a emtidad 

            $('#id_cat_estatus').empty();
            $('#id_cat_estatus').html(estatus); 
            $("#movil").val(entity.movil);
        }
    );

    $("#agregar_editar_telefono").modal("show");
}

function salirAgregarEditarTelefono(){
    $("#agregar_editar_telefono").modal("hide");
}

function agregarEditarByDbByTelefono() {
    var movil = $("#movil").val();
    var id_cat_estatus = $("#id_cat_estatus").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/TelefonoC/AgregarEditarC.php", {
        movil: movil,
        id_cat_estatus: id_cat_estatus,
        id_object:id_object,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data, status) {
            if (data == 'edit'){
                mensajeExito('Número telefonico modificado');
            } else if (data == 'add') {
                mensajeExito('Número telefonico agregado');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_telefono").modal("hide");
            iniciarNumeroTelefonico();
        }
    );
}

function eliminarTelefono(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/TelefonoC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Número telefonico eliminado')
                } else {
                    mensajeError(data);
                }
                iniciarNumeroTelefonico();
            }
        );
    }
    });
}