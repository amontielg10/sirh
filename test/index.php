<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Personalizado</title>
    <style>
        /* Estilo personalizado para el checkbox */
        .custom-checkbox {
            width: 30px; /* Tamaño del checkbox */
            height: 30px; /* Tamaño del checkbox */
            cursor: pointer; /* Cambia el cursor al pasar sobre el checkbox */
            -webkit-appearance: none; /* Oculta el estilo predeterminado del checkbox en Webkit (Chrome, Safari) */
            -moz-appearance: none; /* Oculta el estilo predeterminado del checkbox en Mozilla (Firefox) */
            appearance: none; /* Oculta el estilo predeterminado del checkbox */
            border: 2px solid gray; /* Bordes del checkbox */
            border-radius: 4px; /* Bordes redondeados */
            background-color: #f0f0f0; /* Color de fondo por defecto */
            position: relative; /* Necesario para posicionar el símbolo de verificación */
        }

        /* Estilo para el checkbox cuando está marcado */
        .custom-checkbox:checked {
            background-color: gray; /* Cambia el color de fondo cuando está marcado */
        }

        /* Estilo para el checkbox cuando está marcado, reemplaza el color de fondo por defecto */
        .custom-checkbox:checked::before {
            content: "✔"; /* Símbolo de marca de verificación */
            display: block;
            color: white; /* Color del símbolo de verificación */
            font-size: 20px; /* Tamaño del símbolo de verificación */
            text-align: center;
            line-height: 30px; /* Alineación vertical del símbolo */
            position: absolute; /* Posiciona el símbolo dentro del checkbox */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        /* Estilo personalizado para la etiqueta del checkbox */
        .custom-checkbox-label {
            font-size: 1.2em; /* Tamaño de la fuente de la etiqueta */
            margin-left: 10px; /* Espacio entre el checkbox y la etiqueta */
            cursor: pointer; /* Cambia el cursor al pasar sobre la etiqueta */
        }
    </style>
</head>
<body>
    <div class="col-3">
        <label for="campo" class="form-label input-text-form text-input-rem">¿Es más de un día?</label><label class="text-required">*</label>
        <div class="form-check div-spacing">
            <input class="form-check-input custom-checkbox" type="checkbox" value="0" id="es_mas_de_un_dia">
            <label class="form-check-label custom-checkbox-label" for="es_mas_de_un_dia">
                Si
            </label>
        </div>
    </div>
</body>
</html>
