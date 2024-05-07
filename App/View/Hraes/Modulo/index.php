<?php
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
?>

<head>
    <style>
        --#{$prefix}accordion-color: #{$accordion-color};
--#{$prefix}accordion-bg: #{$accordion-bg};
--#{$prefix}accordion-transition: #{$accordion-transition};
--#{$prefix}accordion-border-color: #{$accordion-border-color};
--#{$prefix}accordion-border-width: #{$accordion-border-width};
--#{$prefix}accordion-border-radius: #{$accordion-border-radius};
--#{$prefix}accordion-inner-border-radius: #{$accordion-inner-border-radius};
--#{$prefix}accordion-btn-padding-x: #{$accordion-button-padding-x};
--#{$prefix}accordion-btn-padding-y: #{$accordion-button-padding-y};
--#{$prefix}accordion-btn-color: #{$accordion-button-color};
--#{$prefix}accordion-btn-bg: #{$accordion-button-bg};
--#{$prefix}accordion-btn-icon: #{escape-svg($accordion-button-icon)};
--#{$prefix}accordion-btn-icon-width: #{$accordion-icon-width};
--#{$prefix}accordion-btn-icon-transform: #{$accordion-icon-transform};
--#{$prefix}accordion-btn-icon-transition: #{$accordion-icon-transition};
--#{$prefix}accordion-btn-active-icon: #{escape-svg($accordion-button-active-icon)};
--#{$prefix}accordion-btn-focus-box-shadow: #{$accordion-button-focus-box-shadow};
--#{$prefix}accordion-body-padding-x: #{$accordion-body-padding-x};
--#{$prefix}accordion-body-padding-y: #{$accordion-body-padding-y};
--#{$prefix}accordion-active-color: #{$accordion-button-active-color};
--#{$prefix}accordion-active-bg: #{$accordion-button-active-bg};
    </style>
</head>

<body>
    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">M&oacutedulo Hospital Regional de Alta Especialidad</h2>
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
                <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-arrow-alt-circle-left"></i></a>
            </div>

            <input type="hidden" id="id_tbl_empleados_hraes" value="<?php echo $id_tbl_empleados_hraes ?>" />

            <div class="card-body">
                <p>Informaci&oacuten de empleado seleccionado</p>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-empleado" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true"><i class="fas fa-list-alt"></i> M&aacutes datos</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false"
                            onclick="iniciarNumeroTelefonico();"><i class="fas fa-phone"></i> N&uacutem.
                            telefonico</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false"
                            onclick="iniciarCedulaProf();"><i class="fas fa-book"></i> C&eacutedula prof.</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-clabe"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="iniciarFormaPago();"><i class="fas fa-money-check"></i> Forma pago</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-emergencia" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="iniciarEmergencia();"><i class="fas fa-ambulance"></i>
                            Contacto emergencia</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-dependiente" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="iniciarDependiente();"><i class="fa fa-child"></i>
                            Dependientes econ&oacutemicos</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-juguetes" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false" onclick="iniciarJueguetes();"><i class="fa fa-paper-plane"></i>
                            Juguetes</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-retardo"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="iniciarRetardo();"><i class="fa fa-hourglass"></i>
                            Retardos</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-campos"
                            type="button" role="tab" aria-controls="nav-clabe" aria-selected="false"
                            onclick="iniciarCampos();"><i class="fa fa-cubes"></i>
                            Campos personalizados</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-domicilio" type="button" role="tab" aria-controls="nav-clabe"
                            aria-selected="false"><i class="fa fa-home"></i>
                            Domicilio</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-empleado" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0"><?php ?></div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0"><?php include 'NumeroTelefonico/index.php' ?></div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0"><?php include 'CedulaProf/index.php' ?></div>
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
                </div>
            </div>

        </div>
    </div>

    <?php include 'librerias.php' ?>
    <?php include ('../../footer-librerias.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>