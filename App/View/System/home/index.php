<?php
include '../../nav-menu.php';
?>

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
                        <h4>¡Hola <?php echo $nombre ?>! ¡Bienvenido al sistema!</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <h3 class="card-title tittle-card-index">SISTEMA INTEGRAL DE RECURSOS HUMANOS</h3>
            <?php if ($id_rol == 2) { ?> <!-- ROLE_CENTRAL -->
                <div class="row">
                    <div class="col">
                        <?php include 'CardCentral.php' ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($id_rol == 3) { ?> <!-- ROLE_HRAES -->
                <div class="row">
                    <div class="col">
                        <?php include 'CardHraes.php' ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($id_rol == 4) { ?> <!-- ROLE_FEDERALIZADA -->
                <div class="row">
                    <div class="col">
                        <?php //include 'CardHraes.php' ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($id_rol == 1) { ?><!-- ROLE_ALL -->
                <div class="row">
                    <div class="col">
                        <?php //include 'CardHraes.php' ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <br>

    <div class="card border-light shadow-lg">
        <div class="card-body">
            <div class="btn-container">
                <div class="row">
                    <div class="col-12">
                        <button id="button_cat" style="background:white" type="button"
                            class="btn btn-light btn-block btn-with-shadow">
                            <i class="fa fa-building"></i><br>
                            Banco
                        </button>
                        <button id="button_cat" style="background:white" type="button"
                            class="btn btn-light btn-block btn-with-shadow">
                            <i class="fa fa-id-badge"></i><br>
                            Puesto
                        </button>
                        <button id="button_cat" style="background:white" type="button"
                            class="btn btn-light btn-block btn-with-shadow">
                            <i class="fa fa-align-left"></i><br>
                            Conceptos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="<?php echo $id_rol ?>" id="id_role_">

</div>

<script src="../../../../js/Global/Inicio/Inicio.js"></script>