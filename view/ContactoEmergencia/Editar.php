<?php
    include("../../php/ControlContactoEmergenciaC/Listar.php");
    $id_tbl_empleados = base64_decode($_GET['D-F']); 
    $id_ctrl_contacto_emergencia = base64_decode($_GET['D-F2']); 
    $rowe = listadoContactoEmergenciaPk($id_ctrl_contacto_emergencia); 

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>

    <div id="main-wrapper">

        <div class="page-wrapper" >

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Modificar Contacto</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                    <a href="#" style="color:#cb9f52;">Contacto de Emergencia</a>
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
                        <form method="POST" action="../../php/ControlContactoEmergenciaC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" value="<?php echo $id_tbl_empleados?>">
                            <input type="hidden" name="id_ctrl_contacto_emergencia" value="<?php echo $id_ctrl_contacto_emergencia?>">

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" value="<?php echo $rowe['nombre']?>">
                            </div>

                            <div class="form-group col-md-6">
                                    <label >Primer Apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="primer_apellido" value="<?php echo $rowe['primer_apellido']?>">
                            </div>

                            <div class="form-group col-md-6">
                                    <label >Parentesco</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="parentesco" value="<?php echo $rowe['parentesco']?>">
                            </div>

                            <div class="form-group col-md-6">
                                    <label >Telefono Celular</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="movil" value="<?php echo $rowe['movil']?>">
                            </div>

                            <div class="form-group col-md-6">
                                    <label >Segundo Apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="segundo_apellido" value="<?php echo $rowe['segundo_apellido']?>">
                            </div>

                            <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_cat_estatus">
                                        <?php
                                        include ('../../php/CatEstatusC/listar.php');
                                        echo '<option value="' . $rowe['id_cat_estatus'] . '">' . catEstatus($rowe['id_cat_estatus']) . '</option>';
                                        $listado = $listadoCE;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    if ($rowe['id_cat_estatus'] != $row->id_cat_estatus){
                                                    echo '<option value="' . $row->id_cat_estatus . '">' . $row->estatus . '</option>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            
                            </div>
                            
                            
                            <a class="btn btn-light" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) ?>">Cancelar</a>
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