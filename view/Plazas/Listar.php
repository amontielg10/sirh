<?php include ("../../php/RegimenFiscalC/listar.php") ?>
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
     <?php  include("libHeader.php"); ?>

</head>

<body>
    <?php include ("../../conexion.php") ?>
    <?php include ('../nav-menu.php') ?>
    <?php include ("../../php/PlazasC/Listar.php")?>
    <?php include ("../../php/CatPlazasC/listar.php"); ?>
    <?php include ("../../php/CatTipoContratacionC/listar.php"); ?>
    <?php include ("../../php/CatUnidadResponsableC/listar.php"); ?>
    <?php include ("../../php/CentroTrabajoC/Listar.php"); ?>
    <?php include ("../../php/CatPuestoC/Listar.php"); ?>
    <?php include ("../../php/CatSituacionPlazaC/listar.php"); ?>
    <?php include ("../../php/CatZonaTabuladoresC/Listar.php"); ?>
    <?php include ("../../php/CatNivelesC1/Listar.php"); ?>
    


    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Control de Plazas</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Control de Plazas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="container-fluid">
            <p>La sig. tabla muestra informacion de control de plazas.</p>
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
                            <th style="color: white;">Numero plaza</th>
                            <th style="color: white;">Plaza</th>
                            <th style="color: white;">Tipo contratacion</th>
                            <th style="color: white;">Situacion plaza</th>
                            <th style="color: white;">Unidad Responsable</th>
                            <th style="color: white;">Centro de Trabajo</th>
                            <th style="color: white;">Puesto</th>
                            <th style="color: white;">Zonas tabuladores</th>
                            <th style="color: white;">Niveles</th>
                            <th style="color: white;">Zona pagadora</th>
                            <th style="color: white;">Fecha Inicio</th>
                            <th style="color: white;">Fecha Fin</th>
                            <th style="color: white;">Fecha modificacion</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $listado = listado();
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
                                                    href="<?php echo "Editar.php?D-F=" . base64_encode($obj->id_tbl_control_plazas) ?>">Modificar</a>
                                                    <a class="dropdown-item"
                                                    href="<?php echo "../Empleados/Listar.php?D-F3=" . base64_encode($obj->id_tbl_control_plazas) ?>">Empleados</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item"
                                                    href="<?php echo "../../php/PlazasC/Eliminar.php?D-F=" . base64_encode($obj->id_tbl_control_plazas) ?>">Eliminar</a>
                                            </div>
                                         </div>

                                    <!-- MODAL ELIMINAR -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">¿Desea Continuar?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    La accion de eliminar no se puede rehacer.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger"
                                                        href="<?php echo "../../php/DatosFiscalesC/Eliminar.php?D-F=" . base64_encode($obj->id_tbl_datos_fiscales) ?>">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- MODAL ELIMINAR -->
                                    </td>
                                    <td>
                                        <?php echo $obj->id_tbl_control_plazas ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->num_plaza ?>
                                    </td>
                                    <td>
                                        <?php echo catalogoPlazaPk($obj->id_cat_plazas);?>
                                    </td>
                                    <td>
                                        <?php echo catalogoContratacionPk($obj->id_cat_tipo_contratacion) ?>
                                    </td>
                                    <td>
                                        <?php echo listadoSituacionPlazaPk($obj->id_cat_situacion_plaza) ?>
                                    </td>
                                    <td>
                                        <?php echo catPk($obj->id_cat_unidad_reponsable) ?>
                                    </td>
                                    <td>
                                        <?php echo catcentroTrabajoPk($obj->id_tbl_centro_trabajo) ?>
                                    </td>
                                    <td>
                                        <?php echo catalogoPuestoPk($obj->id_cat_puesto) ?>
                                    </td>
                                    <td>
                                        <?php echo catalogoZonaPk($obj->id_cat_zonas_tabuladores) ?>
                                    </td>
                                    <td>
                                        <?php echo catalogoNivelesPk($obj->id_cat_niveles) ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->zona_pagadora ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->fecha_ini_contrato ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->fecha_fin_contrato ?>
                                    </td>
                                    <td>
                                        <?php echo $obj->fecha_modificacion ?>
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
<?php  include("libFooter.php"); ?>
</html>