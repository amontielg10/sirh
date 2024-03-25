<script>
  let setTimeOut = 600000; // 10'' 600000
  let setTimeOutIn = 180000; // 3''' 180000

  setTimeout(function () {
    Swal.bindClickHandler();
    /* Bind a mixin to a click handler */
    Swal.fire({
      title: "Tu sesi\u00f3n ha expidaro.",
      text: "",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Continuar trabajando",
      cancelButtonText: "Salir",
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        location.reload()
      } else {
        window.location.href = 'cerrar-sesion.php';
      }
    }),
      ///ON FUNCTIN TIME - EXIT
      setTimeout(function () {
        window.location.href = 'cerrar-sesion.php';
      }, setTimeOutIn);
  }, setTimeOut);
</script>