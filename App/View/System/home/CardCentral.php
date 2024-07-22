<hr>
<div class="row">
    <div class="col-8 col-md-8 col-lg-7 col-xl-6 col-xxl-4 mb-4">
        <div class="card border-light shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h3 class="card-title">Centro de trabajo&nbsp;&nbsp;</h3>
                    <span class="oval-label-central">CENTRAL</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12" style="font-weight: bold;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #235B4E;"></div>
                                <label>Centros de trabajo:&nbsp;</label><label id="totalC_"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #9fd8a3;"></div>
                                <label>Regional centro:&nbsp;</label><label id="rCentroC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #dbe5ab;"></div>
                                <label>Regional sur:&nbsp;</label><label id="rSurC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #062107;"></div>
                                <label>Regional norte:&nbsp;</label><label id="rNorteC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #747874;"></div>
                                <label>Reg. Metropolitana:&nbsp;</label><label id="rMetropolitanoC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #e2e2e2;"></div>
                                <label>Corporativo:&nbsp;</label><label id="rCorporativoC"> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <canvas id="myChart_centro_"></canvas>
                        </div>
                    </div>
                </div>
                <a href="../../Central/CentroTrabajo/index.php" class="btn btn-success" style="background:#235B4E;">M&aacutes informacion</a>
            </div>
        </div>
    </div>

    <div class="col-8 col-md-8 col-lg-7 col-xl-6 col-xxl-4 mb-4">
        <div class="card border-light shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h3 class="card-title">Plazas&nbsp;&nbsp;</h3>
                    <span class="oval-label-central">CENTRAL</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12" style="font-weight: bold;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #235B4E;"></div>
                                <label>Total de plazas:&nbsp;</label><label id="allPlazasC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #e2e2e2;"></div>
                                <label>P. Bloqueda:&nbsp;</label><label id="bloqueadaC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #dbe5ab;"></div>
                                <label>P. Cancelada:&nbsp;</label><label id="canceladaC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #747874;"></div>
                                <label>P. Ocupada:&nbsp;</label><label id="ocupadaC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #062107;"></div>
                                <label>P. Reservada:&nbsp;</label><label id="reservadaC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #9fd8a3;"></div>
                                <label>P. Vacante:&nbsp;</label><label id="vacanteC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #5f6c62;"></div>
                                <label>P. Congelada:&nbsp;</label><label id="congeladaC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #dbe5ab;"></div>
                                <label>P. Vacante Indef:&nbsp;</label><label id="vacanteIndeC"> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <canvas id="myChartPlazasC_"></canvas>
                        </div>
                    </div>
                </div>
                <a href="../../Central/Plazas/index.php" class="btn btn-success" style="background:#235B4E;">M&aacutes informaci&oacuten</a>
            </div>
        </div>
    </div>

    <div class="col-8 col-md-8 col-lg-7 col-xl-6 col-xxl-4 mb-4">
        <div class="card border-light shadow-lg">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h3 class="card-title">Empleados&nbsp;&nbsp;</h3>
                    <span class="oval-label-central">CENTRAL</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12" style="font-weight: bold;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #235B4E;"></div>
                                <label>Total empleados:&nbsp;</label><label id="empleadosC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #9fd8a3;"></div>
                                <label>Total masculino:&nbsp;</label><label id="masculinoC"> </label>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="color-square" style="background-color: #e2e2e2;"></div>
                                <label>Total femenino:&nbsp;</label><label id="femeninoC"> </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <canvas id="myChartEmpleadosC"></canvas>
                        </div>
                    </div>
                </div>
                <a href="../../Central/Empleados/index.php" class="btn btn-success" style="background:#235B4E;">M&aacutes informacion</a>
            </div>
        </div>
    </div>

</div>
