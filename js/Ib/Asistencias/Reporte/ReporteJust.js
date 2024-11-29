function getReporteJustificaciones() {
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
            fadeIn(); // Muestra un spinner o efecto visual mientras se procesa
            $.ajax({
                url: "../../../../App/Controllers/Central/FaltaC/ReporteC.php",
                type: 'POST',
                xhrFields: {
                    responseType: 'blob' // Configura la respuesta esperada como archivo binario
                },
                success: function (data) {
                    console.log("Respuesta recibida correctamente. Procesando archivo...");
                    if (data.size > 0) {
                        // Crear un objeto blob y generar la descarga
                        const blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'REPORTE_FALTAS_JUSTIFICADAS.xlsx'; // Nombre del archivo
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url); // Liberar el objeto URL
                        document.body.removeChild(a);
                        notyf.success('El reporte se descargó correctamente.');
                    } else {
                        notyf.error('El archivo recibido está vacío.');
                    }
                    fadeOut(); // Oculta el spinner o efecto visual
                },
                error: function (xhr, status, error) {
                    console.error("Error al ejecutar la solicitud AJAX:", error);
                    console.error("Detalles de la respuesta:", xhr.responseText);
                    notyf.error('Ocurrió un error al generar el reporte.');
                    fadeOut(); // Oculta el spinner
                }
            });
        }
    });
}
