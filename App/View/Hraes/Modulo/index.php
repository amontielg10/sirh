<?php
$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
if ($id_tbl_empleados_hraes == null) {
    header('Location: ../Empleados/index.php');
}
?>

<?php include '../../nav-menu.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../../../assets/styles/nav.css">
<div class="container-fluid bg-image-module nav-padding">
    <br>
    <input type="hidden" id="id_tbl_empleados_hraes" value="<?php echo $id_tbl_empleados_hraes ?>" />
    <div class="card border-light">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-auto">
                        <div class="vertical-line"></div>
                    </div>
                    <div class="col padding-left-0">
                        <h3>Datos complementarios</h3>
                    </div>
                </div>
            </div>
            <div class="div-spacing"></div>

            <div class="row">
                <div class="col-4">
                    <h6 class="text-input-form-bold-label  div-spacing">NOMBRE: <label class="text-result-normal"
                            id="nombreResult"></label>
                    </h6>
                </div>
                <div class="col-4">
                    <h6 class="text-input-form-bold-label  div-spacing">N&UacuteMERO DE EMPLEADO: <label
                            id="numEmpleadoResult" class="text-result-normal"></label>
                    </h6>
                </div>
            </div>

            <div class="row">

                <div class="col-4">
                    <h6 class="text-input-form-bold-label  div-spacing">RFC: <label class="text-result-normal"
                            id="rfcResult"></label>
                    </h6>
                </div>

                <div class="col-4">
                    <h6 class="text-input-form-bold-label  div-spacing">CURP: <label class="text-result-normal"
                            id="curpResult"></label>
                    </h6>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="row div-spacing">
                <div class="col-12">

                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                onclick="iniciarPersonalBancario();" role="tab" aria-controls="nav-home"
                                aria-selected="true"><i class="fa fa-user"></i> Datos personales</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                onclick="iniciarMediosContacto();" role="tab" aria-controls="nav-profile"
                                aria-selected="false"><i class="fa fa-address-book"></i> Medios de contacto</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-escolaridad"
                                onclick="iniciarEscolaridad();" role="tab" aria-controls="nav-contact"
                                aria-selected="false"><i class="fa fa-graduation-cap"></i> Escolaridad</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-programas"
                                onclick="iniciarProgramas();" role="tab" aria-controls="nav-contact"
                                aria-selected="false"><i class="fa fa-cubes"></i> Programas</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-movimientos"
                                onclick="iniciarMovimiento();" role="tab" aria-controls="nav-contact"
                                aria-selected="false"><i class="fa fa-random"></i> Movimientos</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-incidencias"
                                onclick="iniciarIncidencias();" role="tab" aria-controls="nav-contact"
                                aria-selected="false"><i class="fa fa-anchor"></i> Incidencias</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-percepciones"
                                onclick="iniciarPercepciones();" role="tab" aria-controls="nav-contact"
                                aria-selected="false"><i class="fa fa-th-list"></i> Percepciones</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="div-spacing"></div>
                            <h5>Informaci&oacuten personal</h5>
                            <?php include 'PersonalBancarioM/index.php' ?>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                        <div class="tab-pane fade" id="nav-movimientos" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="div-spacing"></div>
                            <h5 class="card-title tittle-card-index">Movimientos</h5>
                            <?php include 'MovimientosM/index.php' ?>
                        </div>
                        <div class="tab-pane fade" id="nav-incidencias" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="div-spacing"></div>
                            <h5 class="card-title tittle-card-index">Incidencias</h5>
                            <?php include 'IncidenciasM/index.php' ?>
                        </div>
                        <div class="tab-pane fade" id="nav-percepciones" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div class="div-spacing"></div>
                            <h5 class="card-title tittle-card-index">Percepciones</h5>
                            <?php include 'PercepcionesM/index.php' ?>
                        </div>
                        <div class="tab-pane fade" id="nav-programas" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="div-spacing"></div>
                            <h5 class="card-title tittle-card-index">Programas</h5>
                            <?php include 'ProgramasM/index.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<?php include 'librerias.php' ?>
<script src="../../../../assets/js/bootstrap.js"></script>
<script>
    $(document).ready(function () {
        buscarInfoEmpleado(id_tbl_empleados_hraes);
        iniciarPersonalBancario();
    });
</script>

