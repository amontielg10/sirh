//MESSAGE ERROR
function messajeError(text) {
    return Swal.fire({
        icon: "error",
        title: "Ocurrio Algo",
        text: text
    });
}