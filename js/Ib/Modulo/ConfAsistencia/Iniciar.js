var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;
var mensajeSalida = 'Se produjo un error al ejecutar la acción';


function iniciarConfAsistencia(){

    let noDispositivo_ = document.getElementById("noDispositivo_");
    let ubicacion_ = document.getElementById("ubicacion_");
    let estatus_ = document.getElementById("estatus_");
    let observaciones_ = document.getElementById("observaciones_");
    let turno_ = document.getElementById("turno_");
    let horario_ = document.getElementById("horario_");
    let jornada_ass = document.getElementById("jornada_ass");

    $.post("../../../../App/Controllers/Central/AsistenciaConfC/DetallesConf.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes
    },
        function (data) {
            let jsonData = JSON.parse(data);

            noDispositivo_.textContent = jsonData.noDispositivo_;
            ubicacion_.textContent = jsonData.ubicacion_;
            estatus_.textContent = jsonData.estatus_;
            observaciones_.textContent = jsonData.observaciones_;
            turno_.textContent = jsonData.turno_;
            horario_.textContent = jsonData.horario_;
            jornada_ass.textContent = jsonData.jornada_ass;
            }
    );
}

function mostrarModalConfigAsistencia(){

    $("#is_modal_config_asistencia").find("input,textarea,select").val("");

    $.post("../../../../App/Controllers/Central/AsistenciaConfC/DetallesC.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes
    },
        function (data) {
            let jsonData = JSON.parse(data);

            $("#no_dispositivo_ass").val(jsonData.no_dispositivo_ass);
            $("#observaciones_ass").val(jsonData.observaciones_ass);
            $("#id_ctrl_jornada").val(jsonData.id_ctrl_jornada);
            $("#id_ctrl_asistencia_info").val(jsonData.id_ctrl_asistencia_info);

            $('#id_cat_asistencia_ubicacion').html(jsonData.id_cat_asistencia_ubicacion); 
            $('#id_cat_asistencia_estatus').html(jsonData.id_cat_asistencia_estatus);
            $('#id_cat_jornada_turno').html(jsonData.id_cat_jornada_turno);
            $('#id_cat_jornada_dias').html(jsonData.id_cat_jornada_dias);
            $('#id_cat_jornada_horario').html(jsonData.id_cat_jornada_horario);
            $('#id_cat_asistencia_ubicacion').selectpicker('refresh');
            $('#id_cat_jornada_turno').selectpicker('refresh');
            $('#id_cat_jornada_dias').selectpicker('refresh');
            $('#id_cat_jornada_horario').selectpicker('refresh');
            $('#id_cat_asistencia_estatus').selectpicker('refresh');
            $('.selectpicker').selectpicker();

            }
    );

    $("#is_modal_config_asistencia").modal("show");
}

function ocultarModalConfigAsistencia(){
    $("#is_modal_config_asistencia").modal("hide");
}


function agregarActualizarAsistencia(){

    $.post("../../../../App/Controllers/Central/AsistenciaConfC/AgregarEditarC.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes,
        no_dispositivo: $("#no_dispositivo_ass").val(),
        id_cat_asistencia_estatus: $("#id_cat_asistencia_estatus").val(),
        id_cat_jornada_turno: $("#id_cat_jornada_turno").val(),
        id_cat_jornada_dias: $("#id_cat_jornada_dias").val(),
        id_cat_jornada_horario: $("#id_cat_jornada_horario").val(),
        id_cat_asistencia_ubicacion: $("#id_cat_asistencia_ubicacion").val(),
        observaciones: $("#observaciones_ass").val(),
        id_ctrl_jornada: $("#id_ctrl_jornada").val(),
        id_ctrl_asistencia_info: $("#id_ctrl_asistencia_info").val(),
    },
        function (data) {
            if (data){
                notyf.success('Información actualizada con éxito'); 
            } else {
                notyf.error(mensajeSalida);
            }
            ocultarModalConfigAsistencia();
            iniciarConfAsistencia();
            }
    );

}


/*
function iniciarAdicional(){
    detallesAdicional(id_tbl_empleados_hraes);
}

function detallesAdicional(id_object){
    $.post("../../../../App/Controllers/Central/AdicionalC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let entity = jsonData.response; 
            
            $("#fecha_expedicion").val(entity.fecha_expedicion);
            $("#fecha_ingreso_gob_fed").val(entity.fecha_ingreso_gob_fed);
            $("#vigencia_del").val(entity.vigencia_del);
            $("#vigencia_al").val(entity.vigencia_al);
            $("#funciones").val(entity.funciones);
            $("#antiguedad").val(entity.antiguedad);
            $("#id_ctrl_adic_emp_hraes").val(entity.id_ctrl_adic_emp_hraes);
        }
    );
}


function gurdarAdicionals() {
    $.post("../../../../App/Controllers/Central/AdicionalC/AgregarEditarC.php", {
        fecha_expedicion: $("#fecha_expedicion").val(),
        fecha_ingreso_gob_fed: $("#fecha_ingreso_gob_fed").val(),
        vigencia_del: $("#vigencia_del").val(),
        vigencia_al: $("#vigencia_al").val(),
        funciones: $("#funciones").val(),
        antiguedad: $("#antiguedad").val(),
        id_ctrl_adic_emp_hraes: $("#id_ctrl_adic_emp_hraes").val(),
        id_tbl_empleados_hraes: id_tbl_empleados_hraes,
    },
        function (data) {
            if (data == 'edit'){
                notyf.success('Información adicional modificada con éxito');
            } else if (data == 'add') {
                notyf.success('Información adicional agregada con éxito');  
            } else {
                notyf.error(mensajeSalida);
            }
            iniciarAdicional();
        }
    );
}
*/