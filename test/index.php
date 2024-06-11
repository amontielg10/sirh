<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card con Sombra en la Parte Superior</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo para añadir sombra solo en la parte superior */
    .card-top-shadow {
      box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card card-top-shadow">
        <div class="card-body">
          <h5 class="card-title">Card con Sombra en la Parte Superior</h5>
          <p class="card-text">Este es un ejemplo de una card de Bootstrap con una sombra aplicada solo en la parte superior.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
