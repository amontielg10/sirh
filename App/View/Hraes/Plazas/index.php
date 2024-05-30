<?php
$id_tbl_centro_trabajo_hraes = null;
if (isset($_POST['id_tbl_centro_trabajo_hraes'])) {
    $id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];
}
?>
<?php include '../../nav-menu.php' ?>
<div class="container-fluid bg-image nav-padding">
    <input type="hidden" id="id_tbl_centro_trabajo_hraes" value="<?php echo $id_tbl_centro_trabajo_hraes ?>" />
    <br>
    <div class="card border-light">
        <div class="card-body">
            <h4><span><i class="fa fa-chevron-right"></i></span> Hospital Regional de Alta Especialidad</h4>
            <?php if ($id_tbl_centro_trabajo_hraes != null) { ?>
                <div class="linea-horizontal"></div>
                <div class="div-spacing"></div>
                <h6 class="icon-detail"><i class="fa fa-info-circle"></i>
                    Datos
                    de centro de trabajo seleccionado.
                </h6>

                <div class="row">
                    <div class="col-12">
                        <h6 class="text-input-form-bold  div-spacing">Nombre centro de trabajo: <label
                                id="nombreResult"></label>
                        </h6>
                    </div>
                </div>

                <div class="row">

                    <div class="col-3">
                        <h6 class="text-input-form-bold  div-spacing">Clave de centro de trabajo: <label
                                id="clvResult"></label>
                        </h6>
                    </div>

                    <div class="col-2">
                        <h6 class="text-input-form-bold  div-spacing">C&oacutedigo postal: <label id="cpResult"></label>
                        </h6>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <div class="row div-spacing">
                <div class="col-9">
                    <h3 class="card-title tittle-card-index">Plazas</h3>
                    <div class="linea-horizontal"></div>
                </div>
                <div class="col-3 search-container">
                    <input onkeyup="buscarPlaza();" id="buscar" type="text" placeholder="Buscar..."
                        class="form-control mr-sm-2 search-input">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <?php if ($id_tbl_centro_trabajo_hraes != null) { ?>
                <div class="row div-spacing">
                    <div class="col-9">
                        <div class="form-inline">
                            <button onclick="agregarEditarDetalles(null)" class="btn btn-light"><i
                                    class="fa fa-plus icon-size-add"></i>
                                <span class="hide-menu text-button-add">&nbsp;Agregar plaza</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <table class="table table-bordered" id="tabla_plazas" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="table-right">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idtable">1</label>
                        <button onclick="siguienteValor()" class="btn btn-light"><i
                                class="fa fa-angle-double-right"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="../../../../js/Hraes/Plazas/Busqueda.js"></script>
<script src="../../../../js/Hraes/Plazas/Plazas.js"></script>
<script src="../../../../js/Hraes/Plazas/validar.js"></script>
<?php include 'AgregarEditar.php' ?>
<?php include 'Detalles.php' ?>
<?php include '../../Librerias.php' ?>

