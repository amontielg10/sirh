<?php
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
if ($id_tbl_empleados_hraes == null) {
    header('Location: ../Empleados/index.php');
}
?>

<body>
    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h4 class="page-title">M&oacutedulo Hospital Regional de Alta Especialidad</h4>
                <div class="row">
                    <div class="col-5 align-self-center">

                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!--
                <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-arrow-alt-circle-left"></i></a>
-->
            </div>

            <input type="hidden" id="id_tbl_empleados_hraes" value="<?php echo $id_tbl_empleados_hraes ?>" />

            <div class="card-body">
                <p>Informaci&oacuten de empleado seleccionado</p>

                <div class="form-row">
                    <div class="col-md-4">
                        <h6 style="font-weight: bold;color:#235B4E;">Nombre: <label id="nombreResult"></label></h6>
                    </div>
                    <div class="col-md-8">
                        <h6 style="font-weight: bold;color:#235B4E;">Núm. de Empleado: <label
                                id="numEmpleadoResult"></label></h6>
                    </div>
                    <div class="col-md-4">
                        <h6 style="font-weight: bold;color:#235B4E;">Curp: <label id="curpResult"></label></h6>
                    </div>
                    <div class="col-md-8">
                        <h6 style="font-weight: bold;color:#235B4E;">Rfc: <label id="rfcResult"></label></h6>
                    </div>
                </div>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-empleado" type="button" role="tab" aria-controls="nav-home"
                            onclick="iniciarAdicional();" aria-selected="true"><i class="fas fa-list-alt"></i>
                            Informaci&oacuten adicional</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false"
                            onclick="buscarNumTelefonico();"><i class="fas fa-phone"></i> N&uacutem.
                            telefonico</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false"
                            onclick="buscarCedula();"><i class="fas fa-book"></i> C&eacutedula prof.</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-clabe"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="buscarFormaPago();"><i class="fas fa-money-check"></i> Forma pago</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-emergencia" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="buscarEmergencia();"><i class="fas fa-ambulance"></i>
                            Contacto emergencia</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-dependiente" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="buscarDependiente();"><i class="fa fa-child"></i>
                            Dependientes econ&oacutemicos</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-juguetes" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="buscarJuguete();"><i class="fa fa-paper-plane"></i>
                            Juguetes</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-retardo"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="buscarRetardo();"><i class="fa fa-hourglass"></i>
                            Retardos</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-campos"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="iniciarCampos();"><i class="fa fa-cubes"></i>
                            Campos personalizados</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-domicilio" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="iniciarDomicilio();"><i class="fa fa-home"></i>
                            Domicilio</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-movimientos_f" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="iniciarMovimientos();"><i class="fa fa-list"></i>
                            Movimientos</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-especialidad" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="buscarEspecialidad();"><i class="fa fa-plus-square"></i>
                            Especialidad</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-nivel_estudio" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="buscarEstudio();"><i class="fa fa-graduation-cap"></i> Nivel
                            estudio</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-jefe"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="buscarJefe();"><i class="fa fa-user-circle"></i> Jefe inmediato</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-correo"
                            type="button" role="tab" aria-controls="nav-correo" aria-selected="false"
                            onclick="buscarCorreo();"><i class="fa fa-at"></i> Correo</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-empleado" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0"><?php include 'Adicional/index.php' ?></div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0">
                        <?php include 'NumeroTelefonico/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0">
                        <?php include 'CedulaProf/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-clabe" role="tabpanel" aria-labelledby="nav-clabe" tabindex="0">
                        <?php include 'FormaPago/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-emergencia" role="tabpanel" aria-labelledby="nav-clabe"
                        tabindex="0">
                        <?php include 'ContactoEmergencia/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-dependiente" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php include 'Dependientes/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-juguetes" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php include 'Juguetes/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-retardo" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php include 'Retardo/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-campos" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php include 'CamposPer/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-domicilio" role="tabpanel" aria-labelledby="nav-domicilio"
                        tabindex="0">
                        <?php include 'Domicilio/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-movimientos_f" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php include 'Movimientos/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-especialidad" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php include 'Especialidad/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-nivel_estudio" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php include 'Estudio/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-jefe" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php include 'Jefe/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-correo" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php include 'Correo/index.php' ?>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <?php include 'librerias.php' ?>
    <?php include ('../../footer-librerias.php') ?>

</body>

<script>
    $(document).ready(function () {
        detallesAdicional(id_tbl_empleados_hraes);
        buscarInfoEmpleado(id_tbl_empleados_hraes);
    });
</script>