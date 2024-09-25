<?php include '../../nav-menu.php' ?>

<div class="container-fluid bg-image nav-padding">
    <br>
    <div class="card border-light shadow-lg">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto">
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col padding-left-0">
                        <h4>IMSS-BIENESTAR CENTRAL</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <div class="row div-spacing">
                <div class="col-6">
                    <h2 class="card-title tittle-card-index">Administración de Asistencias</h2>
                </div>
                <div class="row div-spacing ">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    onclick="iniciarPersonalBancario();" role="tab" aria-controls="nav-home"
                                    aria-selected="true"><i class="fa fa-star"></i>
                                    Asistencias</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    onclick="iniciarMediosContacto();" role="tab" aria-controls="nav-profile"
                                    aria-selected="false"><i class="fa fa-close"></i> Faltas</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                    href="#nav-escolaridad" onclick="iniciarEscolaridad();" role="tab"
                                    aria-controls="nav-contact" aria-selected="false"><i class="fa fa-history"></i>
                                    Retardos</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="div-spacing"></div>
                                <?php include 'Asistencias/index.php' ?>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="div-spacing"></div>
                                <h5>Medios de contacto</h5>
                                <?php include 'MediosContactoM/index.php' ?>
                            </div>
                            <div class="tab-pane fade" id="nav-escolaridad" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="div-spacing"></div>
                                <h5 class="card-title tittle-card-index">Escolaridad</h5>
                                <?php include 'EscolaridadM/index.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include '../../librerias.php' ?>
<?php include 'Carga.php' ?>

<script src="../../../../js/Ib/Asistencias/CentroTrabajo.js"></script>
<script src="../../../../js/Ib/Asistencias/validar.js"></script>
<script src="../../../../js/Ib/Asistencias/Busqueda.js"></script>
<script src="../../../../js/Ib/Asistencias/Carga.js"></script>