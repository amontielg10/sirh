<?php
    include("../../php/DatosFiscalesC/Listar.php");
    $id_tbl_datos_fiscales = base64_decode($_GET['D-F']); //Se obtiene el id
    $rowe = catDatosFiscales($id_tbl_datos_fiscales); //Se obtiene el array con la info del cliente
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
                        <h2 class="page-title">Modificar Datos Fiscales</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="Listar.php" style="color:#cb9f52;">Datos Fiscales</a>
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
                        <form method="POST" action="../../php/DatosFiscalesC/Editar.php">
                            <input type="hidden" id="id_tbl_datos_fiscales" name="id_tbl_datos_fiscales" value="<?php echo $id_tbl_datos_fiscales?>">
                            <div class="form-row">
                                <!-- INPUT RFC -->
                                <div class="form-group col-md-6">
                                    <label >FRC*</label>
                                    <input type="text" class="form-control"
                                        id="rfc" name="rfc" value="<?php echo $rowe["rfc"];?>">
                                </div>
                                <!-- INPUT CURP -->
                                <div class="form-group col-md-6">
                                    <label >CURP*</label>
                                    <input type="text" class="form-control"
                                        id="curp" name="curp" value="<?php echo $rowe["curp"];?>">
                                </div>
                                <!-- INPUT REGISTRO PATRONAL -->
                                <div class="form-group col-md-6">
                                    <label >Registro Patronal*</label>
                                    <input type="text" class="form-control"
                                        id="registro_patronal" name="registro_patronal" value="<?php echo $rowe["registro_patronal"];?>">
                                </div>
                                <!-- CODIGO POSTAL -->
                                <div class="form-group col-md-6">
                                    <label >Codigo Postal*</label>
                                    <input type="Integer" class="form-control"
                                        id="codigo_postal" name="codigo_postal" value="<?php echo $rowe["codigo_postal"];?>">
                                </div>
                                <!-- CODIGO ID REGIMEN FISCAL -->
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Regimen Fiscal*</label>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_regimen_fiscal"
                                        name="id_cat_regimen_fiscal">
                                        <?php
                                        include("../../php/RegimenFiscalC/listar.php");
                                        echo '<option value="' . $rowe["id_cat_regimen_fiscal"] . '">' . catRegimenFiscal($rowe["id_cat_regimen_fiscal"]) . '</option>';

                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe["id_cat_regimen_fiscal"] != $row->id_cat_regimen_fiscal){
                                                    echo '<option value="' . $row->id_cat_regimen_fiscal . '">' . $row->regimen_fiscal . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- CODIGO NOMBRE RAZON SOCIAL -->
                            <div class="form-group">
                            <label >Nombre / Razon Social*</label>
                            <input type="text" class="form-control"
                                        id="nombre_razon_social" name="nombre_razon_social" value="<?php echo $rowe["nombre_razon_social"];?>">
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