<body>

    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">Sitema Integral de Recursos Humanos</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Mi perfil</h4>
                        <p>Informaci&oacuten correspondiente al centro de trabajo seleccionado.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 style="font-weight: bold;color:#235B4E;">Usuario: <label id="nombreResult"></label></h6>
                            </div>
                            <div class="col-md-5">
                                <h6 style="font-weight: bold;color:#235B4E;">Nombre: <label
                                        id="clvResult"></label></h6>
                            </div>
                            <div class="col-md-7">
                                <h6 style="font-weight: bold;color:#235B4E;">Estatus: Activo<label
                                        id="cpResult"></label></h6>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>

    <script src="../../../../js/Admin/Rol/Rol.js"></script>
    <?php include ('../../footer-librerias.php') ?>
</body>