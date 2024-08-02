<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con Columna Ancha</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para aumentar el ancho de una columna específica */
        .col-wide {
            width: 1000px; /* Ajusta el ancho de la columna como desees */
        }
        .table-fixed {
            table-layout: fixed; /* Asegura que la tabla respete el ancho de las columnas */
            width: 100%; /* Asegura que la tabla ocupe el 100% del contenedor */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped table-fixed">
                <thead>
                    <tr>
                        <th class="col-wide">Header 1</th>
                        <th class="col-wide">Header 2</th> <!-- Columna con ancho aumentado -->
                        <th class="col-wide">Header 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Col 1</td>
                        <td class="col-wide">Row 1 Col 2</td> <!-- Celdas con ancho aumentado -->
                        <td class="col-wide">Row 1 Col 3</td>
                    </tr>
                    <tr>
                        <td class="col-wide">Row 2 Col 1</td>
                        <td class="col-wide">Row 2 Col 2</td>
                        <td class="col-wide">Row 2 Col 3</td>
                    </tr>
                    <!-- Más filas -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>