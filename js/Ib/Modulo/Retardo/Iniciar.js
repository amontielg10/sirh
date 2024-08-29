var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;


/*
campoFecha.addEventListener("change", function() {
    let fecha = campoFecha.value;
    iniciarTabla_re(fecha, iniciarBusqueda_re(),id_tbl_empleados_hraes);
});
*/

function buscarRetardo(){ //BUSQUEDA
    let buscarNew = clearElement(buscar_re);
    let buscarlenth = lengthValue(buscarNew);
    if (buscarlenth == 0){
        iniciarTabla_re(null, iniciarBusqueda_re(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_re(buscarNew, iniciarBusqueda_re(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_re(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Central/Modulo/Retardo/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_retardo").html(data); 
        }
    );
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

    $.post("../../../../App/Controllers/Central/RetardoC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            console.log(data);
            let jsonData = JSON.parse(data);
            let entity = jsonData.response;  

            $("#id_cat_quincenas").val(entity.id_cat_quincenas);
            $("#fecha_rr").val(entity.fecha);
            $("#hora_ss").val(entity.hora);
            $("#observaciones_rr").val(entity.observaciones);

            $("#quincena_rr").val(jsonData.quincena);
            $("#periodo_quincena_rr").val(jsonData.periodoQuincena);

            $('#id_cat_retardo_tipo').html(jsonData.catRetardoTipo); 
            $('#id_cat_retardo_tipo').selectpicker('refresh');
            $('#id_cat_retardo_estatus').html(jsonData.catRetardoEstatus); 
            $('#id_cat_retardo_estatus').selectpicker('refresh');
            $('.selectpicker').selectpicker();
        }
    );

    $("#agregar_editar_retardo").modal("show");
}

function salirAgregarEditarRetardo_(){
    $("#agregar_editar_retardo").modal("hide");
}


function guardarRetardoX() {
    let fecha_retardo = $("#fecha_retardo").val();
    let hora_entrada = $("#hora_entrada").val();
    let hora_salida = $("#hora_salida").val();
    let id_object = $("#id_object").val();
    hora_salida = hora_salida  ? hora_salida  : '0:0';

    $.post("../../../../App/Controllers/Central/RetardoC/AgregarEditarC.php", {
        id_object: id_object,
        fecha_retardo: fecha_retardo,
        hora_entrada:hora_entrada,
        hora_salida:hora_salida,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                notyf.success('Retardo modificado con éxito');
            } else if (data == 'add') {
                notyf.success('Retardo agregado con éxito');  
            } else {
                notyf.error(mensajeSalida);
            }
            $("#agregar_editar_retardo").modal("hide");
            buscarRetardo();
        }
    );
}

function eliminarRetardo_(id_object) {//ELIMINAR USUARIO
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#235B4E",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Central/RetardoC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    notyf.success('Retardo eliminado con éxito')
                } else {
                    notyf.error(mensajeSalida);
                }
                buscarRetardo();
            }
        );
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
/*
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



*/