<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popper.js Tooltip Example</title>
    <!-- Incluir estilos personalizados para el tooltip -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .tooltip {
            position: absolute;
            background-color: #333;
            color: #fff;
            padding: 8px;
            border-radius: 4px;
            font-size: 14px;
            visibility: hidden; /* Ocultar el tooltip por defecto */
            transition: visibility 0.2s, opacity 0.2s linear;
            opacity: 0;
        }

        .tooltip[data-popper-placement^='top'] {
            margin-bottom: 8px;
        }

        .tooltip[data-popper-placement^='bottom'] {
            margin-top: 8px;
        }

        .tooltip[data-popper-placement^='left'] {
            margin-right: 8px;
        }

        .tooltip[data-popper-placement^='right'] {
            margin-left: 8px;
        }

        .tooltip-arrow {
            position: absolute;
            width: 0;
            height: 0;
            border-width: 5px;
            border-style: solid;
        }

        .tooltip-arrow[data-popper-placement^='top'] {
            border-top-color: #333;
            border-bottom: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            bottom: -5px;
        }

        .tooltip-arrow[data-popper-placement^='bottom'] {
            border-bottom-color: #333;
            border-top: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            top: -5px;
        }

        .tooltip-arrow[data-popper-placement^='left'] {
            border-left-color: #333;
            border-right: 0;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            right: -5px;
        }

        .tooltip-arrow[data-popper-placement^='right'] {
            border-right-color: #333;
            border-left: 0;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            left: -5px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <button id="tooltipButton" class="btn">
        Hover over me
    </button>
    <div id="tooltip" class="tooltip" role="tooltip">
        <div class="tooltip-arrow" data-popper-arrow></div>
        Tooltip content
    </div>

    <!-- Incluir Popper.js -->
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.querySelector('#tooltipButton');
            const tooltip = document.querySelector('#tooltip');

            // Crear una instancia de Popper.js
            const popperInstance = Popper.createPopper(button, tooltip, {
                placement: 'top',
                modifiers: [
                    {
                        name: 'offset',
                        options: {
                            offset: [0, 10],
                        },
                    },
                ],
            });

            // Mostrar el tooltip al pasar el cursor
            button.addEventListener('mouseenter', () => {
                tooltip.style.visibility = 'visible';
                tooltip.style.opacity = '1';
            });

            // Ocultar el tooltip al retirar el cursor
            button.addEventListener('mouseleave', () => {
                tooltip.style.visibility = 'hidden';
                tooltip.style.opacity = '0';
            });
        });
    </script>
</body>
</html>
