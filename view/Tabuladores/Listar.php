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
    <?php include('../../php/TabuladoresC/Listar.php') ?>
    <?php include('../../php/CatNivelesC/listar.php') ?>
    <?php include('../../php/CatTipoContratacionC/listar.php') ?>
    <?php include('../../php/CatPuestoC/listar.php') ?>
    <?php include('../../php/CatZonaTabuladoresC/listar.php') ?>
    <?php include('../../php/CatRubrosTabuladoresC/listar.php') ?>


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Tabuladores</h2>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabuladores</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <p>La sig. tabla muestra informacion de tabuladores.</p>
                <div class=" btn-group">
                    <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"
                        style="background-color: white; border:none; outline:none; color: white;">
                        <i class="fa fa-cog" style="font-size: 1.4rem; color:#9f2241;"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                            href="<?php echo 'Agregar.php'?>">Agregar</a>
                    </div>
                </div>
                <table class="table table-striped" id="t-usuarios">
                    <thead>
                        <tr style="background-color: #5c5c5c;">
                            <th style="color: white;">Acciones</th>
                            <th style="color: white;">id</th>
                            <th style="color: white;">Niveles</th>
                            <th style="color: white;">Tipo Contratacion</th>
                            <th style="color: white;">Codigo Puesto</th>
                            <th style="color: white;">Zona Tabulador</th>
                            <th style="color: white;">Sueldo Eventual Rubro 1</th>
                            <th style="color: white;">Sueldo Eventual Cantidad</th>
                            <th style="color: white;">Sueldo Rubro 1</th>
                            <th style="color: white;">Sueldo Cantidad</th>
                            <th style="color: white;">Compensa Rubro 1</th>
                            <th style="color: white;">Compensa Cantidad</th>
                            <th style="color: white;">Compensa Servicios Rubro 2</th>
                            <th style="color: white;">Compensa servicios Cantidad</th>
                            <th style="color: white;">Polivalencia Rubro 1</th>
                            <th style="color: white;">Polivalencia Cantidad</th>
                            <th style="color: white;">Asignacion Rubro 1</th>
                            <th style="color: white;">Asignacion Cantidad</th>
                            <th style="color: white;">Gastos Rubro 2</th>
                            <th style="color: white;">Gastos Cantidad</th>
                            <th style="color: white;">Beca Medico Rubro 2</th>
                            <th style="color: white;">Beca Medico Cantidad</th>
                            <th style="color: white;">Complemento Beca Rubro 2</th>
                            <th style="color: white;">Complemento Beca Cantidad</th>
                            <th style="color: white;">Despensa Rubros 2</th>
                            <th style="color: white;">Despensa Cantidad</th>
                            <th style="color: white;">Despensa Mandos Rubro 2</th>
                            <th style="color: white;">Despensa Mandos Cantidad</th>
                            <th style="color: white;">Prevision Rubros 2</th>
                            <th style="color: white;">Prevision Cantidad</th>
                            <th style="color: white;">A. Servicios Rubro 2</th>
                            <th style="color: white;">A. Servicios Cantidad</th>
                            <th style="color: white;">Fecha Inicio</th>
                            <th style="color: white;">Fecha Fin</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
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
                                                        href="<?php echo "Editar.php?D-F=" . base64_encode($obj->id_tbl_tabuladores) ?>">Modificar</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="<?php echo "../../php/TabuladoresC/Eliminar.php?CT=" . base64_encode($obj->id_tbl_tabuladores) ?>">Eliminar</a>
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
                                            <?php echo $obj->id_tbl_tabuladores ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoNivelesPk($obj->id_cat_niveles); ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoContratacionPk($obj->id_cat_tipo_contratacion) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoPuestoPk($obj->id_cat_puesto) ?>
                                        </td>
                                        <td>
                                            <?php echo catalogoZonaPk($obj->id_cat_zona_tabuladores)?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_sueldo_eve)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_sueldo_eve?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_sueldo)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_sueldo?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_compensa)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_compensa?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_comp_servicios)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_comp_servicios?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_polivalencia)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_polivalencia?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_asignacion)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_asignacion?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_gastos_actu)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_gastos_actu?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_beca_medico)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_beca_medico?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_complemento_beca)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_complemento_beca?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_despensa)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_despensa?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_despensa_mandos)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_despensa_mandos?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_prevision)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_prevision?>
                                        </td>
                                        <td>
                                            <?php echo catalogoRubrosTabPk($obj->r_ayuda_servicios)?>
                                        </td>
                                        <td>
                                            <?php echo $obj->c_ayuda_servicios?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_ini?>
                                        </td>
                                        <td>
                                            <?php echo $obj->fecha_fin?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else
                                echo "<p>Sin Resultados</p>";
                        }
                        ?>

                        <?php include('../../ajuste-menu.php') ?>
                        <?php include('../../footer-librerias.php') ?>

            </div>
        </div>

        <?php include("../footer.php"); ?>


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

</html>