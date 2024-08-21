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

    $.post("../../../../App/Controllers/Central/AsistenciaC/DetallesConf.php", {
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
    $("#is_modal_config_asistencia").modal("show");
}

function ocultarModalConfigAsistencia(){
    $("#is_modal_config_asistencia").modal("hide");
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