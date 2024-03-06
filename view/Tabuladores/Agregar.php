<?php include("../../php/RegimenFiscalC/listar.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
    
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/CatRegionC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de region?> 
    <?php include("../../php/CatEstatusC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de estatus?> 

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Tabuladores</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Tabuladores </a>
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
                        <form method="POST" action="../../php/TabuladoresC/Agregar.php">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label >Niveles</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_cat_niveles" id="id_cat_niveles" >
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            include('../../php/CatNivelesC/listar.php');
                                            $listado = listado();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_niveles . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Tipo de Contratacion</label><label style="color:red">*</label>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_tipo_contratacion"
                                        name="id_cat_tipo_contratacion">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            include('../../php/CatTipoContratacionC/listar.php');
                                            $listado = listadoContratacion();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_tipo_contratacion . '">' . $row->descripcion_cont .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Codigo de Puestpo</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_puesto"
                                        name="id_cat_puesto">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            include('../../php/CatPuestoC/listar.php');
                                            $listado = listadoPuesto();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_puesto . '">' . $row->codigo_puesto .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Zona Tabulador</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_zona_tabuladores"
                                        name="id_cat_zona_tabuladores">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            include('../../php/CatZonaTabuladoresC/listar.php') ;
                                            $listado = listadoZona();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_zonas_tabuladores . '">' . $row->zona_tabuladores .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <hr>
                            <div>Sueldo Eventual</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="r_sueldo_even"
                                        name="r_sueldo_even">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            include('../../php/CatRubrosTabuladoresC/listar.php');
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_sueldo_even" placeholder="Cantidad">
                                </div>
                            </div>
                            
                            <hr>
                            <div>Sueldo</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_sueldo_even">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_sueldo" placeholder="Cantidad">
                                </div>
                            </div>
                            
                            <hr>
                            <div>Compensa</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_compensa">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_compensa" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Compensa Servicios</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_comp_servicios">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_comp_servicios" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Polivalencia</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_polivalencia">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_polivalencia" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Asignacion</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_asignacion">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_asignacion" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Gastos Actuales</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_gastos_actu">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_gastos_actu" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Beca para Medico</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_beca_medico">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_beca_medico" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Complemento de Beca</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_complemento_beca">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_complemento_beca" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Despensa</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_despensa">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_despensa" placeholder="Cantidad">
                                </div>
                            </div>


                            <hr>
                            <div>Despensa Mandos</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_despensa_mandos">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_despensa_mandos" placeholder="Cantidad">
                                </div>
                            </div>


                            <hr>
                            <div>Prevision</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_prevision">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_privision" placeholder="Cantidad">
                                </div>
                            </div>
                            

                            <hr>
                            <div>Ayuda de Servicios</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_ayuda_servicios">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_ayuda_servicios" placeholder="Cantidad">
                                </div>
                            </div>

                            <hr>
                            <div>Fechas</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Fecha Inicial</label><label style="color:red">*</label><br>
                                    <input type="Date" class="form-control"
                                         name="fecha_ini" placeholder="Cantidad">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha Fin</label><label style="color:red">*</label><br>
                                    <input type="Date" class="form-control"
                                         name="fecha_fin" placeholder="Cantidad">
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