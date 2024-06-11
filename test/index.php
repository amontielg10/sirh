<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Botón Circular con Icono de Google</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    .boton-circular {
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 60px;
      height: 60px;
      background-color: #4285F4;
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 24px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .boton-circular:hover {
      background-color: #3c78dc;
    }

    .material-icons {
      font-size: inherit;
    }
  </style>
</head>
<body>
  <button class="boton-circular">
    <i class="material-icons">android</i>
  </button>
</body>
</html>
