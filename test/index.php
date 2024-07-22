<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Grid Example with Spacing</title>
  <!-- Incluir Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <style>
    /* Estilos adicionales si es necesario */
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <!-- Columna 1: más grande en dispositivos grandes (lg) -->
      <div class="col-lg-8 col-sm-4 mb-4">
        <div class="bg-primary text-white p-3">
          Contenido de la columna 1
        </div>
      </div>
      <!-- Columna 2: más grande en dispositivos pequeños (sm) -->
      <div class="col-lg-4 col-sm-8 mb-4">
        <div class="bg-secondary text-white p-3">
          Contenido de la columna 2
        </div>
      </div>
    </div>
  </div>

  <!-- Incluir Bootstrap JS y dependencias opcionales al final del documento para mejorar la velocidad de carga -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>