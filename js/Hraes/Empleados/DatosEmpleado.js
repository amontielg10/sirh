
function datosEmpleadosGetDetails(id_object){
    $.post("../../../../App/Controllers/Hrae/DatosEmpleadoC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);
            var entity = jsonData.response; 
            var genero = jsonData.genero;
            var estadoCivil = jsonData.estadoCivil;

            $('#id_cat_genero_hraes').empty();
            $('#id_cat_genero_hraes').html(genero); 
            $('#id_cat_estado_civil_hraes').empty();
            $('#id_cat_estado_civil_hraes').html(estadoCivil);

            $("#id_tbl_datos_empleado_hraes").val(entity.id_tbl_datos_empleado_hraes);
            $("#pais_nacimiento").val(entity.pais_nacimiento);
            $("#id_tbl_empleados_hraes").val(id_object);
        }
    );
    $("#Datos-empleado-modal").modal("show");
}

function agregarEditarByDbDarosEmpleado() {
    var id_cat_genero_hraes = $("#id_cat_genero_hraes").val();
    var id_cat_estado_civil_hraes = $("#id_cat_estado_civil_hraes").val();
    var id_tbl_empleados_hraes = $("#id_tbl_empleados_hraes").val();
    var pais_nacimiento = $("#pais_nacimiento").val();
    var id_tbl_datos_empleado_hraes = $("#id_tbl_datos_empleado_hraes").val();

    $.post("../../../../App/Controllers/Hrae/DatosEmpleadoC/AgregarEditarC.php", {
        id_cat_genero_hraes: id_cat_genero_hraes,
        id_cat_estado_civil_hraes: id_cat_estado_civil_hraes,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
        pais_nacimiento:pais_nacimiento,
        id_tbl_datos_empleado_hraes:id_tbl_datos_empleado_hraes,
    },
        function (data) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Información modificada con éxito');
            } else if (data == 'add') {
                mensajeExito('Información modificada con éxito');  
            } else {
                mensajeError(data);
            }
            $("#Datos-empleado-modal").modal("hide");
            iniciarTabla();
        }
    );
}

