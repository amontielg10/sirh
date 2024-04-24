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
            </div>

            <div class="container-fluid">
                <p>Informaci&oacuten de los &uacuteltimos movimientos de empleados.</p>
                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                    onkeyup="buscarInBd();" aria-label="Search">
                <p></p>

                <table class="table table-striped" id="t-table" style="width:100%">
                </table>

                <?php include 'AgregarEditar.php' ?>

            </div>
        </div>
    </div>

    <script src="../../../../js/Hraes/Empleados/Empleados.js"></script>
    <script src="../../../../js/Hraes/Empleados/validar.js"></script>
    <?php include ('../../footer-librerias.php') ?>
</body>
