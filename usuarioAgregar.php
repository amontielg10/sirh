<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="js/usuario/usuarioAgregar.js"></script>
</head>

<body>
    <?php include('nav-menu.php') ?>
    <?php include("php/usuario/listarUsuario.php") ?>
    <div id="main-wrapper">

        <div class="page-wrapper" style="background-color: #f6f6f6;">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Usuario</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="usuario.php">Control Usuarios</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar Usuario</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Agregar</h5>
                    <div class="card-body">
                        <form method="POST" action="php/usuario/agregarUsuario.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nick*</label>
                                    <input type="text" onkeyup="validarCaracteresNick();" class="form-control"
                                        id="nickA" name="nickA" placeholder="Nick">
                                    <input readonly
                                        style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                        id="rnickA">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nombre*</label>
                                    <input onkeyup="validarCaracteresNombre();" id="nombreA" name="nombreA" type="text"
                                        class="form-control" placeholder="Nombre">
                                    <input readonly
                                        style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                        id="rnombreA">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Password*</label>
                                <input id="pwA" onkeyup="validarCaracteresPW1()" name="pwA" type="password"
                                    class="form-control" placeholder="******">
                                <input readonly
                                    style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                    id="rpwA">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Confirmar Password*</label>
                                <input id="psA2" onkeyup="validarCaracteresPW2()" name="psA2" type="password" class="form-control" placeholder="******">
                                <input readonly
                                    style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                    id="rpsA2">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Rol*</label>
                                    <select class="form-select" aria-label="Default select example" id="rolA"
                                        name="rolA">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($roEx) {
                                            if (pg_num_rows($roEx) > 0) {
                                                while ($row1 = pg_fetch_object($roEx)) {
                                                    echo '<option value="' . $row1->id_rol . '">' . $row1->id_rol . " - " . $row1->nombre . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled"
                                        checked disabled>
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
                                        Estatus* Activo</label>
                                </div>

                            </div>

                            <a class="btn btn-secondary" href="usuario.php">Cancelar</a>
                            <button type="submit" onclick="return validar();" class="btn btn-primary">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include('ajuste-menu.php') ?>
            <?php include('footer-librerias.php') ?>

</body>


<script>

   

</script>


</html>