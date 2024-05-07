<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="time" id="campoTiempo">
<button onclick="verificarCampo()">Verificar</button>
</body>
</html>

<script>
    function verificarCampo() {
    // Obtener el valor del campo de tiempo
    var valorCampo = document.getElementById("campoTiempo").value;

    // Verificar si el campo tiene datos utilizando un operador ternario
    var tieneDatos = valorCampo ? true : false;

    // Mostrar el resultado
    alert("El campo tiene datos: " + tieneDatos);
}
</script>