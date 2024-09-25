
function getUser(value) {
    let nombre_usuario_accion = document.getElementById("nombre_usuario_accion");
    nombre_usuario_accion.textContent = ' -';

    if (typeof value !== 'undefined') {
        $.post("../../../../App/Controllers/Central/AsistenciaC/UsuariosC.php", {
            id: value,
        },
            function (data) {
                nombre_usuario_accion.textContent = data;
            }
        );
    }
    $("#mostrar_usuario").modal("show");
}


function ocultarModalUsuario() {
    $("#mostrar_usuario").modal("hide");
}
