<?php
$id_tbl_control_plazas = $_GET['D-F3'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/CatEstatusC/listar.php");?>
    <?php include("../../php/CatMovimientoC/listar.php"); ?>

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Empleado</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/EmpleadosC/Agregar.php">
                            <div class="form-row">
                                
                                <input type="hidden" name="id_tbl_control_plazas" value="<? echo $id_tbl_control_plazas?>">

                                <div class="form-group col-md-6">
                                    <label >Codigo de Empleado</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="codigo_empleado" placeholder="Codigo de Empleado" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >CURP</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="curp" placeholder="CURP" required maxlength="18">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="nombre" placeholder="Nombre" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Primer Apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="primer_apellido" placeholder="Primer Apellido" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Segundo Apellido</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="segundo_apellido" placeholder="Segundo Apellido">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >RFC</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        name="rfc" placeholder="RFC" required maxlength="13">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero de Seguro Social</label><label style="color:red">*</label>
                                    <input type="number" class="form-control"
                                        name="nss" placeholder="Numero de Seguro Social" required maxlength="11">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de Ingreso</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_ingreso" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Fecha de Baja</label><label style="color:red">*</label>
                                    <input type="date" class="form-control"
                                        name="fecha_baja" >
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Status</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_cat_estatus" required>
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = $listadoCE;
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_cat_estatus . '">' . catEstatus($row->id_cat_estatus) . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Movimiento</label><label style="color:red">*</label><br>
                                    <select class="form-select" aria-label="Default select example" 
                                        name="id_tbl_movimientos">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        $listado = listadoMovimientoAll();
                                        if ($listado) {
                                            if (pg_num_rows($listado) > 0) {
                                                while ($row = pg_fetch_object($listado)) {
                                                    echo '<option value="' . $row->id_tbl_movimientos . '">' . catMovimientoPk($row->id_tbl_movimientos) . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                               
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="<?php echo 'Listar.php?D-F3='.$id_tbl_control_plazas?>">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>



</body>

<script>

    function validate() {
        console.log(validarNick());
        if (validar() && validarNick()) {
            return true;
        } else {
            return false;
        }
    }

    function validarNick() {
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        let bool = false;
        if (validateNick(nick.value)) {
            Swal.fire({
                title: "¡El campo Nick ya existe!",
                text: "Verifique que las contrasenas seas iguales",
                icon: "error"
            });
        } else {
            bool = true;
        }
        return bool;
    }

    //Se obtienen los datos asi como los del mensaje
    function validarCaracteresNick() {
        let rnick = document.getElementById("rnickA"); //Se obtiene el valor de msj nick
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        nick.value = nick.value.toUpperCase(); //La funcion convierte a mayusculas el campo nick
        if (mensajeDD(nick.value, 5, 10) === "") {
            if (validateNick(nick.value)) {
                rnick.value = "*El campo Nick ya existe";
            } else {
                rnick.value = "";
            }
        } else {
            rnick.value = mensajeDD(nick.value, 5, 10);
        }
    }

    function validateNick(nick) {
        let arrayJS = JSON.parse(document.getElementById('row').value);
        let bool = false;
        for (let i = 0; i < arrayJS.length; i++) {
            if (arrayJS[i] == nick) {
                bool = true;
                i++;
            }
        }
        return bool;
    }


</script>
<?php  include("libFooter.php"); ?>
</html>