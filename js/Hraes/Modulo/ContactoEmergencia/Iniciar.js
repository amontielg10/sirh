var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarEmergencia(){
    iniciarTablaEmergencia(id_tbl_empleados_hraes);
}

function iniciarTablaEmergencia(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/ContactoEmergencia/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#modulo_contacto_emergencia').html(data);
        }
    });
}

function agregarEditarEmergencia(id_object){

    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_contacto_emergencia").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/ContactoEmergenciaC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 
            var estatus = jsonData.estatus; //Se agrega a emtidad 

            $('#id_cat_estatus_emergencia').empty();
            $('#id_cat_estatus_emergencia').html(estatus); 

            $("#nombre").val(entity.nombre);
            $("#primer_apellido").val(entity.primer_apellido);
            $("#segundo_apellido").val(entity.segundo_apellido);
            $("#parentesco").val(entity.parentesco);
            $("#movil_emergencia").val(entity.movil);
        }
    );

    $("#agregar_editar_contacto_emergencia").modal("show");
}

function salirAgregarEditarEmergencia(){
    $("#agregar_editar_contacto_emergencia").modal("hide");
}

function agregarEditarByDbByEmergencia() {
    var movil = $("#movil_emergencia").val();
    var nombre = $("#nombre").val();
    var primer_apellido = $("#primer_apellido").val();
    var segundo_apellido = $("#segundo_apellido").val();
    var parentesco = $("#parentesco").val();
    var id_cat_estatus_emergencia = $("#id_cat_estatus_emergencia").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/ContactoEmergenciaC/AgregarEditarC.php", {
        movil: movil,
        nombre: nombre,
        primer_apellido: primer_apellido,
        segundo_apellido: segundo_apellido,
        parentesco: parentesco,
        id_cat_estatus_emergencia: id_cat_estatus_emergencia,
        id_object:id_object,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Contacto emergencia modificado');
            } else if (data == 'add') {
                mensajeExito('Contacto emergencia agregado');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_contacto_emergencia").modal("hide");
            iniciarEmergencia();
        }
    );
}

function eliminarEmergencia(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/ContactoEmergenciaC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Contacto emergencia eliminado')
                } else {
                    mensajeError(data);
                }
                iniciarEmergencia();
            }
        );
    }
    });
}

function buscarEmergencia(){ //BUSQUEDA
    let buscar = document.getElementById("buscarEmergencia").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarEmergencia();
    } else {
        iniciarTablaEmergenciaByBusqueda(buscar,id_tbl_empleados_hraes);
    }
}


function iniciarTablaEmergenciaByBusqueda(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/ContactoEmergencia/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            console.log(data);
            $('#modulo_contacto_emergencia').html(data);
        }
    });
}