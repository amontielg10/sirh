<script>
    let setTimeOut = 600000; // 10'' 600000
    let setTimeOutIn = 180000; // 3''' 180000

    setTimeout(function () {
        Swal.bindClickHandler();
        /* Bind a mixin to a click handler */
        Swal.fire({
            title: "La sesi\u00f3n esta por terminar.",
            text: "Para seguir utilizando el sistema, pulse regresar.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Salir",
            cancelButtonText: "Cancelar",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'cerrar-sesion.php';
            } else {
                location.reload()
            }
        }),
            ///ON FUNCTIN TIME - EXIT
            setTimeout(function () {
                window.location.href = 'cerrar-sesion.php';
            }, setTimeOutIn);
    }, setTimeOut);
</script>