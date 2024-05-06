$(document).ready(function () {
    iniciarTabla();
});


function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Admin/Usuarios/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}


function agregarEditarUsuarios(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    let titulo = document.getElementById("titulo_usuario");
    titulo.textContent = 'Modificar';
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_usuario").find("input,textarea,select").val("");
        titulo.textContent = 'Agregar';
    }

    $.post("../../../../App/Controllers/Admin/UsuariosC/DetallesC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; 
            var rol = jsonData.rol;

            //Catalogos
            $('#id_rol').empty();
            $('#id_rol').html(rol); 

            $("#password").val("");
            $("#passwordConfirm").val("");

            $("#nick").val(entity.nick);
            $("#nombre").val(entity.nombre);
        }
    );

    $("#agregar_editar_usuario").modal("show");
}



function guardarUsuario() {
    var nick = $("#nick").val();
    var nombre = $("#nombre").val();
    var password = $("#password").val();
    var id_rol = $("#id_rol").val();
    var id_object = $("#id_object").val();

    $.post("../../../../App/Controllers/Admin/UsuariosC/AgregarEditarC.php", {
        id_object: id_object,
        nick: nick,
        nombre:nombre,
        id_rol:id_rol,
        password:password
    },
        function (data, status) {
            console.log(data);
            if (data == 'edit'){
                mensajeExito('Usuario modificado con éxito');
            } else if (data == 'add') {
                mensajeExito('Usuario agregado con éxito');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_usuario").modal("hide");
            iniciarTabla();
        }
    );
}


function eliminarUsuario(id_object) {//ELIMINAR USUARIO
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
        $.post("../../../../App/Controllers/Admin/UsuariosC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Usuario eliminado con éxito');
                } else {
                    mensajeError(data);
                }
                iniciarTabla();
            }
        );
    }
    });
}


function iniciarBusquedaUsuarios(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Admin/Usuarios/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarUsuario(){ //BUSQUEDA
    let buscar = document.getElementById("buscarUsuario").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarTabla();
    } else {
        iniciarBusquedaUsuarios(buscar);
    }
}
/*







*/