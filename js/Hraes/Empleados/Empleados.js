$(document).ready(function () {
    buscarEmpleado();
});

function buscarEmpleado(){ //BUSQUEDA
    let buscarNew = clearElement(buscar);
    let buscarlenth = lengthValue(buscarNew);
    
    if (buscarlenth == 0){
        iniciarTablaEmpleados(null, iniciarBusqueda());
    } else {
        iniciarTablaEmpleados(buscarNew, iniciarBusqueda());
    }
}

function iniciarTablaEmpleados(busqueda, paginador) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Empleados/tabla.php',
        data: { 
            busqueda: busqueda,
            paginador:paginador 
        },
        success: function (data) {
            $('#tabla_empleados').html(data);
        }
    });
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
        function (data) {
            let jsonData = JSON.parse(data);//se obtiene el json
            let entity = jsonData.response; //Se agrega a emtidad 
            let genero = jsonData.genero;
            let estadoCivil = jsonData.estadoCivil;

            //Empleado
            $('#id_cat_estado_civil').empty();
            $('#id_cat_estado_civil').html(estadoCivil); 
            $('#id_cat_genero').empty();
            $('#id_cat_genero').html(genero); 

            $("#nombre").val(entity.nombre);
            $("#rfc").val(entity.rfc);
            $("#primer_apellido").val(entity.primer_apellido);
            $("#curp").val(entity.curp);
            $("#segundo_apellido").val(entity.segundo_apellido);
            $("#nss").val(entity.nss);
            $("#num_empleado").val(entity.num_empleado);
            $("#pais_nacimiento").val(entity.pais_nacimiento);
        }
    );

    $("#agregar_editar_modal").modal("show");
}


function agregarEditarByDb() {
    let nombre = $("#nombre").val();
    let rfc = $("#rfc").val();
    let primer_apellido = $("#primer_apellido").val();
    let curp = $("#curp").val();
    let segundo_apellido = $("#segundo_apellido").val();
    let nss = $("#nss").val();
    let id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/EmpleadoC/AgregarEditarC.php", {
        id_object: id_object,
        nombre: nombre,
        rfc:rfc,
        primer_apellido:primer_apellido,
        curp:curp,
        segundo_apellido:segundo_apellido,
        nss:nss,
        id_cat_estado_civil:$("#id_cat_estado_civil").val(),
        id_cat_genero:$("#id_cat_genero").val(),
        num_empleado:$("#num_empleado").val(),
        pais_nacimiento:$("#pais_nacimiento").val(),
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Empleado modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Empleado agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_modal").modal("hide");
            buscarEmpleado();
        }
    );
}

function eliminarEntity(id_object) {//ELIMINAR USUARIO
    if(validarAccion()){
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
            function (data) {
                if (data == 'delete'){
                    mensajeExito('Empleado eliminado con éxito')
                } else {
                    mensajeError(data);
                }
                buscarEmpleado();
            }
        );
    }
    });
}
}

function ocultarModal(){
    $("#agregar_editar_modal").modal("hide");
}