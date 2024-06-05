<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico Circular con Número en el Centro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        .chart-container {
            position: relative;
            margin: auto;
            height: 400px;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Plugin para mostrar texto en el centro del gráfico de dona
        const centerTextPlugin = {
            id: 'centerText',
            afterDatasetsDraw(chart) {
                const { ctx, width, height } = chart;
                ctx.save();
                const fontSize = (height / 114).toFixed(2);
                ctx.font = `${fontSize}em sans-serif`;
                ctx.textBaseline = 'middle';
                const text = '75%';
                const textX = Math.round((width - ctx.measureText(text).width) / 2);
                const textY = height / 2;
                ctx.fillText(text, textX, textY);
                ctx.restore();
            }
        };

        // Datos del gráfico
        const data = {
            labels: ["Rojo", "Azul", "Verde"],
            datasets: [{
                label: "Colores",
                data: [30, 20, 50],
                backgroundColor: ["#FF6384", "#36A2EB", "#4BC0C0"]
            }]
        };

        // Opciones del gráfico
        const options = {
            plugins: {
                legend: {
                    display: false // Oculta la leyenda
                },
                title: {
                    display: true, // Muestra el título
                    text: 'Distribución de Colores', // Título de la gráfica
                    font: {
                        size: 20 // Tamaño de la fuente del título
                    }
                }
            },
            cutout: '70%' // Tamaño del agujero en el gráfico circular (70% del radio)
        };

        // Crear el gráfico
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options,
            plugins: [centerTextPlugin]
        });
    </script>
</body>
</html>
