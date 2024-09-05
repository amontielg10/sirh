var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;
var checkbox_disabled = document.getElementById("checkbox_disabled");

function buscarIncidencia(){ //BUSQUEDA
    console.log('sucess');
    let buscarNew = clearElement(buscar_ins);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTabla_ins(null, iniciarBusqueda_ins(),id_tbl_empleados_hraes);
    } else {
        iniciarTabla_ins(buscarNew, iniciarBusqueda_ins(),id_tbl_empleados_hraes);
    }
}

function iniciarTabla_ins(busqueda, paginador, id_tbl_empleados_hraes) { 
    $.post('../../../../App/View/Central/Modulo/Incidencias/tabla.php', {
        busqueda: busqueda, 
        paginador: paginador, 
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_incidencia").html(data); 
        }
    );
}

function agregarEditarIncidencia(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_asistencia");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_incidencia").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Central/IncidenciasC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            console.log(data);

            let jsonData = JSON.parse(data);

            $("#id_cat_incidencias_ins").html(jsonData.catIncidencias);

            $('#id_cat_incidencias_ins').selectpicker('refresh');
            $('.selectpicker').selectpicker();
            /*
            let jsonData = JSON.parse(data);//se obtiene el json
            let entity = jsonData.response; //Se agrega a emtidad 

            $("#fecha_ss_").val(entity.fecha);
            $("#hora_ss_").val(entity.hora);
            $("#dispositivo_ss").val(entity.dispositivo);
            $("#verificacion_ss").val(entity.verificacion);
            $("#estado_ss").val(entity.estado);
            $("#evento_ss").val(entity.evento);
            */
        }
    );
    $("#agregar_editar_incidencia").modal("show");
}

function salirAgregarEditarIncidencia(){
    $("#agregar_editar_incidencia").modal("hide");
}


function guardarAsistencia() {
    $.post("../../../../App/Controllers/Central/AsistenciaC/AgregarEditarC.php", {
        fecha: $("#fecha_ss_").val(),
        hora: $("#hora_ss_").val(),
        dispositivo: $("#dispositivo_ss").val(),
        verificacion: $("#verificacion_ss").val(),
        estado: $("#estado_ss").val(),
        evento: $("#evento_ss").val(),
        id_object: $("#id_object").val(),
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data) {
            if (data == 'edit'){
                notyf.success('Asistencia modificada con éxito');
            } else if (data == 'add') {
                notyf.success('Asistencia agregada con éxito');  
            } else {
                notyf.error(mensajeSalida);
            }
            $("#agregar_editar_incidencia").modal("hide");
            buscarAsistencia();
        }
    );
}

function eliminarAsistencia(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Central/AsistenciaC/EliminarC.php", {
                id_object: id_object
            },
            function (data) {
                if (data == 'delete'){
                    notyf.success('Asistencia eliminada con éxito')
                } else {
                    notyf.error(mensajeSalida);
                }
                buscarAsistencia();
            }
        );
    }
    });
}


function obtenerUsuario(id){
    buscarAsistencia();
    let nombre_usuario_accion = document.getElementById("nombre_usuario_accion");
    nombre_usuario_accion.textContent = '-';
    if (typeof id !== 'undefined') {
    $.post("../../../../App/Controllers/Central/AsistenciaC/UsuariosC.php", {
        id: id,
    },
        function (data) {
            nombre_usuario_accion.textContent = data;
        }
    );
    }
    mostrarModalUsuario();
}

function mostrarModalUsuario(){
    $("#mostrar_usuario").modal("show");
}

function ocultarModalUsuario(){
    $("#mostrar_usuario").modal("hide");
}