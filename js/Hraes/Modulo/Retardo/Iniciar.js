var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;
var campoFecha = document.getElementById("campoFecha");

function iniciarRetardo(){
    iniciarTablaRetardo(id_tbl_empleados_hraes);
}

function iniciarTablaRetardo(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Retardo/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#tabla_retardo').html(data);
        }
    });
}


function agregarEditarRetardo(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_retardo");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_retardo").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/RetardoC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var entity = jsonData.response;  

            $("#fecha_retardo").val(entity.fecha);
            $("#hora_entrada").val(concatHora(entity.hora_entrada,entity.minuto_entrada));
            $("#hora_salida").val(concatHora(entity.hora_salida,entity.minuto_salida));
        }
    );

    $("#agregar_editar_retardo").modal("show");
}

function salirAgregarEditarRetardo(){
    $("#agregar_editar_retardo").modal("hide");
}


function guardarRetardo() {
    let fecha_retardo = $("#fecha_retardo").val();
    let hora_entrada = $("#hora_entrada").val();
    let hora_salida = $("#hora_salida").val();
    let id_object = $("#id_object").val();
    hora_salida = hora_salida  ? hora_salida  : '0:0';

    $.post("../../../../App/Controllers/Hrae/RetardoC/AgregarEditarC.php", {
        id_object: id_object,
        fecha_retardo: fecha_retardo,
        hora_entrada:hora_entrada,
        hora_salida:hora_salida,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Retardo modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Retardo agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_retardo").modal("hide");
            iniciarRetardo();
        }
    );
}

function eliminarRetardo(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/RetardoC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Retardo eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                iniciarRetardo();
            }
        );
    }
    });
}


campoFecha.addEventListener("change", function() {
    let fecha = campoFecha.value;
    iniciarTabla(fecha, id_tbl_empleados_hraes)
});

function iniciarTabla(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Retardo/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            console.log(data);
            $('#tabla_retardo').html(data);
        }
    });
}


function concatHora(hora,minuto){
    let horaFinal = "";
    if (hora != null){
        horaFinal = addCero(hora) + ':' + addCero(minuto);
    }
    return horaFinal;
}

function addCero(time){
    if (time < 10){
        time = '0' + time;
    }
    return time;
}