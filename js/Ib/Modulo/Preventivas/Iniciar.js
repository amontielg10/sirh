function buscarPreventivas() { //BUSQUEDA
    let buscarNew = clearElement(buscar_pv);
    let buscarlenth = lengthValue(buscarNew);

    if (buscarlenth == 0) {
        iniciarTabla_pv(null, iniciarBusqueda_pv(), id_tbl_empleados_hraes);
    } else {
        iniciarTabla_pv(buscarNew, iniciarBusqueda_pv(), id_tbl_empleados_hraes);
    }
}

function iniciarTabla_pv(busqueda, paginador, id_tbl_empleados_hraes) {
    $.post('../../../../App/View/Central/Modulo/Preventivas/tabla.php', {
        busqueda: busqueda,
        paginador: paginador,
        id_tbl_empleados_hraes: id_tbl_empleados_hraes
    },
        function (data) {
            $("#tabla_preventivas").html(data);
        }
    );
}

function agregarEditarPreventiva(id_object) {
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_preventiva");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null) {
        titulo.textContent = 'Agregar';
        $("#agregar_editar_incidencia").find("input,textarea,select").val("");
        $("#agregar_editar_incidencia").find("input[type=checkbox], input[type=radio]").prop("checked", false);
    }

    $.post("../../../../App/Controllers/Central/IncidenciasC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            console.log(data);

            let jsonData = JSON.parse(data);
            let response = jsonData.response;

            //proceso de mostrar u ocultar contenido de calendarios para el periodo de vacaciones
            checkbox_disabled.disabled = false;
            ocultarContenido('ocultar_contenido_vacaciones');
            if (response.id_cat_incidencias == dias_cuenta_vacaciones ||
                response.id_cat_incidencias == vacaciones_extraordinarias ||
                response.id_cat_incidencias == vacaciones_ordinarias) {
                if (response.es_mas_de_un_dia !== 't') {
                    checkbox_disabled.disabled = true;
                    es_mas_de_un_dia.checked = false;
                } else {
                    es_mas_de_un_dia.checked = true;
                }
                // es_mas_de_un_dia.checked = true;
                mostrarContenido('ocultar_contenido_vacaciones');
            }

            $("#fecha_inicio_ins").val(response.fecha_inicio);
            $("#fecha_fin_ins").val(response.fecha_fin);
            $("#observaciones_ins").val(response.observaciones);
            $("#fecha_captura_ins").val(response.fecha_captura);
            $("#hora_ins").val(response.hora);

            $("#is_peridodo_ins").val(jsonData.periodo);
            $("#is_dias_seleccionados").val(jsonData.diasSeleccionados);
            $("#is_dias_restantes").val(jsonData.diasRestantes);

            $("#id_cat_incidencias_ins").html(jsonData.catIncidencias);

            $('#id_cat_incidencias_ins').selectpicker('refresh');
            $('.selectpicker').selectpicker();

        }
    );
    $("#agregar_editar_preventiva").modal("show");
}

function salirAgregarEditarPreventiva() {
    $("#agregar_editar_preventiva").modal("hide");
}

//accion para guardar la informacion de incidencias
function guardarIncidencia() {

    let checkbox_value = document.getElementById('es_mas_de_un_dia');
    checkbox_value = checkbox_value.checked ? true : false;

    $.post("../../../../App/Controllers/Central/IncidenciasC/AgregarEditarC.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes,
        es_mas_de_un_dia: checkbox_value,
        fecha_inicio: $("#fecha_inicio_ins").val(),
        fecha_fin: $("#fecha_fin_ins").val(),
        fecha_captura: $("#fecha_captura_ins").val(),
        hora: $("#hora_ins").val(),
        observaciones: $("#observaciones_ins").val(),
        id_cat_incidencias: $("#id_cat_incidencias_ins").val(),
        id_object: $("#id_object").val(),
    },
        function (data) {
            if (data == 'edit') {
                notyf.success('Incidencia modificada con éxito');
            } else if (data == 'add') {
                notyf.success('Incidencia agregada con éxito');
            } else {
                notyf.error(mensajeSalida);
            }
            $("#agregar_editar_incidencia").modal("hide");
            buscarPreventivas();
        }
    );
}

function eliminarIncidecia(id_object) {//ELIMINAR USUARIO
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
            $.post("../../../../App/Controllers/Central/IncidenciasC/EliminarC.php", {
                id_object: id_object
            },
                function (data) {
                    if (data == 'delete') {
                        notyf.success('Incidencia eliminada con éxito')
                    } else {
                        notyf.error(mensajeSalida);
                    }
                    buscarPreventivas();
                }
            );
        }
    });
}


function obtenerUsuario(id) {
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

function mostrarModalUsuario() {
    $("#mostrar_usuario").modal("show");
}

function ocultarModalUsuario() {
    $("#mostrar_usuario").modal("hide");
}