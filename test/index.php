<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tooltip en un div con Bootstrap</title>

  <!-- Incluir Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
  <!-- Estilos adicionales (opcional) -->
  <style>
    .tooltip-inner {
      background-color: #28a745;
      /* Color de fondo del tooltip */
      color: #fff;
      /* Color del texto del tooltip */
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <h2>Tooltip en un div con Bootstrap</h2>
    <div class="position-relative">
      <div class="bg-info p-3" data-toggle="tooltip" title="¡Este es un tooltip!">
        Pasa el ratón aquí
      </div>
    </div>
  </div>

  <!-- Incluir Bootstrap JS y Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Inicializar tooltips -->
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>