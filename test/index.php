<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfica de Burbujas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 50%; margin: auto;">
        <canvas id="myBubbleChart"></canvas>
    </div>

    <script>
        const data = {
            datasets: [{
                label: 'Grupo A',
                data: [
                    { x: 10, y: 20, r: 60 },
                    { x: 15, y: 25, r: 10 },
                    { x: 20, y: 10, r: 5 },
                ],
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
            }, {
                label: 'Grupo B',
                data: [
                    { x: 25, y: 30, r: 20 },
                    { x: 30, y: 15, r: 25 },
                    { x: 35, y: 25, r: 30 },
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        };

        const config = {
            type: 'bubble',
            data: data,
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Eje X'
                        },
                        beginAtZero: true
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Eje Y'
                        },
                        beginAtZero: true
                    }
                }
            },
        };

        const myBubbleChart = new Chart(
            document.getElementById('myBubbleChart'),
            config
        );
    </script>
</body>
</html>