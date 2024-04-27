$(document).ready(function () {
    iniciarTabla();
});


function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Hraes/Empleados/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function iniciarBusqueda(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Empleados/tabla.php',
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
    var titulo = document.getElementById("titulo");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
        titulo.textContent = 'Agregar';
    }

    $.post("../../../../App/Controllers/Hrae/EmpleadoC/DetallesC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 

            //Empleado
            $("#nombre").val(entity.nombre);
            $("#rfc").val(entity.rfc);
            $("#primer_apellido").val(entity.primer_apellido);
            $("#curp").val(entity.curp);
            $("#segundo_apellido").val(entity.segundo_apellido);
            $("#nss").val(entity.nss);
        }
    );

    $("#agregar_editar_modal").modal("show");
}


function agregarEditarByDb() {
    var nombre = $("#nombre").val();
    var rfc = $("#rfc").val();
    var primer_apellido = $("#primer_apellido").val();
    var curp = $("#curp").val();
    var segundo_apellido = $("#segundo_apellido").val();
    var nss = $("#nss").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/EmpleadoC/AgregarEditarC.php", {
        id_object: id_object,
        nombre: nombre,
        rfc:rfc,
        primer_apellido:primer_apellido,
        curp:curp,
        segundo_apellido:segundo_apellido,
        nss:nss,
    },
        function (data, status) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Empleado modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Empleado agregado con éxito');  
            } else {
                mensajeError(data);
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
        $.post("../../../../App/Controllers/Hrae/EmpleadoC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Empleado eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                iniciarTabla();
            }
        );
    }
    });
}