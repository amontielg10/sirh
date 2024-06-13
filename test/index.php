<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select personalizado con Bootstrap y CSS</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <style>
    /* Estilo personalizado para el select */
    .custom-select-wrapper {
      position: relative;
      width: 200px; /* Ancho personalizado */
      margin-bottom: 15px; /* Espacio entre select y otros elementos */
    }
    
    /* Estilo para la línea verde */
    .custom-select-wrapper::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -1px; /* Posición de la línea debajo del select */
      width: 100%;
      height: 2px; /* Grosor de la línea */
      background-color: green; /* Color de la línea */
    }
    
    /* Estilo para el select */
    .custom-select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      border: none; /* Eliminar el borde */
      background-color: transparent; /* Fondo transparente */
      width: 100%;
      cursor: pointer;
      padding-right: 20px; /* Espacio para el icono */
    }
    
    /* Estilo para el icono de triángulo */
    .custom-select-icon {
      position: absolute;
      top: calc(50% - 5px); /* Centrar verticalmente */
      right: 5px; /* Posición a la derecha */
      pointer-events: none; /* Ignorar eventos del mouse */
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
        <!-- Icono de triángulo -->
        <div class="custom-select-icon">
          <i class="fas fa-caret-down"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
