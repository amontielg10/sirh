<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Descargar Archivo Excel</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <button id="descargarExcel">Descargar Excel</button>

    <script>
    $(document).ready(function() {
        $('#descargarExcel').click(function() {
            // Realizar una solicitud AJAX
            $.ajax({
                url: 'generar_excel.php', // Ruta a tu script PHP que genera el Excel
                method: 'POST', // Método HTTP GET o POST según tu configuración
                xhrFields: {
                    responseType: 'blob' // Configura la respuesta esperada como un blob (archivo binario)
                },
                success: function(data) {
                    // Manejar la respuesta exitosa
                    var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    var url = window.URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'archivo_excel.xlsx'; // Nombre del archivo que se descargará
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                },
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    console.error('Error al descargar el archivo: ' + error);
                }
            });
        });
    });
    </script>
</body>
</html>