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

function agregarEditarByDbByDependiente() {
    let nombre = $("#nombre_d").val();
    let curp = $("#curp_d").val();
    let apellido_paterno = $("#apellido_paterno_d").val();
    let apellido_materno = $("#apellido_materno_d").val();
    let id_cat_dependientes_economicos = $("#id_cat_dependientes_economicos_d").val();
    let id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Hrae/DependientesC/AgregarEditarC.php", {
        id_object: id_object,
        nombre: nombre,
        curp:curp,
        apellido_paterno:apellido_paterno,
        apellido_materno:apellido_materno,
        id_cat_dependientes_economicos:id_cat_dependientes_economicos,
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            if (data == 'edit'){
                mensajeExito('Dependiente económico modificado');
            } else if (data == 'add') {
                mensajeExito('Dependiente económico modificado');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_dependiente").modal("hide");
            iniciarDependiente();
        }
    );
}

function eliminarDependiente(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Hrae/DependientesC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Dependiente económico eliminado')
                } else {
                    mensajeError(data);
                }
                iniciarDependiente();
            }
        );
    }
    });
}


function buscarDependiente(){ //BUSQUEDA
    let buscar = document.getElementById("buscarDependiente").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarDependiente();
    } else {
        iniciarTablaCedulaByDependiente(buscar,id_tbl_empleados_hraes);
    }
}


function iniciarTablaCedulaByDependiente(buscar, id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/Dependientes/tabla.php',
        data: { 
            buscar: buscar,
            id_tbl_empleados_hraes: id_tbl_empleados_hraes,
         },
        success: function (data) {
            $('#modulo_dependientes_economicos').html(data);
        }
    });
}