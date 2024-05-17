<?php
$id_tbl_centro_trabajo_hraes = null;
if (isset($_POST['id_tbl_centro_trabajo_hraes'])) {
    $id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];
}
?>

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
                                        <a href="../../System/home/index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Plaza</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <input type="hidden" id="id_tbl_centro_trabajo_hraes"
                    value="<?php echo $id_tbl_centro_trabajo_hraes ?>" />

                <?php if ($id_tbl_centro_trabajo_hraes != null) { ?>

                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Control de plazas</h4>
                        <p>Informaci&oacuten correspondiente al centro de trabajo seleccionado.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12">
                                <h6 style="font-weight: bold;color:#235B4E;">Nombre: <label id="nombreResult"></label></h6>
                            </div>
                            <div class="col-md-5">
                                <h6 style="font-weight: bold;color:#235B4E;">Clave de centro de trabajo: <label
                                        id="clvResult"></label></h6>
                            </div>
                            <div class="col-md-7">
                                <h6 style="font-weight: bold;color:#235B4E;">C&oacutedigo postal: <label
                                        id="cpResult"></label></h6>
                            </div>
                        </div>
                    </div>

                    <div class="form-inline">
                        <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                            <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar una plaza</span>
                        </button>
                    </div>
                <?php } else { ?>
                    <p>Informaci&oacuten de los &uacuteltimos movimientos de plazas.</p>
                <?php } ?>

                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                    onkeyup="buscarPlaza();" aria-label="Search">
                <p></p>

                <table class="table table-striped" id="tabla_plazas" style="width:100%">
                </table>

                <div class="position-absolute top-50 start-50">
                    <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                    </button>
                    <label id="idtable">1</label>
                    <button onclick="siguienteValor()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                    </button>
                </div>
                <br>


                <?php include 'AgregarEditar.php' ?>
                <?php include 'Detalles.php' ?>

            </div>
        </div>
    </div>

    <script src="../../../../js/Hraes/Plazas/Busqueda.js"></script>
    <script src="../../../../js/Hraes/Plazas/Plazas.js"></script>
    <script src="../../../../js/Hraes/Plazas/validar.js"></script>
    <?php include ('../../footer-librerias.php') ?>
</body>