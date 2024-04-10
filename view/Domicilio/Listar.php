<?php
include ('../../php/EmpleadosC/Listar.php');
$id_tbl_empleados = base64_decode($_GET['D-F']);
$id_tbl_control_plazas = $_GET['D-F3'];
$id_tbl_centro_trabajo = ($_GET['RP']);
$id_tbl_datos_empleado = base64_decode($_GET['D-F2']);
$rowe = catEmpleadosId($id_tbl_empleados);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <style>
        a.dropdown-item:hover {
            background-color: #fbf4e8;
            ;
        }
    </style>

    
    <?php include ("libHeader.php"); ?>

</head>

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>
    <?php include ('../../php/CatEstatusC/listar.php'); ?>
    <?php include ('../../php/ControlDomicilioC/Listar.php'); ?>
    <?php include ("../../php/CentroTrabajoC/Listar.php"); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">Domicilio</h2>
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
                                        <a href="#" style="color:#cb9f52;">Datos de Empleado</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Domicilio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>Informaci&oacuten de empleado seleccionado.</p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Nombre:
                    <?php echo $rowe['nombre'] . ' ' . $rowe['primer_apellido'] . ' ' . $rowe['segundo_apellido'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">CURP:
                    <?php echo $rowe['curp'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">RFC:
                    <?php echo $rowe['rfc'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Centro de Trabajo:
                    <?php echo claveCentro(base64_decode($id_tbl_control_plazas)) ?>
                </p>
                <br>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                            href="<?php echo 'Agregar.php?D-F=' . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo ?>">Agregar</a>
                        <a class="dropdown-item"
                            href="<?php echo '../Empleados/Listar.php?D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo ?>">Regresar</a>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Domicilios</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/ControlCuentaClabeC/Editar.php">

                            <input type="hidden" name="id_tbl_empleados" id="id_tbl_empleados"
                                value="<?php echo $id_tbl_empleados ?>">
                            <input type="hidden" name="id_tbl_control_plazas"
                                value="<?php echo $id_tbl_control_plazas ?>">
                            <input type="hidden" name="id_ctrl_cuenta_clabe" id="id_ctrl_cuenta_clabe"
                                value="<?php echo $id_ctrl_cuenta_clabe ?>">
                            <input type="hidden" id="id_tbl_centro_trabajo" name="id_tbl_centro_trabajo"
                                value="<?php echo $id_tbl_centro_trabajo ?>">

                            <div>Domicilio Fiscal</div>
                            <br>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Entidad</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Municipio</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Colonia</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>C&oacutedigo postal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Calle</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. exterior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. interior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Estatus</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <!-- Domicilio no fiscal-->
                            </div>
                            <hr>
                            <div>Domicilio No Fiscal</div>
                            <br>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Entidad</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Municipio</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Colonia</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>C&oacutedigo postal</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Calle</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. exterior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>N&uacutem. interior</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Estatus</label><label style="color:red">*</label>
                                    <input type="text" class="form-control" name="clabe" value="<?php echo "text" ?>"
                                        required maxlength="25">
                                </div>

                                <div class="form-group col-md-6">
                                   
                                </div>

                            </div>


                            <a class="btn btn-light"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo "Listar.php?D-F=" . base64_encode($id_tbl_empleados) . '&D-F3=' . $id_tbl_control_plazas . '&RP=' . $id_tbl_centro_trabajo ?>">Cancelar</a>
                            <button type="submit" class="btn btn-light" onclick="return validateE();"
                                style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>


                <?php include ('../../ajuste-menu.php') ?>
                <?php include ('../../footer-librerias.php') ?>

            </div>
        </div>

</body>

<script>
    $(document).ready(function () {
        $('#t-usuarios').DataTable({
            scrollX: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            responsive: "true",
            dom: 'Bfrtilp',
            buttons: [

            ],
        }

        );
    });


</script>
<?php include ("libFooter.php"); ?>

</html>