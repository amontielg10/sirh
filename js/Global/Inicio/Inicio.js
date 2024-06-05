$(document).ready(function () {
    centroTrabajoHraes();
});

function centroTrabajoHraes(){
    let totalCTR = document.getElementById("totalCTR");
    let rCentroR = document.getElementById("rCentroR");
    let rSurR = document.getElementById("rSurR");
    let rNorteR = document.getElementById("rNorteR");
    let rMetropolitanoR = document.getElementById("rMetropolitanoR");
    let rCorporativoR = document.getElementById("rCorporativoR");

    $.post("../../../../App/Controllers/Hrae/CentroTrabajoC/InicioC.php", {},
        function (data) {
            console.log(data);
            let jsonData = JSON.parse(data);
            
            let rCentro = jsonData.rCentro;
            let rSur = jsonData.rSur;
            let rNorte = jsonData.rNorte;
            let rMetropolitano = jsonData.rMetropolitano;
            let rCorporativo = jsonData.rCorporativo;

            totalCTR.textContent = jsonData.totalCT;
            rCentroR.textContent = rCentro;
            rSurR.textContent = rSur;
            rNorteR.textContent = rNorte;
            rMetropolitanoR.textContent = rMetropolitano;
            rCorporativoR.textContent = rCorporativo;
            
            var data = {
                labels: ["Regional Centro", "Regional Sur", "Regional Norte", "Regional Metropolitana", "Corporativo"],
                datasets: [{
                    label: "Colores",
                    data: [rCentro, rSur, rNorte,rMetropolitano,rCorporativo],
                    backgroundColor: ["#9fd8a3", "#dbe5ab", "#062107","#747874","#e2e2e2"]
                }]
            };
    
            // Opciones del gráfico
            var options = {
                plugins: {
                    legend: {
                        display: false // Oculta la leyenda
                    },
                    title: {
                        display: true, // Muestra el título
                        text: 'Distribución por regiones', // Título de la gráfica
                        font: {
                            size: 15 // Tamaño de la fuente del título
                        }
                    }
                },
                cutout: '5s0%' // Tamaño del agujero en el gráfico circular (70% del radio)
            };
    
            // Crear el gráfico
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
            
        }
    );
}