<!--
<body>
    <?php //include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid bg-image">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-10 align-self-center">
                            <h2 style="color:#235B4E" class="page-title fs-4">Datos complementarios de empleados</h2>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                        <div class="col-2 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../../Hraes/Empleados/index.php"
                                                style="color:#cb9f52;">Empleados</a>
                                        </li>
                                        <li <a class="breadcrumb-item active" aria-current="page">Detalles de
                                            informaci&oacuten</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>

                <input type="hidden" id="id_tbl_empleados_hraes" value="<?php //echo $id_tbl_empleados_hraes ?>" />

                <div class="card-body">

                    <div class="alert alert-style"  role="alert">
                        <div class="form-row">
                            <div class="col-md-3">
                                <h6 style="font-weight: bold;">Nombre: <label id="nombreResult"></label></h6>
                            </div>
                            <div class="col-md-9">
                                <h6 style="font-weight: bold;">Número de Empleado: <label
                                        id="numEmpleadoResult"></label></h6>
                            </div>
                            <div class="col-md-3">
                                <h6 style="font-weight: bold;">Curp: <label id="curpResult"></label></h6>
                            </div>
                            <div class="col-md-9">
                                <h6 style="font-weight: bold;">Rfc: <label id="rfcResult"></label>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="">

                            
                            <button class="nav-link active btn btn-light boton-con-imagen" id="button_datos_personales"
                                data-bs-toggle="tab" data-bs-target="#nav_personal_bancario" type="button" role="tab"
                                aria-controls="nav-home" onclick="iniciarPersonalBancario();" aria-selected="true">
                                <img src="../../../../assets/icons/Modulos/empleado.png">
                            </button>

                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_medios_contacto"
                                data-bs-toggle="tab" data-bs-target="#nav_medios_contacto" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarMediosContacto();" aria-selected="false"">
                                <img src="../../../../assets/icons/Modulos/medios_contacto.png">
                            </button>
                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_escolaridad"
                                data-bs-toggle="tab" data-bs-target="#nav_escolaridad" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarEscolaridad();" aria-selected="false"">
                                <img src="../../../../assets/icons/Modulos/escolaridad.png">
                            </button>

                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_movimientos"
                                data-bs-toggle="tab" data-bs-target="#nav_movimientos" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarMovimiento();" aria-selected="false"">
                                <img src=" ../../../../assets/icons/Modulos/movimientos.png">
                            </button>
                            

                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_retardos"
                                data-bs-toggle="tab" data-bs-target="#nav_incidencias" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarIncidencias();" aria-selected="false"">
                                <img src=" ../../../../assets/icons/Modulos/incidencias.png">
                            </button>
                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_percepciones"
                                data-bs-toggle="tab" data-bs-target="#nav_percepciones" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarPercepciones();" aria-selected="false"">
                                <img src=" ../../../../assets/icons/Modulos/percepciones.png">
                            </button>
                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_deducciones"
                                data-bs-toggle="tab" data-bs-target="#nav_percepciones" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarPercepciones();" aria-selected="false"">
                                <img src=" ../../../../assets/icons/Modulos/deducciones.png">
                            </button>
                            
                            <button class="nav-link btn btn-light boton-con-imagen" id="button_programas"
                                data-bs-toggle="tab" data-bs-target="#nav_programas" type="button" role="tab"
                                aria-controls="nav-clabe" onclick="iniciarProgramas();" aria-selected="false"">
                                <img src=" ../../../../assets/icons/programas.png">
                            </button>


                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        
                        <div class="tab-pane fade show active" id="nav_personal_bancario" role="tabpanel"
                            aria-labelledby="nav-home-tab" tabindex="0">
                            <?php //include 'PersonalBancarioM/index.php' ?>
                        </div>

                       
                    <div class="tab-pane fade" id="nav_personal_bancario" role="tabpanel"
                        aria-labelledby="nav-contact-tab" tabindex="0">
                        <?php //include //'PersonalBancarioM/index.php' ?>
                    </div>

                        <div class="tab-pane fade" id="nav_escolaridad" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            <?php //include 'EscolaridadM/index.php' ?>
                        </div>

                        
                    <div class="tab-pane fade show active" id="nav_escolaridad" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0">
                        <?php //include 'EscolaridadM/index.php' ?>
                    </div>

                        <div class="tab-pane fade" id="nav_medios_contacto" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            <?php //include 'MediosContactoM/index.php' ?>
                        </div>
                        
                        <div class="tab-pane fade" id="nav_movimientos" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            <?php //include 'MovimientosM/index.php' ?>
                        </div>
                        
                        <div class="tab-pane fade" id="nav_programas" role="tabpanel" aria-labelledby="nav-contact-tab"
                            tabindex="0">
                            <?php //include 'ProgramasM/index.php' ?>
                        </div>
                        
                        <div class="tab-pane fade" id="nav_incidencias" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            <?php //include 'IncidenciasM/index.php' ?>
                        </div>
                       
                        <div class="tab-pane fade" id="nav_percepciones" role="tabpanel"
                            aria-labelledby="nav-contact-tab" tabindex="0">
                            <?php //include 'PercepcionesM/index.php' ?>
                        </div>
                        

                       
                    <div class="tab-pane fade show active" id="nav-empleado" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0"><?php //include 'Adicional/index.php' ?></div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0">
                        <?php //include 'NumeroTelefonico/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0">
                        <?php //include 'CedulaProf/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-clabe" role="tabpanel" aria-labelledby="nav-clabe" tabindex="0">
                        <?php //include 'FormaPago/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-emergencia" role="tabpanel" aria-labelledby="nav-clabe"
                        tabindex="0">
                        <?php //include 'ContactoEmergencia/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-dependiente" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php //include 'Dependientes/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-juguetes" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php //include 'Juguetes/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-retardo" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php //include 'Retardo/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-campos" role="tabpanel" aria-labelledby="nav-dependiente"
                        tabindex="0">
                        <?php //include 'CamposPer/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-domicilio" role="tabpanel" aria-labelledby="nav-domicilio"
                        tabindex="0">
                        <?php //include 'Domicilio/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-movimientos_f" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php //include 'Movimientos/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-especialidad" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php //include 'Especialidad/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-nivel_estudio" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php //include 'Estudio/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-jefe" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php //include 'Jefe/index.php' ?>
                    </div>
                    <div class="tab-pane fade" id="nav-correo" role="tabpanel" aria-labelledby="nav-movimientos"
                        tabindex="0">
                        <?php //include 'Correo/index.php' ?>
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

        <?php //include 'librerias.php' ?>
        <?php //include ('../../footer-librerias.php') ?>

</body>

<script>
    $(document).ready(function () {
        //buscarCedula();
        buscarInfoEmpleado(id_tbl_empleados_hraes);
        iniciarPersonalBancario();
    });
</script>

-->