<?php
    include("../../php/EmpleadosC/Listar.php");
    $id_tbl_control_plazas = $_GET['D-F3'];
    $id_tbl_empleados = base64_decode($_GET['D-F']); //Se obtiene el id
    $rowe = catEmpleadosId($id_tbl_empleados); //Se obtiene el array con la info del cliente
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
                        <h2 class="page-title">Modificar Empleados</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="Listar.php" style="color:#cb9f52;">Empleados</a>
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
                        <form method="POST" action="../../php/EmpleadosC/Editar.php">
                            <input type="hidden" name="id_tbl_control_plazas" value="<? echo $id_tbl_control_plazas?>">
                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                            
                            <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <label >Codigo de Empleado</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="codigo_empleado" value="<?php echo $rowe['codigo_empleado']?>" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >CURP</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="curp" value="<?php echo $rowe['curp']?>" required maxlength="18">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" value="<?php echo $rowe['nombre']?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Primer Apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="primer_apellido" value="<?php echo $rowe['primer_apellido']?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Segundo Apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="segundo_apellido" value="<?php echo $rowe['segundo_apellido']?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >RFC</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="rfc" value="<?php echo $rowe['rfc']?>" required maxlength="13">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero de Seguro Social</label><label style="color:red">*</label>
                                    <input type="number" class="form-control"
                                        name="nss" value="<?php echo $rowe['nss']?>" required maxlength="11">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de Ingreso</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_ingreso" value="<?php echo $rowe['fecha_ingreso']?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de Baja</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_baja" value="<?php echo $rowe['fecha_baja']?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Status</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_cat_estatus" required>
                                        <?php
                                        include("../../php/CatEstatusC/listar.php");
                                        echo '<option value="' . $rowe['id_cat_estatus'] . '">' . catEstatus($rowe['id_cat_estatus']) . '</option>';
                                        $listado = $listadoCE;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_estatus'] != $row->id_cat_estatus){
                                                    echo '<option value="' . $row->id_cat_estatus . '">' . catEstatus($row->id_cat_estatus) . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Movimiento</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_tbl_movimientos" required>
                                        <?php
                                        include("../../php/CatMovimientoC/listar.php");
                                        echo '<option value="' . $rowe['id_tbl_movimientos'] . '">' . catMovimientoPk($rowe['id_tbl_movimientos']) . '</option>';
                                        $listado = listadoMovimientoAll();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_tbl_movimientos'] != $row->id_tbl_movimientos){
                                                    echo '<option value="' . $row->id_tbl_movimientos . '">' . catMovimientoPk($row->id_tbl_movimientos) . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                            href="<?php echo 'Listar.php?D-F3='.$id_tbl_control_plazas?>">Cancelar</a>
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