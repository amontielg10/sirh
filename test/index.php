<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alerta con línea vertical</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .custom-alert {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-left: 3px solid #007bff; /* Cambia el color de la línea vertical */
      border-radius: 5px;
      padding: 15px;
      margin: 20px;
    }

    .custom-alert p {
      margin-bottom: 0;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <div class="custom-alert">
    <div class="d-flex align-items-center">
      <div class="mr-3" style="border-right: 2px solid #007bff;"></div> <!-- Línea vertical -->
      <p>Haz clic en el icono para cargar archivos.</p>
    </div>
  </div>
</div>

</body>
</html>
