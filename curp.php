<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body>

</body>

</html>

<script>

    var curp = "TETR010623HHGRRDA4";
    var fechaNacimiento = obtenerFechaNacimiento(curp);
    console.log("Fecha de nacimiento:", fechaNacimiento);

    function obtenerFechaNacimiento(curp) {
        if (curp.length < 18) {
            return false;
        }
        let fechaNacimiento = curp.substr(4, 6);
        let año = fechaNacimiento.substr(0, 2);
        let añoCompleto = (año < 50) ? "20" + año : "19" + año;
        let mes = fechaNacimiento.substr(2, 2);
        let dia = fechaNacimiento.substr(4, 2);
        let fechaCompleta = añoCompleto + "-" + mes + "-" + dia;
        return fechaCompleta;
    }

    function calcularDiferenciaFechas(fechaInicio, fechaFin) {
    var diferencia = {
        años: 0,
        meses: 0,
        dias: 0
    };

    var fechaInicioObj = new Date(fechaInicio);
    var fechaFinObj = new Date(fechaFin);

    var añosDiferencia = fechaFinObj.getFullYear() - fechaInicioObj.getFullYear();
    var mesesDiferencia = fechaFinObj.getMonth() - fechaInicioObj.getMonth();
    var diasDiferencia = fechaFinObj.getDate() - fechaInicioObj.getDate();

    // Ajustar la diferencia si los días son negativos
    if (diasDiferencia < 0) {
        mesesDiferencia--;
        // Obtener el último día del mes anterior
        var ultimoDiaMesAnterior = new Date(fechaFinObj.getFullYear(), fechaFinObj.getMonth(), 0).getDate();
        diasDiferencia += ultimoDiaMesAnterior;
    }

    // Ajustar la diferencia si los meses son negativos
    if (mesesDiferencia < 0) {
        añosDiferencia--;
        mesesDiferencia += 12;
    }

    diferencia.años = añosDiferencia;
    diferencia.meses = mesesDiferencia;
    diferencia.dias = diasDiferencia;

    return diferencia;
}

// Ejemplo de uso  año mes dia
var fechaInicio = "2001-06-23";//menor
var fechaFin = "2024-05-02";//mayor
var diferencia = calcularDiferenciaFechas(fechaInicio, fechaFin);
console.log("La diferencia es:", diferencia.años, "años,", diferencia.meses, "meses y", diferencia.dias, "días");
</script>