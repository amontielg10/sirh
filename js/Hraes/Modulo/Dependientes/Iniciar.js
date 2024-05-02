var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarDependiente(){
    iniciarTablaDependiente(id_tbl_empleados_hraes);
}

function iniciarTablaDependiente(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Dependientes/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#modulo_dependientes_economicos').html(data);
        }
    });
}


function agregarEditarDependiente(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("titulo_dependiete");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_dependiente").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/DependientesC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            console.log(data);
            var jsonData = JSON.parse(data);
            var entity = jsonData.response; 
            var dependiente = jsonData.dependiente; 

            $('#id_cat_dependientes_economicos_d').empty();
            $('#id_cat_dependientes_economicos_d').html(dependiente); 

            $("#nombre_d").val(entity.nombre);
            $("#curp_d").val(entity.curp);
            $("#apellido_paterno_d").val(entity.apellido_paterno);
            $("#id_cat_dependientes_economicos_d").val(entity.id_cat_dependientes_economicos);
            $("#apellido_materno_d").val(entity.apellido_materno);
        }
    );

    $("#agregar_editar_dependiente").modal("show");
}

function salirAgregarEditarDependiente(){
    $("#agregar_editar_dependiente").modal("hide");
}

/*




function agregarEditarByDbByCedula() {
    let cedula_profesional = $("#cedula_profesional").val();
    let id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/CedulaC/AgregarEditarC.php", {
        id_object: id_object,
        cedula_profesional: cedula_profesional,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes,
    },
        function (data, status) {
            if (data == 'edit'){
                mensajeExito('Cédula profesional modificada');
            } else if (data == 'add') {
                mensajeExito('Cédula profesional agregada');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_cedula").modal("hide");
            iniciarCedulaProf();
        }
    );
}

function eliminarCedula(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/CedulaC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Cédula profesional eliminada')
                } else {
                    mensajeError(data);
                }
                iniciarCedulaProf();
            }
        );
    }
    });
}

function buscarCedula(){ //BUSQUEDA
    let buscar = document.getElementById("buscarCedulaText").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarCedulaProf();
    } else {
        iniciarTablaCedulaByBusqueda(buscar,id_tbl_empleados_hraes);
    }
}


function iniciarTablaCedulaByBusqueda(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/CedulaProf/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            $('#tabla_cedula').html(data);
        }
    });
}
*/