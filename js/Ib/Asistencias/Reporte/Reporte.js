
function getReporteAsistencia() {
    Swal.fire({
        title: "Generador de reportes",
        text: "Su reporte de faltas se generará. Haga clic en 'Confirmar' para continuar",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#235B4E",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Continuar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            fadeIn();
            $.ajax({
                url: "../../../../App/Controllers/Central/AsistenciaC/ReporteC.php",
                type: 'POST',
                xhrFields: {
                    responseType: 'blob' // Configura la respuesta esperada como un blob (archivo binario)
                },
                success: function (data) {
                    if (data.size > 0) {
                        var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'REPORTE_FALTAS.xlsx'; // Nombre del archivo que se descargará
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);
                        notyf.success('El proceso se llevó a cabo con éxito');
                    } else {
                        notyf.error('Error al ejecutar la acción');
                    }
                    fadeOut();
                },
                error: function (xhr, status, error) {
                    notyf.error('Error al ejecutar la acción');
                    fadeOut();
                }
            });
        }
    });
}