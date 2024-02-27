<?php
    include("../../php/TabuladoresC/Listar.php");
    $id_tbl_tabuladores = base64_decode($_GET['D-F']); //Se obtiene el id
    $rowe = listadoPk($id_tbl_tabuladores); //Se obtiene el array con la info del cliente
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper" >

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar Tabulador</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="Listar.php" style="color:#cb9f52;">Tabuladores</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/TabuladoresC/Editar.php">
                        <div class="form-row">
                        <input type="hidden" id="id_tbl_tabuladores" name="id_tbl_tabuladores" value="<?php echo $id_tbl_tabuladores ?>" />
                                <div class="form-group col-md-6">
                                    <label >Niveles</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_cat_niveles">
                                        <?php
                                            include('../../php/CatNivelesC/listar.php');
                                            echo '<option value="' . $rowe['id_cat_niveles'] . '">' . catalogoNivelesPk($rowe['id_cat_niveles']) .   '</option>';
                                            $listado = listado();                                 

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['id_cat_niveles'] != $row->id_cat_niveles){
                                                        echo '<option value="' . $row->id_cat_niveles . '">' . $row->codigo .   '</option>';
                                                        }
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
                                        <?php
                                            include('../../php/CatTipoContratacionC/listar.php');
                                            echo '<option value="' . $rowe['id_cat_tipo_contratacion'] . '">' . catalogoContratacionPk($rowe['id_cat_tipo_contratacion']) .   '</option>';
                                            $listado = listadoContratacion();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['id_cat_tipo_contratacion'] != $row->id_cat_tipo_contratacion){
                                                        echo '<option value="' . $row->id_cat_tipo_contratacion . '">' . $row->descripcion_cont .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Codigo de Puesto</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_puesto"
                                        name="id_cat_puesto">                                        
                                        <?php
                                            include('../../php/CatPuestoC/listar.php');
                                            echo '<option value="' . $rowe['id_cat_puesto'] . '">' . catalogoPuestoPk($rowe['id_cat_puesto']) .   '</option>';
                                            $listado = listadoPuesto();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['id_cat_puesto'] != $row->id_cat_puesto){
                                                        echo '<option value="' . $row->id_cat_puesto . '">' . $row->codigo_puesto .   '</option>';
                                                        }
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
                                        <?php
                                            include('../../php/CatZonaTabuladoresC/listar.php') ;
                                            echo '<option value="' . $rowe['id_cat_zona_tabuladores'] . '">' . catalogoZonaPk($rowe['id_cat_zona_tabuladores']) .   '</option>';
                                            $listado = listadoZona();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['id_cat_zona_tabuladores'] != $row->id_cat_zonas_tabuladores){
                                                        echo '<option value="' . $row->id_cat_zonas_tabuladores . '">' . $row->zona_tabuladores .   '</option>';
                                                        }
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
                                    <select class="form-select" aria-label="Default select example" id="r_sueldo_eve"
                                        name="r_sueldo_eve">
                                        <?php
                                            include('../../php/CatRubrosTabuladoresC/listar.php');
                                            echo '<option value="' . $rowe['r_sueldo_eve'] . '">' . catalogoRubrosTabPk($rowe['r_sueldo_eve']) .   '</option>';
                                            $listado = listadoRubrosTab();                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_sueldo_eve'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_sueldo_eve" value="<?php echo $rowe['c_sueldo_eve']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Sueldo</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_sueldo">
                                        
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_sueldo'] . '">' . catalogoRubrosTabPk($rowe['r_sueldo']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_sueldo'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_sueldo" value="<?php echo $rowe['c_sueldo']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Compensa</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_compensa">
                                        
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_compensa'] . '">' . catalogoRubrosTabPk($rowe['r_compensa']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_compensa'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_compensa" value="<?php echo $rowe['c_compensa']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Compensa Servicios</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_comp_servicios">

                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_comp_servicios'] . '">' . catalogoRubrosTabPk($rowe['r_comp_servicios']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_comp_servicios'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_comp_servicios" value="<?php echo $rowe['c_comp_servicios']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Polivalencia</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_polivalencia">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_polivalencia'] . '">' . catalogoRubrosTabPk($rowe['r_polivalencia']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_polivalencia'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_polivalencia" value="<?php echo $rowe['c_polivalencia']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Asignacion</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_asignacion">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_asignacion'] . '">' . catalogoRubrosTabPk($rowe['r_asignacion']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_asignacion'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_asignacion" value="<?php echo $rowe['c_asignacion']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Gastos Actuales</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_gastos_actu">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_gastos_actu'] . '">' . catalogoRubrosTabPk($rowe['r_gastos_actu']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_gastos_actu'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_gastos_actu" value="<?php echo $rowe['c_gastos_actu']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Beca para Medico</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_beca_medico">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_beca_medico'] . '">' . catalogoRubrosTabPk($rowe['r_beca_medico']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_beca_medico'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_beca_medico" value="<?php echo $rowe['c_beca_medico']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Complemento de Beca</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_complemento_beca">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_complemento_beca'] . '">' . catalogoRubrosTabPk($rowe['r_complemento_beca']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_complemento_beca'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_complemento_beca" value="<?php echo $rowe['c_complemento_beca']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Despensa</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_despensa">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_despensa'] . '">' . catalogoRubrosTabPk($rowe['r_despensa']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_despensa'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_despensa" value="<?php echo $rowe['c_despensa']?>">
                                </div>
                            </div>


                            <hr>
                            <div>Despensa Mandos</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_despensa_mandos">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_despensa_mandos'] . '">' . catalogoRubrosTabPk($rowe['r_despensa_mandos']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_despensa_mandos'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_despensa_mandos" value="<?php echo $rowe['c_despensa_mandos']?>">
                                </div>
                            </div>


                            <hr>
                            <div>Prevision</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_prevision">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_prevision'] . '">' . catalogoRubrosTabPk($rowe['r_prevision']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_prevision'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_prevision" value="<?php echo $rowe['c_prevision']?>">
                                </div>
                            </div>
                            

                            <hr>
                            <div>Ayuda de Servicios</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Rubro</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example"
                                        name="r_ayuda_servicios">
                                        <?php
                                            $listado = listadoRubrosTab();                                   
                                            echo '<option value="' . $rowe['r_ayuda_servicios'] . '">' . catalogoRubrosTabPk($rowe['r_ayuda_servicios']) .   '</option>';                                   

                                            if ($listado) {
                                                if (pg_num_rows($listado) > 0) {
                                                    while ($row = pg_fetch_object($listado)) {
                                                        if ($rowe['r_ayuda_servicios'] != $row->id_cat_rubros_tabuladores){
                                                        echo '<option value="' . $row->id_cat_rubros_tabuladores . '">' . $row->codigo .   '</option>';
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Cantidad</label><label style="color:red">*</label><br>
                                    <input type="number" class="form-control"
                                         name="c_ayuda_servicios" value="<?php echo $rowe['c_ayuda_servicios']?>">
                                </div>
                            </div>

                            <hr>
                            <div>Fechas</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Fecha Inicial</label><label style="color:red">*</label><br>
                                    <input type="text" class="form-control"
                                         name="fecha_ini" value="<?php echo $rowe['fecha_ini']?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha Fin</label><label style="color:red">*</label><br>
                                    <input type="text" class="form-control"
                                         name="fecha_fin" value="<?php echo $rowe['fecha_fin']?>">
                                </div>
                            </div>
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>

</body>
<?php  include("libFooter.php"); ?>
</html>