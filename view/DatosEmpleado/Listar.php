<?php
    include ('../../php/EmpleadosC/Listar.php');
    $id_tbl_empleados = base64_decode($_GET['D-F']);
    $id_tbl_control_plazas = $_GET['D-F3'];
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
    <?php include("libHeader.php"); ?>

</head>

<body>
    <?php include("../../conexion.php") ?>
    <?php include('../nav-menu.php') ?>
    <?php include ('../../php/DatosEmpleadoC/Listar.php');?>
    <?php include ('../../php/CatGeneroC/Listar.php');?>
    <?php include ('../../php/CatEstadoCivilC/listar.php');?>
    <?php include ('../../php/CatNivelEstudiosC/listar.php');?>
    <?php include("../../php/CentroTrabajoC/Listar.php");?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Datos de Empleado</h2>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../Empleados/Listar.php" style="color:#cb9f52;">Empleado</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Datos de Empleados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>Informacion de empleado seleccionado.</p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Nombre:
                    <?php echo $rowe['nombre'] . ' ' . $rowe['primer_apellido'] . ' ' . $rowe['segundo_apellido'] ?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Codigo de Empleado:
                    <?php echo $rowe['codigo_empleado']?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">RFC:
                    <?php echo $rowe['rfc']?>
                </p>
                <p style="font-size:14px; margin-top:0; margin-bottom:0;">Centro de Trabajo:
                    <?php echo claveCentro(base64_decode($id_tbl_control_plazas))?>
                </p>
                <br>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"
                        style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                            href="<?php echo 'Agregar.php?D-F='  . base64_encode($id_tbl_empleados) .'&D-F3='.$id_tbl_control_plazas ?>">Agregar</a>
                            <a class="dropdown-item"
                            href="<?php echo '../Empleados/Listar.php?D-F3='.$id_tbl_control_plazas?>">Regresar</a>
                    </div>
                </div>
                <table class="table table-striped" id="t-usuarios" style="width: 100%;">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">id</th>
                            <th style="color: white;">Pais de Nacimiento</th>
                            <th style="color: white;">Genero</th>
                            <th style="color: white;">Estado Civil</th>
                            <th style="color: white;">Nivel de Estudios</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listado = listadoDatosEmpleadosId($id_tbl_empleados);
                        if ($listado) {
                            if (pg_num_rows($listado) > 0) {
                                while ($obj = pg_fetch_object($listado)) { ?>
                                    <tr>
                                        <td>

                                            <!-- Button more acctions -->
                                            <div class=" btn-group">
                                            <button type="button" class="btn btn-light" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"
                                                    style="background-color: transparent; border:none; outline:none; color: white;">
                                                    <i class="fa fa-cog" style="font-size: 1.4rem; color:#cb9f52;"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                        href="<?php echo "Editar.php?D-F=" . base64_encode($id_tbl_empleados) . "&D-F2=" . base64_encode($obj->id_tbl_datos_empleado).'&D-F3='.$id_tbl_control_plazas ?>">Modificar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "../../php/DatosEmpleadoC/Eliminar.php?D-F=" . base64_encode($id_tbl_empleados) . "&D-F2=" . base64_encode($obj->id_tbl_datos_empleado).'&D-F3='.$id_tbl_control_plazas?>">Eliminar</a>
                                                </div>
                                            </div>

                                            <!-- MODAL ELIMINAR -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">¿Desea Continuar?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            La accion de eliminar no se puede rehacer.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <a class="btn btn-danger"
                                                                href="<?php echo "../../php/CentroTrabajoC/Eliminar.php?CT=" . base64_encode($obj->id_tbl_centro_trabajo) ?>">Eliminar1</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL ELIMINAR -->
                                        </td>
                                        <td>
                                            <?php echo $obj->id_tbl_datos_empleado ?>
                                        </td>
                                        <td>
                                            <?php echo $obj->pais_nacimiento ?>
                                        </td>
                                        <td>
                                            <?php echo catGeneroPk($obj->id_cat_genero) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoCivilPk($obj->id_cat_estado_civil) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoNivelEstudiosPk($obj->id_cat_nivel_estudios) ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p></p>";
                        }
                        ?>

                        <?php include('../../ajuste-menu.php') ?>
                        <?php include('../../footer-librerias.php') ?>

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
<?php include("libFooter.php"); ?>

</html>