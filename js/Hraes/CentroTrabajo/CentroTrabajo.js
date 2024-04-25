$(document).ready(function () {
    iniciarTabla();
});


function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Hraes/CentroTrabajo/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function iniciarBusqueda(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/CentroTrabajo/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarInBd(){ //BUSQUEDA
    let buscar = document.getElementById("buscar").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarTabla();
    } else {
        iniciarBusqueda(buscar);
    }
}

function agregarEditarDetalles(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/CentroTrabajoC/DetallesC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entidad = jsonData.entidad;
            var entity = jsonData.response; //Se agrega a emtidad 
            var region = jsonData.region;
            var estatus = jsonData.estatus;

            //Catalogos
            $('#id_cat_entidad').empty();
            $('#id_cat_region').empty();
            $('#id_estatus_centro').empty();
            $('#id_cat_entidad').html(entidad); 
            $('#id_cat_region').html(region); 
            $('#id_estatus_centro').html(estatus); 

            $("#nombre").val(entity.nombre);
            $("#clave_centro_trabajo").val(entity.clave_centro_trabajo);
            $("#colonia").val(entity.colonia);
            $("#codigo_postal").val(entity.codigo_postal);
            $("#num_exterior").val(entity.num_exterior);
            $("#num_interior").val(entity.num_interior);
            $("#latitud").val(entity.latitud);
            $("#longitud").val(entity.longitud);
        }
    );

    $("#agregar_editar_modal").modal("show");
}

function agregarEditarByDb() {
    var id_cat_entidad = $("#id_cat_entidad").val();
    var id_cat_region = $("#id_cat_region").val();
    var id_estatus_centro = $("#id_estatus_centro").val();
    var nombre = $("#nombre").val();
    var clave_centro_trabajo = $("#clave_centro_trabajo").val();
    var colonia = $("#colonia").val();
    var codigo_postal = $("#codigo_postal").val();
    var num_exterior = $("#num_exterior").val();
    var num_interior = $("#num_interior").val();
    var latitud = $("#latitud").val();
    var longitud = $("#longitud").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/CentroTrabajoC/AgregarEditarC.php", {
        id_object: id_object,
        id_cat_entidad: id_cat_entidad,
        id_cat_region:id_cat_region,
        id_estatus_centro:id_estatus_centro,
        nombre:nombre,
        clave_centro_trabajo:clave_centro_trabajo,
        colonia:colonia,
        codigo_postal:codigo_postal,
        num_exterior:num_exterior,
        num_interior:num_interior,
        latitud:latitud,
        longitud:longitud,

    },
        function (data, status) {
            console.log(data);
            if (data == 'edit'){
                mensanjeExito('Centro de trabajo modificado');
            } else if (data == 'add') {
                mensanjeExito('Centro de trabajo agregado');  
            } else {
                mensanjeError(data);
            }
            $("#agregar_editar_modal").modal("hide");
            iniciarTabla();
        }
    );
}

function eliminarEntity(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/CentroTrabajoC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensanjeExito('Centro de trabajo eliminado')
                } else {
                    mensanjeError('No fue posible eliminar el elemento');
                }
                iniciarTabla();
            }
        );
    }
    });
}