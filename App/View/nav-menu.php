<?php include '../../../../conexion.php'; ?>
<?php include 'validar_sesion.php'; ?>

<?php
$id_user = $_SESSION['id_user'];
$nick = $_SESSION['nick'];
$nombre = $_SESSION['nombre'];
$id_rol = $_SESSION['id_rol'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRH</title>
    <link rel="stylesheet" href="../../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../assets/styles/menu.css">
    <script src="../../../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../../../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../../../js/Mensajes/mensajes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../../../js/Mensajes/mensajes.js"></script>
    <script src="../../../../js/Global/Curp/ValidarCurp.js"></script>
    <script src="../../../../js/Global/Mensajes/Mensajes.js"></script>
    <script src="../../../../js/Global/Seguridad/Confirmacion.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

</head>

<body>

    <nav class="navbar bg-light nav-all-not-size">
        <div class="container-fluid nav-color-green-dad mb-0 nav-padding">
            <a class="navbar-brand navbar-header" href="../../System/home/index.php">
                <img src="../../../../assets/images/imss_bienestar.png" width="30" height="24"
                    class="d-inline-block align-text-top wider-image">
            </a>
            <h3 class="nav-tittle">IMSS-BIENESTAR</h3>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg nav-color-green-son mt-0">
        <div class="container-fluid nav-color-green-son mt-0 nav-padding">
            <a class="navbar-brand nav-text-tittle custom-link" href="../../System/home/index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll nav-text-tittle"
                    style="--bs-scroll-height: 100px;">

                    <!-- ADMIN -->
                    <?php if ($id_rol == 1) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Administraci&oacuten
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../Admin/Usuarios/index.php">Usuarios</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- ADMIN -->

                    <!-- CENTRAL -->
                    <?php if ($id_rol == 1 || $id_rol == 2) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Nom. Central
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Centro de trabajo</a></li>
                                <li><a class="dropdown-item" href="#">Empleados</a></li>
                                <li><a class="dropdown-item" href="#">Plazas</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- CENTRAL -->

                    <!-- HRAES -->
                    <?php if ($id_rol == 1 || $id_rol == 3) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Nom. Hraes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../Hraes/CentroTrabajo/index.php">Centro de
                                        trabajo</a></li>
                                <li><a class="dropdown-item" href="../../Hraes/Empleados/index.php">Empleados</a></li>
                                <li><a class="dropdown-item" href="../../Hraes/Plazas/index.php">Plazas</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- HRAES -->

                    <!-- FEDERALIZADA -->
                    <?php if ($id_rol == 1 || $id_rol == 4) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Nom. Federalizada
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Centros trabajo</a></li>
                                <li><a class="dropdown-item" href="#">Empleados</a></li>
                                <li><a class="dropdown-item" href="#">Plazas</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- FEDERALIZADA -->
                </ul>

                <!-- CONFIG -->
                <ul class="navbar-nav ml-custom">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-ix" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-cog icon-config"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-result">
                            <button onclick="activarModal();" class="dropdown-item">Modificar contraseña</button>
                            <div class="dropdown-divider"></div>
                            <button onclick="activarModal();" class="dropdown-item">Salir</button>
                        </ul>
                    </li>
                </ul>
                <!-- CONFIG -->

            </div>
        </div>
    </nav>

    <!-- MODAL SALIR-->
    <div class="modal fade" id="modal_exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#235B4E">
                    <h4 style="color:white" class="modal-title" id="exampleModalLongTitle">Confirmar cierre de
                        ses&oacuten</h4>
                </div>
                <div class="modal-footer">
                    <a href="../../salir.php" style="color:  #235B4E;" class="btn btn-light"><i class=""></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Salir</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL SALIR-->
</body>

<script>
    function activarModal() {
        $("#modal_exit").modal("show");
    }
</script>

</html>