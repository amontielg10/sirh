<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Botón con Sombra en Bootstrap</title>
  <!-- Incluye los archivos CSS de Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Incluye FontAwesome para los iconos -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    .btn-with-stronger-shadow {
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2), 0 3px 7px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <button type="button" class="btn btn-primary btn-with-stronger-shadow">Botón con Sombra Aumentada</button>
</div>

<!-- Incluye los archivos JS de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>