<script>
  let setTimeOut = 600000; // 10'' 600000
  let setTimeOutIn = 180000; // 3''' 180000

  setTimeout(function () {
    Swal.bindClickHandler();
    Swal.fire({
      title: "La sesi\u00f3n ha expidaro.",
      icon: "warning",
      confirmButtonColor: "#9F2241",
      cancelButtonColor: "#d33",
      confirmButtonText: "Salir",
      cancelButtonText: "Salir",
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'cerrar-sesion.php';
      } 
    }),
      ///ON FUNCTIN TIME - EXIT
      setTimeout(function () {
        window.location.href = 'cerrar-sesion.php';
      }, setTimeOutIn);
  }, setTimeOut);
</script>