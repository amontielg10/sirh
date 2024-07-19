<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tooltip en Botón de Bootstrap</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- jQuery (necesario para Bootstrap tooltips) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  
  <!-- Bootstrap JS (necesario para Bootstrap tooltips) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <!-- Botón con Tooltip -->
    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Este es un tooltip">
      Botón con Tooltip
    </button>
  </div>

  <!-- Script para inicializar los tooltips -->
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>