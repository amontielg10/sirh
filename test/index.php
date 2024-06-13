<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personalizar un select con Bootstrap y CSS</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .custom-select-wrapper {
      position: relative;
      width: 200px;
      border-bottom: 2px solid green; /* Línea inferior verde */
      margin-bottom: 15px;
    }

    .custom-select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      border: none;
      background-color: transparent;
      width: 100%;
      cursor: pointer;
    }

    .custom-select:focus {
      outline: none; /* Eliminar el contorno al enfocar el select */
    }

    .custom-select-icon {
      position: absolute;
      right: 0;
      bottom: 0;
      width: 30px;
      height: 30px;
      pointer-events: none;
      background: url('https://cdn-icons-png.flaticon.com/512/13/13718.png') no-repeat center;
      background-size: 70%;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="custom-select-wrapper">
        <select class="custom-select">
          <option value="1">Opción 1</option>
          <option value="2">Opción 2</option>
          <option value="3">Opción 3</option>
          <option value="4">Opción 4</option>
        </select>
        <div class="custom-select-icon"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
