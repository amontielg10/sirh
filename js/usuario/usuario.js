    //Mensaje

    function messajeInfo() {
        let ma = document.getElementById("ma").value; //Variable de agregar
        let me = document.getElementById("me").value; //Variable de eliminar
        let ms = document.getElementById("ms").value; //Variable de modificar
        console.log(ma);
        if (ma) {
            message("Usuario Agregado");
        } else if (me) {
            message("Usuario Eliminado");
        } else if (ms) {
            message("Usuario Modificado");
        }
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


