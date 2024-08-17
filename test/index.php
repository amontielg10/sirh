<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tooltip con Colores</title>
    <style>
        /* Estilos para el contenedor del tooltip */
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
            font-family: Arial, sans-serif; /* Tipografía moderna */
        }

        /* Estilos para el contenido del tooltip */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px; /* Ajusta el ancho del tooltip */
            background-color: #333;
            color: #fff;
            text-align: left;
            padding: 8px;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            bottom: 125%; /* Posiciona el tooltip encima del contenedor */
            left: 50%;
            margin-left: -60px; /* Centra el tooltip */
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
            transform: translateY(10px); /* Añade un pequeño efecto de desplazamiento */
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2); /* Sombra para un efecto de profundidad */
            font-size: 10px; /* Ajusta el tamaño del texto */
        }

        /* Mostrar el tooltip al pasar el cursor */
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
            transform: translateY(0); /* Elimina el desplazamiento cuando es visible */
        }

        /* Estilos para los cuadros de colores */
        .tooltip .tooltiptext .color-box {
            width: 16px; /* Tamaño de los cuadros */
            height: 16px;
            display: inline-block;
            margin-right: 6px;
            vertical-align: middle;
            border-radius: 4px; /* Bordes redondeados para los cuadros */
        }

        .tooltip .tooltiptext .color-green {
            background-color: #4CAF50; /* Verde más suave */
        }

        .tooltip .tooltiptext .color-yellow {
            background-color: #FFC107; /* Amarillo más suave */
        }

        .tooltip .tooltiptext .color-red {
            background-color: #F44336; /* Rojo más suave */
        }

        /* Estilos para la descripción */
        .tooltip .tooltiptext div {
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .tooltip .tooltiptext div:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="tooltip">
        Pasa el cursor aquí
        <div class="tooltiptext">
            <div>
                <div class="color-box color-green"></div> Verde: Éxito.
            </div>
            <div>
                <div class="color-box color-yellow"></div> Amarillo: Advertencia.
            </div>
            <div>
                <div class="color-box color-red"></div> Rojo: Peligro.
            </div>
        </div>
    </div>
</body>
</html>
