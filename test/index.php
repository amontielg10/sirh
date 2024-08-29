<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detectar Cambio de Fecha</title>
</head>
<body>
    <label for="calendar">Selecciona una fecha:</label>
    <input type="date" id="calendar">
    <p id="selected-date"></p>

    <script>
        // Selecciona el input de tipo date
        
        const selectedDateDisplay = document.getElementById('selected-date');

        // Agrega un event listener para el evento 'change'
        const dateInput = document.getElementById('calendar');
        dateInput.addEventListener('change', function() {
            let isValue = dateInput.value;
            console.log(isValue)

        });
    </script>
</body>
</html>