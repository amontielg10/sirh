<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Línea Vertical con Bootstrap</title>
  <!-- Enlace a Bootstrap CSS desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .vertical-line {
      border-left: 2px solid black; /* Anchura y color de la línea */
      height: 200px; /* Altura de la línea */
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <div class="col-auto">
        <div class="vertical-line"></div>
      </div>
      <div class="col">
        <h1>Ejemplo de Bootstrap</h1>
        <p>Este es un ejemplo de una línea vertical ajustada en tamaño y ubicada a la izquierda.</p>
      </div>
    </div>
  </div>

  <!-- Incluir los scripts de Bootstrap al final del cuerpo del documento -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>