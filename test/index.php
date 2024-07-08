<!DOCTYPE html>
<html lang="en">
<head>
<!-- Bootstrap CSS (requerido para Bootstrap-Select) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap-Select CSS -->
<link rel="stylesheet" href="path/to/bootstrap-select.min.css">

<!-- Estilos personalizados -->
<style>
    /* Estilos para el selectpicker */
    .custom-selectpicker .btn {
        border-radius: 0; /* Borde cuadrado */
        background-color: #3498db; /* Color de fondo */
        color: #fff; /* Color de texto */
        border: 1px solid #2980b9; /* Borde */
        padding: 10px 20px; /* Ajustar el padding según el tamaño deseado */
        font-size: 16px; /* Tamaño de fuente */
    }

    .custom-selectpicker .dropdown-menu {
        border-radius: 0; /* Borde cuadrado */
        background-color: #f0f0f0; /* Color de fondo del menú desplegable */
        border: 1px solid #ccc; /* Borde */
        font-size: 16px; /* Tamaño de fuente */
    }
</style>
</head>
<body>
<select class="selectpicker custom-selectpicker" data-style="btn-primary">
    <option>Option 1</option>
    <option>Option 2</option>
    <option>Option 3</option>
<!-- jQuery (requerido para Bootstrap y Bootstrap-Select) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS (requerido para Bootstrap-Select) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap-Select JS -->
<script src="path/to/bootstrap-select.min.js"></script>

<!-- Inicializar selectpicker -->
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>
</body>
</html>