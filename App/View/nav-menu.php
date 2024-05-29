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

</head>

<body>  

    <nav class="navbar bg-light">
        <div class="container-fluid nav-color-green-dad mb-0 nav-padding">
            <a class="navbar-brand navbar-header" href="#">
                <img src="../../../../assets/images/imss_bienestar.png" width="30" height="24"
                    class="d-inline-block align-text-top wider-image">
            </a>
            <h3 class="nav-tittle">IMSS-BIENESTAR</h3>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg nav-color-green-son mt-0">
        <div class="container-fluid nav-color-green-son mt-0 nav-padding">
            <a class="navbar-brand nav-text-tittle " href="../../System/home/index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll nav-text-tittle"
                    style="--bs-scroll-height: 100px;">

                    <!-- PERFIL -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mi perfil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mi informaci&oacuten</a></li>
                            <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Salir</a>
                            </li>
                        </ul>
                    </li>
                    <!-- PERFIL -->

                    <!-- ADMIN -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Administraci&oacuten
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../Admin/Usuarios/index.php">Usuarios</a></li>
                        </ul>
                    </li>
                    <!-- ADMIN -->

                    <!-- CENTRAL -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Nom. Central
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Centros trabajo</a></li>
                            <li><a class="dropdown-item" href="#">Empleados</a></li>
                            <li><a class="dropdown-item" href="#">Plazas</a></li>
                        </ul>
                    </li>
                    <!-- CENTRAL -->

                    <!-- HRAES -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Nom. Hraes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Centros trabajo</a></li>
                            <li><a class="dropdown-item" href="#">Empleados</a></li>
                            <li><a class="dropdown-item" href="#">Plazas</a></li>
                        </ul>
                    </li>
                    <!-- HRAES -->

                    <!-- FEDERALIZADA -->
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
                    <!-- FEDERALIZADA -->

                </ul>
            </div>
        </div>
    </nav>

    <!-- MODAL SALIR-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#235B4E">
                    <h4 style="color:white" class="modal-title" id="exampleModalLongTitle">Confirmar cierre de
                        ses&oacuten</h4>
                    <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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

</html>