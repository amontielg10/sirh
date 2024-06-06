<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select2 Example</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h2>Selecciona una opción:</h2>
  <select id="opciones" class="form-control">
    <option value="1">Opción 1</option>
    <option value="2">Opción 2</option>
    <option value="3">Opción 3</option>
    <option value="4">Opción 4</option>
    <option value="5">Opción 5</option>
    <!-- Agrega más opciones si lo deseas -->
  </select>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<script>
$(document).ready(function() {
  $('#opciones').select2({
    placeholder: 'Selecciona una opción...',
    allowClear: true // Permite borrar la selección
  });
});
</script>

</body>
</html>