
//La funcion permite eli
function eliminarUsuario(id_usuario) {
    const data = {
        idUsuario: id_usuario 
    };
    $.post('php/usuario/eliminarUsuario.php', data, function(response) {
        if (response) {
            console.log("exito");
            location.reload();
            //message("Eliminado");
        } else {
            console.log(response);
        }
    });      
}

    function message(text) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: text
        });
    }


