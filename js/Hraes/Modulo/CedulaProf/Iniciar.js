var id_tbl_empleados_hraes = document.getElementById('id_tbl_empleados_hraes').value;

function iniciarCedulaProf(){
    iniciarTablaCedula(id_tbl_empleados_hraes);
}

function iniciarTablaCedula(id_tbl_empleados_hraes) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Modulo/CedulaProf/tabla.php',
        data: { id_tbl_empleados_hraes: id_tbl_empleados_hraes },
        success: function (data) {
            $('#tabla_cedula').html(data);
        }
    });
}


function agregarEditarCedula(id_object){
    $("#id_object").val(id_object);
    let titulo = document.getElementById("tituloCedula");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        titulo.textContent = 'Agregar';
        $("#agregar_editar_cedula").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/CedulaC/DetallesC.php", {
        id_object: id_object
    },
        function (data) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 

            $("#cedula_profesional").val(entity.cedula_profesional);
        }
    );

    $("#agregar_editar_cedula").modal("show");
}

function salirAgregarEditarCedula(){
    $("#agregar_editar_cedula").modal("hide");
}


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
