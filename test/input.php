<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página con Imagen de Fondo</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <style>
    .bg-image {
      background-image: url('../assets/sirh/fondo.png');
      /* Ruta de tu imagen de fondo */
      background-size: cover;
      /* Ajusta la imagen al tamaño del contenedor */
      background-position: center;
      /* Centra la imagen */
      height: 100vh;
      /* Tamaño completo de la ventana */
      color: white;
      /* Color del texto para que sea legible en la imagen de fondo */
    }
  </style>
</head>

<body>

  <div class="container-fluid bg-image">
    <!-- Contenido de la página -->
    <h1>¡Hola, Mundo!</h1>
  </div>

  <!-- Enlace al archivo JavaScript de Bootstrap (opcional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>