<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combobox de Bootstrap Personalizado</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles.css">

  <style>
    /* Cambia el color del combobox al seleccionarlo */
  /* Cambia el color de fondo al pasar el cursor sobre una opción */
.custom-select option:hover {
  background-color: red; /* Cambia este valor al color deseado */
}
  </style>
</head>

<body>

  <div class="container mt-5">
    <h2>Selecciona una opción:</h2>
    <select class="custom-select" id="opciones">
      <option selected>Selecciona una opción...</option>
      <option value="1">Opción 1</option>
      <option value="2">Opción 2</option>
      <option value="3">Opción 3</option>
    </select>
  </div>

</body>

</html>