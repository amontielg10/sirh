<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Estilos generales */
body {
    font-family: Arial, sans-serif;
}

/* Estilo del botón */
button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

/* Estilos para la alerta */
.alert {
    display: none;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 1px solid #ccc;
    background-color: #fff;
    z-index: 1000;
}

.alert-content {
    padding: 20px;
    text-align: center;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

/* Fondo oscuro para el overlay */
body.overlay {
    background: rgba(0, 0, 0, 0.5);
}
  </style>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerta Personalizada</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button id="showAlertBtn">Mostrar Alerta</button>

    <div id="customAlert" class="alert">
        <div class="alert-content">
            <span class="close-btn">&times;</span>
            <p>Esta es una alerta personalizada.</p>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
</body>
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const showAlertBtn = document.getElementById('showAlertBtn');
    const customAlert = document.getElementById('customAlert');
    const closeBtn = document.querySelector('.close-btn');

    showAlertBtn.addEventListener('click', () => {
        customAlert.style.display = 'block';
        document.body.classList.add('overlay');
    });

    closeBtn.addEventListener('click', () => {
        customAlert.style.display = 'none';
        document.body.classList.remove('overlay');
    });

    // Cerrar la alerta si se hace clic fuera de ella
    window.addEventListener('click', (event) => {
        if (event.target == customAlert) {
            customAlert.style.display = 'none';
            document.body.classList.remove('overlay');
        }
    });
});
</script>
</html>