<?php include("../../php/RegimenFiscalC/listar.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include ("../../php/CatCentroTrabajoC/listar.php"); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Plaza</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Centro de Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/PlazasC/Agregar.php">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label >Numero de Plaza</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="num_plaza" placeholder="Numero de Plaza" >
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Catalogo de Plazas</label><label style="color:red">*</label><br>
                                    <select class="selectpicker" aria-label="Default select example"
                                        name="id_cat_plazas">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatPlazasC/listar.php");
                                        $listado = listadoCP();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_plazas . '">' . $row->codigo_plaza . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Tipo de Contratacion</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_cat_tipo_contratacion">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatTipoContratacionC/listar.php");
                                        $listado = listadoContratacion();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_tipo_contratacion . '">' . $row->descripcion_cont . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Situacion Plaza</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_cat_situacion_plaza">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatSituacionPlazaC/listar.php");
                                        $listado = listadoSituacionPlaza();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_situacion_plaza . '">' . $row->situacion_plaza . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Unidad Responsable</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_cat_unidad_responsable">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatUnidadResponsableC/listar.php");
                                        $listado = $listadoUR;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_unidad_responsable . '">' . catPk($row->id_cat_unidad_responsable) . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Puesto</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_cat_puesto">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatPuestoC/listar.php");
                                        $listado = listadoPuesto();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_puesto . '">' . $row->codigo_puesto . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Zona tabulares</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_cat_zonas_tabuladores">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatZonaTabuladoresC/listar.php");
                                        $listado = listadoZona();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_zonas_tabuladores . '">' . $row->zona_tabuladores . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Niveles</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_cat_niveles">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        include ("../../php/CatNivelesC/listar.php");
                                        $listado = listado();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_niveles . '">' . $row->codigo . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Centro de Trabajo</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_tbl_centro_trabajo">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoCentroTrabajo();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_tbl_centro_trabajo'] != $row->id_tbl_centro_trabajo){
                                                    echo '<option value="' . $row->id_tbl_centro_trabajo . '">' . listadoCentroTrabajoCv($row->id_tbl_centro_trabajo) . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Zona pagadora</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="zona_pagadora" placeholder="Zona Pagadora" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha Inicio Contrato</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_ini_contrato" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha Fin contrato</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_fin_contrato" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de Modificacion</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_modificacion" >
                                </div>
                              
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>



</body>

<?php  include("libFooter.php"); ?>
</html>