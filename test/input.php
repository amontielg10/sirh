<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar Tamaño de Letra con Bootstrap</title>
  <!-- Incluye el CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .table-small-rows tbody tr td {
      padding: 0.25rem; /* Ajusta este valor según tus necesidades */
    }
    .table-large-rows tbody tr td {
      padding: 1.5rem; /* Ajusta este valor según tus necesidades */
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2>Tabla con Filas Pequeñas</h2>
    <table class="table table-small-rows">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo Electrónico</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Juan</td>
          <td>Pérez</td>
          <td>juan.perez@example.com</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ana</td>
          <td>García</td>
          <td>ana.garcia@example.com</td>
        </tr>
      </tbody>
    </table>

    <h2>Tabla con Filas Grandes</h2>
    <table class="table table-large-rows">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo Electrónico</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Juan</td>
          <td>Pérez</td>
          <td>juan.perez@example.com</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Ana</td>
          <td>García</td>
          <td>ana.garcia@example.com</td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- Incluye el JS de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>